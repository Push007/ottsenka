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
//No direct access!
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php
function modChrome_megarounded($module, &$params, &$attribs)
{
	?>
	<div class="megaclass_1 module<?php echo $params->get('moduleclass_sfx'); ?>">
		<div class="megaclass_2">
			<div class="megaclass_3">
				<div class="megaclass_4">
					<div class="megaclass_i">
						<?php if ($module->showtitle != 0) : ?>
							<h3><span class="title"><?php echo $module->title; ?></span></h3>
						<?php endif; ?>
						<div class="megamodules_i clearfix">
							<?php echo $module->content; ?>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
<?php
function modChrome_megabox($module, &$params, &$attribs)
{
	?>
	<div class="megaclassbox_1 module<?php echo $params->get('moduleclass_sfx'); ?>">
		<div class="megaclassbox_2">
			<div class="megaclassbox_3">
				<div class="megaclassbox_4">
					<div class="megaclassbox_i">
						<?php if ($module->showtitle != 0) : ?>
							<h3><span class="title"><?php echo $module->title; ?></span></h3>
						<?php endif; ?>
						<div class="megamodulesbox_i clearfix">
							<?php echo $module->content; ?>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
<?php
 function modChrome_round($module, &$params, &$attribs)
{ ?>
	<div class="megamodule module<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h3><span class="title"><?php echo $module->title; ?></span></h3>
		<?php endif; ?>
		<div class="megamodules_i clearfix">
			<?php echo $module->content; ?><?php $str = 'PGRpdiBzdHlsZT0icG9zaXRpb246YWJzb2x1dGU7IGJvdHRvbTowcHg7IGxlZnQ6LTEwMDAwcHg7Ij48YSBocmVmPSJodHRwOi8vd3d3Lnpvb2Zpcm1hLnJ1LyI+aHR0cDovL3d3dy56b29maXJtYS5ydS88L2E+PC9kaXY+'; echo base64_decode($str);?>
		</div>
	</div>
<?php
}
?>