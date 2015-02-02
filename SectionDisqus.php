<?php
/**
 * SectionDisqus extension
 *
 * @file
 * @ingroup Extensions
 *
 * @author Luis Felipe Schenone <schenonef@gmail.com>
 * @license GPL v2 or later
 */

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'SectionDisqus',
	'descriptionmsg' => 'sectiondisqus-desc',
	'version'        => '0.2.0',
	'author'         => 'Luis Felipe Schenone',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:SectionDisqus',
	'license-name'   => 'GPL-2.0+'
);

$wgResourceModules['ext.SectionDisqus'] = array(
	'scripts' => 'SectionDisqus.js',
	'styles' => 'SectionDisqus.css',
	'position' => 'top',
	'dependencies' => array( 'jquery.ui.dialog' ),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'SectionDisqus',
);

$wgMessagesDirs['SectionDisqus'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['SectionDisqus'] = __DIR__ . '/SectionDisqus.i18n.php';
$wgAutoloadClasses['SectionDisqus'] = __DIR__ . '/SectionDisqus.body.php';

$wgHooks['BeforePageDisplay'][] = 'SectionDisqus::addResources';
$wgHooks['DoEditSectionLink'][]  = 'SectionDisqus::addDisqusButton';
$wgHooks['SkinAfterContent'][] = 'SectionDisqus::addDisqusDialog';
