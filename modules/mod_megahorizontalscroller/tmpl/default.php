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
 * file: default.php 1.7.0 00001, Feb 2011 12:00:00Z OmegaTheme $
 * package:	Mega Mega Horizontal Scroller Module
 *------------------------------------------------------------------------*/
//No direct access!
defined('_JEXEC') or die;
?>
<div id="gallery_wrap" class="<?php echo $params->get('moduleclass_sfx');?>" style="width: <?php echo $params->get('panel_width')?>px;">
	<div id="photos" class="galleryview">
		<?php foreach ($list as $item) :?>
			<div class="panel">
				<?php echo $item->images; ?>
				<div class="panel-overlay">
					<h2 class="heading-title" style="color: <?php echo $params->get('overlay_heading_color') ; ?>">
					<?php if ($params->get('item_title')) : ?>
						<?php if ($params->get('link_titles') && $item->link != '') : ?>
							<a class="title-link" style="color: <?php echo $params->get('overlay_heading_color') ; ?>" href="<?php echo $item->link;?>">
								<?php echo $item->title;?></a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>
					<?php endif; ?></h2>
					<p><?php echo $item->introtext.'...'; ?></p>
					<?php if (isset($item->link) && $item->readmore && $params->get('show_readmore')) :
						echo '<p class="readmore_link"><a style="color: '.$params->get('overlay_link_color').'" class="readmore" href="'.$item->link.'"> '.$params->get('custom_text_readmore'). '</a></p>';
					endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
		<?php 
			if ($params->get('show_filmstrip', 1) == 1) {
				echo '<ul class="filmstrip">';
				foreach ($list as $item) {
					echo '<li>'.$item->thumb_images.'</li>';
				}
				echo '</ul>';
			}else{
				echo '<div class="filmstrip"></div>';
			}
		?>
	</div>
</div>
<?php //var_dump(intval($params->get('frame_height')*2));die(); ?>
<script type="text/javascript">
	var j = jQuery.noConflict();
	j(document).ready(function(){		
		j('#photos').galleryView({
			border: '<?php echo $params->get('border', 'none')?>',
			panel_width: <?php echo $params->get('panel_width', 940)?>,
			panel_height: <?php echo $params->get('panel_height', 350)?>,
			frame_width: <?php echo $params->get('frame_width', 93)?>,
			frame_height: <?php echo $params->get('frame_height', 63)?>,
			background_color: '<?php echo (($params->get('frame_background_type') == 1) ? $params->get('backgroundcolor','#C8CEDE') : '0') ?>',
			show_captions: <?php echo ($params->get('show_captions', 0) == 1 ? 'true':'false') ?>,
			caption_text_color: '<?php echo $params->get('caption_text_color', '#FFFFFF')?>',
			filmstrip_position: '<?php echo $params->get('filmstrip_position', 'bottom')?>',
			frame_space_top: <?php echo $params->get('frame_space_top', 0)?>,
			overlay_position: '<?php echo $params->get('overlay_position', 'bottom')?>',
			overlay_height: <?php echo $params->get('overlay_height', 190)?>,
			overlay_width: <?php echo $params->get('overlay_width', 456)?>,
			overlay_color: '<?php echo $params->get('overlay_color', '#000000')?>',
			overlay_opacity: <?php echo $params->get('overlay_opacity', 0.6)?>,
			overlay_text_color: '<?php echo $params->get('overlay_text_color', '#FFFFFF')?>',
			overlay_font_size: '<?php echo $params->get('overlay_font_size', '12px')?>',
			overlay_heading_color: '<?php echo $params->get('overlay_heading_color', '#FFFFFF')?>',
			overlay_link_color: '<?php echo $params->get('overlay_link_color', '#0078B6')?>',
			transition_speed: <?php echo $params->get('transition_speed', 1000)?>,
			transition_interval: <?php echo $params->get('transition_interval', 4000)?>,
			easing: '<?php echo $params->get('easing','easeInOutBack')?>',
			//pause_on_hover: true,
			nav_theme: 'custom',
			overlay_nav_width: <?php echo $params->get('overlay_nav_width', 39)?>,
			overlay_nav_height: <?php echo $params->get('overlay_nav_height', 39)?>
		});
		/*
		j(".megaresizeme").aeImageResize({height: <?php echo intval($params->get('frame_height')) ?>, width: <?php echo intval($params->get('frame_width')*2)?>});
		j(".megathumb").thumbs();
		j(".megathumbcontainer").css({
			'width': <?php echo intval(trim($params->get('frame_width'))) - 4;?> +'px',
			'height': <?php echo intval(trim($params->get('frame_height'))) - 4;?> +'px',
			'border': '2px #999999 solid'
		});	*/
		j("#gallery_wrap h2").css({
			'color': '<?php echo $params->get('overlay_heading_color','#FFFFFF'); ?>'
		});
		j(".megaresize_thumbs").css({
			'width': '<?php echo intval($params->get('frame_width'))*1.8; ?>'+'px',
			'margin-left': '-<?php echo intval($params->get('frame_width'))/2; ?>'+'px'
		});
	});
</script>