<?php
/**
 * Skin file for the Example skin.
 *
 * @file
 * @ingroup Skins
 */

/**
 * SkinTemplate class for the Example skin
 *
 * @ingroup Skins
 */
class SkinResonator extends SkinTemplate {
	public $skinname = 'Resonator', $stylename = 'Resonator',
		$template = 'ResonatorTemplate', $useHeadElement = true;

	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'skins.resonator.styles'
		) );

		//Replace the following with your own google analytic info

		$out->addHeadItem( 'analytics',
				'<script type="text/javascript">'."

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-0000000-00']);
  _gaq.push(['_setDomainName', 'yourdomain.com/with-no-http://']);
  _gaq.push(['_setAllowHash', 'false']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>"
		);
/*		$out->addHeadItem('bgimg', "<style>body {background-color: #102021;" .
		"background: url('" . $GLOBALS['wgStylePath'] . "/Resonator/resources/bckgr.png');}</style>");
*/
		$out->addHeadItem('font-face', "<link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Coda\" />");
		$out->addHeadItem('responsive', "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">");

	}
}

/**
 * BaseTemplate class for the Example skin
 *
			'mediawiki.skinning.interface',
			'mediawiki.skinning.content.externallinks',
 * @ingroup Skins
 */
class ResonatorTemplate extends BaseTemplate {
	/**
	 * Outputs a single sidebar portlet of any kind.
	 */
	private function outputPortlet( $box ) {
		if ( !$box['content'] ) {
			return;
		}

		?>
		<div
			role="navigation"
			class="mw-portlet"
			id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"
			<?php echo Linker::tooltip( $box['id'] ) ?>
		>
			<h3><a href="javascript:"> 
				<?php // Trick to have drop-down boxes
				if ( isset( $box['headerMessage'] ) ) {
					$this->msg( $box['headerMessage'] );
				} else {
					echo htmlspecialchars( $box['header'] );
				}
				?></a>
			</h3>

			<?php
			if ( is_array( $box['content'] ) ) {
				echo '<ul>';
				foreach ( $box['content'] as $key => $item ) {
					echo $this->makeListItem( $key, $item );
				}
				echo '</ul>';
			} else {
				echo $box['content'];
			}?>
		</div>
		<?php
	}

	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {

		$this->html( 'headelement' ) ?>
		<div id="mw-wrapper">
			<a
				id="p-logo"
				role="banner"
				href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
				<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
			>
				<img
					src="<?php $this->text( 'logopath' ) ?>"
					alt="<?php $this->text( 'sitename' ) ?>"
				/>
			</a>


			<div class="mw-body" role="main">
				<?php if ( $this->data['sitenotice'] ) { ?>
					<div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
				<?php } ?>

				<?php if ( $this->data['newtalk'] ) { ?>
					<div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
				<?php } ?>

				<h1 class="firstHeading">
					<span dir="auto"><?php $this->html( 'title' ) ?></span>
				</h1>

				<div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>

				<div class="mw-body-content">
					<div id="contentSub">
						<?php if ( $this->data['subtitle'] ) { ?>
							<p><?php $this->html( 'subtitle' ) ?></p>
						<?php } ?>
						<?php if ( $this->data['undelete'] ) { ?>
							<p><?php $this->html( 'undelete' ) ?></p>
						<?php } ?>
					</div>

					<?php $this->html( 'bodytext' ) ?>

					<?php $this->html( 'catlinks' ) ?>

					<?php $this->html( 'dataAfterContent' ); ?>

				</div>
			</div>


			<div id="mw-navigation">
				<h2><?php $this->msg( 'navigation-heading' ) ?></h2>

				<form
					action="<?php $this->text( 'wgScript' ) ?>"
					role="search"
					class="mw-portlet"
					id="p-search"
				>
					<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />

					<h3><label for="searchInput"><?php $this->msg( 'search' ) ?></label></h3>

					<?php echo $this->makeSearchInput( array( "id" => "searchInput", "size" => "35" ) ) ?>
					<?php echo $this->makeSearchButton( 'go' ) ?>

				</form>

				<?php

				$this->outputPortlet( array(
					'id' => 'p-personal',
					'headerMessage' => 'res-personal',
					'content' => $this->getPersonalTools(),
				) );

				$this->outputPortlet( array(
					'id' => 'p-namespaces',
					'headerMessage' => 'res-namespace',
					'content' =>$this->data['content_actions']
				) );

				foreach ( $this->getSidebar() as $boxName => $box ) {
					$this->outputPortlet( $box );
				}

				?>
			</div>

			<div id="mw-footer">
				<?php foreach ( $this->getFooterLinks() as $category => $links ) { ?>
					<ul role="contentinfo">
						<?php foreach ( $links as $key ) { ?>
							<li><?php $this->html( $key ) ?></li>
						<?php } ?>
					</ul>
				<?php } ?>

			</div>
		</div>

		<?php $this->printTrail() ?>
		</body></html>

		<?php
	}
}
