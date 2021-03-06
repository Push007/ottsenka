<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright		Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license			GNU General Public License version 2 or later; see LICENSE.txt
 * @author			Modify by Omegatheme - http://omegatheme.com
 */
//No direct access!
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="mega-wrap-page">
	<div class="categories-list<?php echo $this->pageclass_sfx;?>">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1 class="mega-title">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>
	<?php if ($this->params->get('show_base_description')) : ?>
		<?php 	//If there is a description in the menu parameters use that; ?>
			<?php if($this->params->get('categories_description')) : ?>
				<?php echo  JHtml::_('content.prepare',$this->params->get('categories_description')); ?>
			<?php  else: ?>
				<?php //Otherwise get one from the database if it exists. ?>
				<?php  if ($this->parent->description) : ?>
					<div class="category-desc">
						<?php  echo JHtml::_('content.prepare', $this->parent->description); ?>
					</div>
				<?php  endif; ?>
			<?php  endif; ?>
		<?php endif; ?>
	<?php
	echo $this->loadTemplate('items');
	?>
	</div>
</div>