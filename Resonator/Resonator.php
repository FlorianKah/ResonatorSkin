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
		'version' => '0.8 alpha',
		'url' => 'https://www.mediawiki.org/',
		'author' => '[https://mediawiki.org/ Florian K]',
		'descriptionmsg' => 'resonator-desc', // see the section on "Localisation messages" below
		'license' => 'GPL-2.0+'
);

$wgValidSkinNames['resonator'] = 'Resonator';

$wgAutoloadClasses['SkinResonator'] = __DIR__ . '/Resonator.skin.php';
$wgMessagesDirs['Resonator'] = __DIR__ . '/i18n';

$wgDefaultUserOptions['cols'] = 134;	// Since the Navigation Bar is on top, we have much space to both sides and we need 135 colons for editing

$wgResourceModules['skins.resonator.styles'] = array(
	'styles' => array(
		'Resonator/resources/screen.css' => array( 'media' => 'screen' ),
		'Resonator/resources/custom.css' => array( 'media' => 'screen' ),
		'Resonator/resources/table.css' => array( 'media' => 'screen' ),
		'Resonator/resources/toc.css' => array( 'media' => 'screen' ),
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);


