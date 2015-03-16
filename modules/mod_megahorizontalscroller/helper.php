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
 * file: helper.php 1.7.0 00001, Feb 2011 12:00:00Z OmegaTheme $
 * package:	Mega Mega Horizontal Scroller Module
 *------------------------------------------------------------------------*/
//No direct access!
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';

jimport('joomla.application.component.model');

JModel::addIncludePath(JPATH_SITE.'/components/com_content/models');

abstract class modMegaNewsHelper
{
	public static function getList(&$params)
	{
		$app	= JFactory::getApplication();
		$db		= JFactory::getDbo();

		// Get an instance of the generic articles model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('number_of_article', 5));

		$model->setState('filter.published', 1);

		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.title_alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by,a.publish_up, a.publish_down, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured,' .
			' LENGTH(a.fulltext) AS readmore');
		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language',$app->getLanguageFilter());

		// Set ordering
		$ordering = $params->get('ordering', 'a.publish_up');
		$model->setState('list.ordering', $ordering);
		if (trim($ordering) == 'rand()') {
			$model->setState('list.direction', '');			
		} else {
			$model->setState('list.direction', 'DESC');
		}

		//	Retrieve Content
		$items = $model->getItems();
		
		foreach ($items as &$item) {
			$item->readmore = (trim($item->fulltext) != '');
			$item->slug = $item->id.':'.$item->alias;
			$item->catslug = $item->catid.':'.$item->category_alias;
			
			if ($access || in_array($item->access, $authorised))
			{
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid));
				$item->linkText = JText::_('MOD_ARTICLES_NEWS_READMORE');
			}
			
			else {
				$item->link = JRoute::_('index.php?option=com_user&view=login');
				$item->linkText = JText::_('MOD_ARTICLES_NEWS_READMORE_REGISTER');
			}
			$item->introtext = JHtml::_('content.prepare', $item->introtext);
			
			preg_match_all('/src="([^"]+)"/i', $item->introtext . $item->fulltext, $matches);
			if(empty($matches[1][0])){
				$item->original_images='';
			}else{
				$item->original_images= $matches [1] [0];
			}
			
			$filetype = array('jpg', 'gif', 'png');
			if(!empty($item->original_images) && @file($item->original_images) && in_array(pathinfo($item->original_images, PATHINFO_EXTENSION), $filetype)) {
				$item->thumb_images = '<img src="' .$item->original_images.'" class="megaresize_thumbs" alt="'.$item->title.'" title="'.$item->title.'" />';
				$item->images = '<img src="' .$item->original_images.'" width="'.($params->get('panel_width')).'" height="'.$params->get('panel_height').'" alt="'.$item->title.'" title="'.$item->title.'" />';
			}else{
				$item->thumb_images = '<img src="'.$params->get('default_images').'" class="megaresize_thumbs" alt="'.$item->title.'" title="'.$item->title.'"/>'  ;  
				$item->images	= '<img src="'.$params->get('default_images').'" width="'.intval($params->get('panel_width')).'" height="'.$params->get('panel_height').'" alt="'.$item->title.'" title="'.$item->title.'"/>';
			}
			//Introtext limit
			$item->introtext = strip_tags(preg_replace('/<img[^>]*>/', '', $item->introtext));
			$item->introtext = substr($item->introtext, 0, $params->get('introtext_limit'));
			
			if($params->get('show_readmore')==1){
				$item->readmore = '<a style="color: '.$params->get('overlay_link_color').'" class="readmore" href = "' .$item->link. '" title="'.$item->title.'"> '.$params->get('custom_text_readmore'). '</a>' ; 
			}else{
				$item->readmore ='';
			}
		}
		return $items;
	}
}
?>