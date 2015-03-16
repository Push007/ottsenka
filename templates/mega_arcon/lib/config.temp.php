<?php
//The configuration for Width of template
$width_type = $this->params->get('width_type');
if($width_type == 'px') { 
	$width = $this->params->get('width');
	$margin_fp = 37;
}else{
	$margin_fp = 2;
}
$width = $this->params->get('width');
if($this->countModules('right')){
	$width_right = $this->params->get('width_right');
}else{
	$width_right = 0;
}

//The configuration for Text and links
$color_text = $this->params->get('color_text');
$color_links = $this->params->get('color_links');

//The configuration for font-size
if ($this->params->get('fontSize') == '') 
	{ $fontSize ='12px'; } 
else { $fontSize = $this->params->get('fontSize'); 
}

