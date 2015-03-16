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
 * file: modules.php 1.7.0 00001, June 2011 12:00:00Z OmegaTheme $
 * package:	Mega Arcon Template
 *------------------------------------------------------------------------*/
function splitmodules($template,$array_modules,$totalwidth=100,$firstwidth=0){
	// for example to call this function  
	//$spotlight = array ('user1','user2','top','user5');
	//$botsl = splitmodules($this,$spotlight,99,22);
	$modules = array();
	$modules_s = array();
	foreach($array_modules as $position){
		if( $template->countModules($position) ){
			$modules_s[] = $position;
		}
	}
	
	if (count($modules_s) == 0) return null;
	
	if ($firstwidth) {
		if (count($modules_s)>1) {
			$width = round(($totalwidth-$firstwidth)/(count($modules_s)-1),1) . "%";
			$firstwidth = $firstwidth . "%";
		}else{
			$firstwidth = $totalwidth . "%";
		}
	}else{
		$width = round($totalwidth/(count($modules_s)),1) . "%";
		$firstwidth = $width;
	}
	if ( count($modules_s)> 1 ){
		$modules[$modules_s[0]]['class'] = ' firstbox';
		$modules[$modules_s[0]]['width'] = $firstwidth;
		for($i=1; $i<count($modules_s); $i++){				
			if( $i < count($modules_s)-1 ){
				$modules[$modules_s[$i]]['class'] = ' midbox';
			}else $modules[$modules_s[$i]]['class'] = ' lastbox';
								
			$modules[$modules_s[$i]]['width'] = $width;
		}
	}elseif( count($modules_s) ==1){
		$modules[$modules_s[0]]['width'] = '100%';
		$modules[$modules_s[0]]['class'] = '';
	}
	return $modules;
}

//check browser IE7
function ie7() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 7')) return true;
	return false;
}
//check browser IE6
function ie6() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 6')) return true;
	return false;
}
?>