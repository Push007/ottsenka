<?php

/*------------------------------------------------------------------------
# "Hot Photo Gallery" Joomla plugin
# Copyright (C) 2010 ArhiNet d.o.o. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

class plgContentPhotogallery extends JPlugin
{
	

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		// just startup
		// global $mainframe; ????
		
		// checking
		if (strpos($article->text, 'photogallery') === false) {
			return true;
		}
		
		$regex		= '#{photogallery}(.*?){/photogallery}#s';
		$matches	= array();
		
		$enablejQuery = $this->params->def('enablejQuery', '1');
		$jQueryMode = $this->params->def('jQueryMode', '1');
		$images_per_row = $this->params->def('imagesRow', '3');
		$borderWidth = $this->params->def('borderWidth', '1');
		$borderColor = $this->params->def('borderColor', '#cccccc');
		$borderHoverColor = $this->params->def('borderHoverColor', '#999999');
		$thumbsMarginH = $this->params->def('thumbsMarginH', '10');
		$thumbsMarginV = $this->params->def('thumbsMarginV', '10');
		$thumbsPadding = $this->params->def('thumbsPadding', '3');
		$thumbs_width = $this->params->def('thumbsWidth', '200');
		$thumbs_height = $this->params->def('thumbsHeight', '200');
		$image_quality = $this->params->def('imageQuality', '80');
		
		// $plugin =& JPluginHelper::getPlugin('content', 'photogallery');
		// $pluginParams = new JParameter( $plugin->params );	
		
		// find all instances of plugin and put in $matches
		preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);
		
		$photogallerycount = -1;
		
		foreach ($matches as $match) {
			       
				$photogallerycount++;
				$images_dir = preg_replace("/{.+?}/", "", $match);
				$images_dir[0] = $images_dir[0]."/";
				$images_dir_var = $images_dir[0];
				$images_dir2 = preg_replace("/{.+?}/", "", $match);
				$thumbs_dir = $images_dir[0]."thumbs/";
				
				
				// START gallery code
				
				/* function: creates thumbnails */
				
				if(!function_exists('make_thumb')){			
					function make_thumb($Dir,$Image,$NewDir,$NewImage,$MaxWidth,$MaxHeight,$Quality) {
					  list($ImageWidth,$ImageHeight,$TypeCode)=getimagesize($Dir.$Image);
					  $ImageType=($TypeCode==1?"gif":($TypeCode==2?"jpeg":
								 ($TypeCode==3?"png":FALSE)));
					  $CreateFunction="imagecreatefrom".$ImageType;
					  $OutputFunction="image".$ImageType;
					  if ($ImageType) {
						$Ratio=($ImageHeight/$ImageWidth);
						$ImageSource=$CreateFunction($Dir.$Image);
						if ($ImageWidth > $MaxWidth || $ImageHeight > $MaxHeight) {
						  if ($ImageWidth > $MaxWidth) {
							 $ResizedWidth=$MaxWidth;
							 $ResizedHeight=$ResizedWidth*$Ratio;
						  }
						  else {
							$ResizedWidth=$ImageWidth;
							$ResizedHeight=$ImageHeight;
						  }       
						  if ($ResizedHeight > $MaxHeight) {
							$ResizedHeight=$MaxHeight;
							$ResizedWidth=$ResizedHeight/$Ratio;
						  }      
						  $ResizedImage=imagecreatetruecolor($ResizedWidth,$ResizedHeight);
						  imagecopyresampled($ResizedImage,$ImageSource,0,0,0,0,$ResizedWidth,
											 $ResizedHeight,$ImageWidth,$ImageHeight);
						}
						else {
						  $ResizedWidth=$ImageWidth;
						  $ResizedHeight=$ImageHeight;     
						  $ResizedImage=$ImageSource;
						}   
						$OutputFunction($ResizedImage,$NewDir.$NewImage,$Quality);
						return true;
					  }   
					  else
						return false;
					}
				}
				
				/* function:  returns files from dir */
				if(!function_exists('get_files')){
					function get_files($images_dir_var,$exts = array('jpg')) {
						$files = array();
						if($handle = opendir($images_dir_var)) {
							while(false !== ($file = readdir($handle))) {
								$extension = strtolower(get_file_extension($file));
								if($extension && in_array($extension,$exts)) {
									$files[] = $file;
								}
							}
							closedir($handle);
						}
						return $files;
					}
				}
				
				/* function:  returns a file's extension */
				if(!function_exists('get_file_extension')){
					function get_file_extension($file_name) {
						return substr(strrchr($file_name,'.'),1);
					}
				}

				/** settings **/
				
				//$images_dir = 'preload-images/';
				if(!is_dir($images_dir[0]."thumbs")) {
				       mkdir($images_dir[0]."thumbs", 0777);
				}

				//$thumbs_width = 200;
				//$images_per_row = 3;
				
				// adding CSS and JS in head
				$doc =& JFactory::getDocument();
				
				// add your stylesheet
				$doc->addStyleSheet( JURI :: base().'plugins/content/photogallery/css/jquery.lightbox-0.5.css' );
				
				// style declaration
				$doc->addStyleDeclaration( '
				
				.clear { clear:both; }
				#gallery img { margin:0px '.$thumbsMarginV.'px '.$thumbsMarginH.'px 0px; padding:'.$thumbsPadding.'px; border:'.$borderWidth.'px solid '.$borderColor.'; display:block; float:left; }
				#gallery img:hover { border-color:'.$borderHoverColor.'; }
				
				' );
				
				/** generate photo gallery **/
				
				if($photogallerycount < 1){
				if ($enablejQuery!=0) {
				echo '<script type="text/javascript" src="'.JURI :: base().'plugins/content/photogallery/js/jquery.min.js"></script>';
				}
				if ($jQueryMode!=0) {
				echo '
				<script type="text/javascript">
				
					jQuery.noConflict();
				
     				</script>
				';
				}
				
				$UniqueNo = rand();
				echo '<script type="text/javascript" src="'.JURI :: base().'plugins/content/photogallery/js/jquery.lightbox-0.5.min.js"></script>';
				?>
			        <script type="text/javascript">
					HJT_SITE_BASE = '<?php echo JURI :: base(); ?>';
			        jQuery(document).ready(function(){
						jQuery(function() {
						       if(jQuery('.hjtpgal<?php echo $UniqueNo;?> a'))
								jQuery('.hjtpgal<?php echo $UniqueNo;?> a').lightBox();
						});
					});
					</script>
                <?php
                }
                $output = '<!-- HOT Photo Gallery Plugin starts here -->';
				$output.= '<div id="gallery" class="photogallery_plg  hjtpgal'.$UniqueNo.'" >';
				$image_files = get_files($images_dir_var);
				
				sort($image_files);
				
				if(count($image_files)) {
					$index = 0;
					foreach($image_files as $index=>$file) {
						$index++;
						$thumbnail_image = $thumbs_dir."thumb_".$file;
						if(!file_exists($thumbnail_image)) {
							$extension = get_file_extension($thumbnail_image);
							if($extension) {
								make_thumb($images_dir[0],$file,$thumbs_dir,"thumb_".$file,$thumbs_width,$thumbs_height,$image_quality);
							}
						}
						$output.= '<a href="'.$images_dir[0].$file.'"><img src="'.$thumbnail_image.'" /></a>';
						if($index % $images_per_row == 0) { $output.= '<div class="clear"></div>'; }
					}
					$output.= '<div class="clear"></div>';
				}
				else {
					$output.= '<p>There are no images in this gallery.</p>';
				}
				$output.= '</div>';
				
				$article->text = preg_replace( "#{photogallery}".$images_dir2[0]."{/photogallery}#s", $output , $article->text );
				
				// END gallery code
			
		}	
	}
}