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
 * file: component.php 1.7.0 00001, June 2011 12:00:00Z OmegaTheme $
 * package:	Mega Arcon Template
 *------------------------------------------------------------------------*/
//No direct access!
defined( '_JEXEC' ) or die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/typography.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/customs.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/menu.css" rel="stylesheet" type="text/css" />
</head>
<body class="mega_page">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
