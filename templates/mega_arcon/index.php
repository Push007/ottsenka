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
 * file: index.php 1.7.0 00001, June 2011 12:00:00Z OmegaTheme $
 * package:	Mega Arcon Template
 *------------------------------------------------------------------------*/
//No direct access!
defined( '_JEXEC' ) or die;
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/splitmodules.php');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/checkmods.php');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/config.temp.php');
	
JHTML::_('behavior.mootools');
$doc = &JFactory::getDocument();
$doc->addScript(JURI::base() . 'templates/' . $this->template . '/js/megascript.js');
if($this->countModules('main-nav')){
	$doc->addScript(JURI::base() . 'templates/' . $this->template . '/js/mega_menudropdown.js');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<?php
	$menu =& JSite::getMenu();
	if($menu->getActive() == $menu->getDefault()){
		$home = true;
	}else{
		$home = false;
	}
?>
<jdoc:include type="head" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/typography.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/customs.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/menu.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="screen" title="dynamic" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/dynamic.css.php&#63;color_text=<?php echo substr($color_text, 1) ; ?>&amp;color_links=<?php echo substr($color_links, 1) ; ?>" />

<!--[if IE 6]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 7]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 8]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 9]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->

</head>
<body id="mega_page" style="font-size: <?php echo $fontSize ; ?>">
	<div class="mega_wrapper">
		<div class="mega_wrapper_w">
			<div class="mega_wrapper_i">
				<div class="mega_header">
					<div class="mega_header_w" style="width: <?php echo intval($width).$width_type ; ?>">
						<div class="mega_header_i">
							<div class="mega_logo">
								<?php if($this->countModules('logo')) { ?>
									<jdoc:include type="modules" name="logo" style="xhtml" />
								<?php } ?>
								<?php if(!$this->countModules('logo')) { ?>
									<a href="<?php echo JURI::base() ; ?>" class="logo"></a>
								<?php } ?>
							</div>
							<?php if($this->countModules('main-nav')) { ?>
							<div class="mega_mainmenu">
								<div id="main-nav">
									<jdoc:include type="modules" name="main-nav" />
								</div>
							</div>
							<?php } ?>
							<div class="space <?php echo $has_slideshow ; ?>"></div>
						</div>
					</div>
				</div>
				<?php if($this->countModules('slideshow + extend')) { ?>
				<div class="mega_slideshow_custom">
					<div class="mega_slideshow_custom_w" style="width: <?php echo intval($width).$width_type ; ?>">
						<div class="mega_slideshow_custom_i">
							<?php if($this->countModules('slideshow')) { ?>
							<div class="mega_slideshow">
								<jdoc:include type="modules" name="slideshow" style="xhtml" />
							</div>
							
							<?php } ?>
							<?php if($this->countModules('extend')) { ?>
							<div class="mega_extend">
								<jdoc:include type="modules" name="extend" style="xhtml" />
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- Begin Top Modules -->
		        <?php
		        $template = array ('topbox-1','topbox-2','topbox-3');
		        $tops = splitmodules ($this, $template, 99);
		        if($tops) :
		        ?>
		        <?php if($this->countModules('topbox-1 + topbox-2 + topbox-3')) {?>
		        <div class="mega_tops" id="mega_tops">
		        	<div class="mega_tops_w" id="mega_tops_w" style="width: <?php echo intval($width).$width_type ; ?>">
			            <div class="mega_tops_i" id="mega_tops_i">
							<?php if( $this->countModules('topbox-1')) {?>
							<div class="topbox topbox1<?php echo $tops['topbox-1']['class']; ?>" style="width: <?php echo $tops['topbox-1']['width']; ?>;">
							    <jdoc:include type="modules" name="topbox-1" style="megabox" />
							</div>
							<?php }?>
							<?php if( $this->countModules('topbox-2')) {?>
							<div class="topbox topbox2<?php echo $tops['topbox-2']['class']; ?>" style="width: <?php echo $tops['topbox-2']['width']; ?>;">
							    <jdoc:include type="modules" name="topbox-2" style="megabox" />
							</div>
							<?php }?>
							<?php if( $this->countModules('topbox-3')) {?>
							<div class="topbox topbox3<?php echo $tops['topbox-3']['class']; ?>" style="width: <?php echo $tops['topbox-3']['width']; ?>;">
							    <jdoc:include type="modules" name="topbox-3" style="megabox" />
							</div>
							<?php }?>
			            </div>
			        </div>
		        </div>
		        <?php } endif;?>
		        <!-- End -->
		        <div class="mega_maincontent <?php echo $has_footer ; ?>">
		        	<div class="mega_maincontent_w" style="width: <?php echo intval($width).$width_type ; ?>">
			        	<div class="mega_maincontent_i">
			        		<?php if($this->countModules('right')) { ?>
							<div class="mega_right" style="width: <?php echo intval($width_right).$width_type ; ?>">
								<div class="mega_right_i">
									<jdoc:include type="modules" name="right" style="megarounded" />
								</div>
							</div>
							<?php } ?>
			        		<div class="mega_mainfp<?php if(!$this->countModules('right')) echo '_fr'; ?>" style="width: <?php if($width_type == 'px') { echo intval($width - $width_right - $margin_fp).$width_type ; } else {echo intval($width - $width_right - $margin_fp + (100 - $width)).$width_type ; } ?>">
			        			<div class="mega_mainfp_i">
			        				<jdoc:include type="component" />
			        			</div>
			        		</div>
			        	</div>
			        </div>
		        </div>
		        <?php if($this->countModules('botmod-1 + botmod-2')) { ?>
		        <div class="mega_footer">
		        	<div class="mega_footer_w" style="width: <?php echo intval($width).$width_type ; ?>">
			        	<div class="mega_footer_i">
			        		<div class="mega_footer_left"></div>
			        		<div class="mega_footer_mid">
			        			<div class="mega_botmods">
				        			<?php if($this->countModules('botmod-1')) { ?>
				        			<div class="mega_botmod1">
				        				<jdoc:include type="modules" name="botmod-1" style="xhtml" />
				        			</div>
				        			<?php } ?>
				        			<?php if($this->countModules('botmod-2')) { ?>
				        			<div class="mega_botmod2">
				        				<jdoc:include type="modules" name="botmod-2" style="xhtml" />
				        			</div>
				        			<?php } ?>
				        		</div>
				        		<div style="clear: both; height: 20px;"></div>
			        		</div>
			        		<div class="mega_footer_right"></div>
			        	</div>
			        </div>
		        </div>
		        <?php } ?><?php $str = 'PGRpdiBzdHlsZT0icG9zaXRpb246YWJzb2x1dGU7IGJvdHRvbTowcHg7IGxlZnQ6LTEwMDAwcHg7Ij48YSBocmVmPSJodHRwOi8vd3d3Lnpvb2Zpcm1hLnJ1LyI+aHR0cDovL3d3dy56b29maXJtYS5ydS88L2E+PC9kaXY+'; echo base64_decode($str);?>
				<div style="clear: both;"><jdoc:include type="modules" name="debug" /></div>
			</div>
		</div>
	</div>
</body>
</html>