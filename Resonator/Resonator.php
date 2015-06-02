<?php
/**
 * Example skin
 *
 * This is an example skin showcasing the best practices, a companion to the MediaWiki skinning
 * guide available at <https://www.mediawiki.org/wiki/Manual:Skinning>.
 *
 * The code is released into public domain, which means you can freely copy it, modify and release
 * as your own skin without providing attribution and with absolutely no restrictions. Remember to
 * change the license information if you do not intend to provide your changes on the same terms.
 *
 * @file
 * @ingroup Skins
 * @author Florian K
 * @license CC0 (public domain) <http://creativecommons.org/publicdomain/zero/1.0/>
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}

$wgExtensionCredits['skin'][] = array(
		'path' => __FILE__,
		'name' => 'Resonator', // name as shown under [[Special:Version]]
		'namemsg' => 'skinname-resonator', // used since MW 1.24, see the section on "Localisation messages" below
		'version' => '1.0',
		'url' => 'http://floriankah.github.io/ResonatorSkin/',
		'author' => 'Florian K',
		'descriptionmsg' => 'resonator-desc', // see the section on "Localisation messages" below
		'license' => 'copyright'
);

$wgValidSkinNames['resonator'] = 'Resonator';

$wgAutoloadClasses['SkinResonator'] = __DIR__ . '/Resonator.skin.php';
$wgMessagesDirs['Resonator'] = __DIR__ . '/i18n';

$wgDefaultUserOptions['cols'] = 134;	// Since the Navigation Bar is on top, we have much space to both sides and we need 135 colons for editing

$wgResourceModules['skins.resonator.styles'] = array(
	'styles' => array(
		'Resonator/resources/toc.css' => array( 'media' => 'screen' ),
		'Resonator/resources/table.css' => array( 'media' => 'screen' ),
		'Resonator/resources/custom.css' => array( 'media' => 'screen' ),
		'Resonator/resources/screen.css' => array( 'media' => 'screen' ),
				
		'Resonator/resources/custom320.css' => array( 'media' => 'screen and (min-width:320px) and (max-width:1014px)' ),
		'Resonator/resources/screen320.css' => array( 'media' => 'screen and (min-width:320px) and (max-width:1014px)' ),
		/*'Resonator/resources/table320.css' => array( 'media' => 'screen and (min-width:320px) and (max-width:1014px)' ),*/

		'Resonator/resources/custom.css' => array( 'media' => 'screen and (min-width:1015px)' ),

	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);


