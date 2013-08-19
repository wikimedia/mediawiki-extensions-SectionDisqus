<?php
/**
 * SectionDisqus extension
 *
 * @file
 * @ingroup Extensions
 *
 * @author Luis Felipe Schenone <schenonef@gmail.com>
 * @license GPL v2 or later
 * @version 0.1
 */

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'SectionDisqus',
	'description'    => 'Adds a "disqus" button next to the "edit" button of every section, that when clicked, opens a Disqus dialog for that section.',
	'descriptionmsg' => 'sectiondisqus-desc',
	'version'        => '0.1',
	'author'         => 'Luis Felipe Schenone',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SectionDisqus'
);

$wgResourceModules['ext.SectionDisqus'] = array(
	'scripts' => 'SectionDisqus.js',
	'styles' => 'SectionDisqus.css',
	'position' => 'top',
	'dependencies' => array( 'jquery.ui.dialog' ),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'SectionDisqus',
);

$wgExtensionMessagesFiles['SectionDisqus'] = __DIR__ . '/SectionDisqus.i18n.php';
$wgAutoloadClasses['SectionDisqus'] = __DIR__ . '/SectionDisqus.body.php';

$wgHooks['BeforePageDisplay'][] = 'SectionDisqus::addResources';
$wgHooks['DoEditSectionLink'][]  = 'SectionDisqus::addDisqusButton';
$wgHooks['SkinAfterContent'][] = 'SectionDisqus::addDisqusDialog';