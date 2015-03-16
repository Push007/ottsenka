<?php
/**
 # mod_megahorizontalscroller - Mega Horizontal Scroller Module for Joomla! 1.7
 # author 		OmegaTheme.com
 # copyright 	Copyright(C) 2011 - OmegaTheme.com. All Rights Reserved.
 # @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Website: 	http://omegatheme.com
 # Technical support: Forum - http://omegatheme.com/forum/
**/
/**------------------------------------------------------------------------
 * file: mod_megahorizontalscroller.php 1.7.0 00001, Feb 2011 12:00:00Z OmegaTheme $
 * package:	Mega Mega Horizontal Scroller Module
 *------------------------------------------------------------------------*/
//No direct access!
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$doc = &JFactory::getDocument();
$doc->addStyleSheet(JURI::base().'modules/mod_megahorizontalscroller/assets/css/style.css');
if ($params->get('load_jquery') == 1) {
	$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery-1.3.2.min.js');
}
$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery.easing.1.3.js');
$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery.timers-1.1.2.js');
$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery.galleryview-1.1.js');
$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery.thum.js');
$doc->addScript(JURI::base().'modules/mod_megahorizontalscroller/assets/js/jquery.ae.image.resize.min.js');

$list = modMegaNewsHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_megahorizontalscroller');
?>