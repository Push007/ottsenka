<?php
/**
 # mega_arcon - Mega Arcon Template for Joomla! 1.7
 # author 		OmegaTheme.com
 # copyright 	Copyright(C) 2011 - OmegaTheme.com. All Rights Reserved.
 # @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Website: 	http://omegatheme.com
 # Technical support: Forum - http://omegatheme.com/forum/
**/
/**------------------------------------------------------------------------
 * file: checkmods.php 1.7.0 00001, June 2011 12:00:00Z OmegaTheme $
 * package:	Mega Arcon Template
 *------------------------------------------------------------------------*/

if($this->countModules('slideshow')){
	$has_slideshow = 'has_slideshow';
}else{
	$has_slideshow = '';
}

//
if($this->countModules('botmod-1 + botmod-2')){
	$has_footer = 'has_footer';
}else{
	$has_footer = '';
}