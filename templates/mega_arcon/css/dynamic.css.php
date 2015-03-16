<?php
header("Content-type: text/css");
if (isset($_GET['color_text'])) 
{ 
	$color_text = $_GET['color_text'];
}else{ 
	$color_text = '474747'; 
}

if (isset($_GET['color_links'])) 
{ 
	$color_links = $_GET['color_links'];
}else{
	$color_links = '0078B6'; 
}
?>
/**Custom style for body**/
body#mega_page{
	color: #<?php echo $color_text ; ?>;
}
a{
	color: #<?php echo $color_links ; ?>;
}