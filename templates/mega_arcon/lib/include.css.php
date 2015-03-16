<?php
//Document css include
$doc = &JFactory::getDocument();
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/layout.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/typography.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/customs.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/menu.css');
?>