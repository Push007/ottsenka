/* Document javascript */
function equalHeightBox () {
	var elements = $$('.mega_tops .megaclassbox_i');
	var maxHeight = 0;
	/* Get max height */
	elements.each(function(item, index){
		var height = parseInt(item.getStyle('height'));
		if(height > maxHeight){ maxHeight = height; }
	});
	elements.setStyle('height', maxHeight+'px');
}
window.addEvent ('load', function() {
	equalHeightBox();
});