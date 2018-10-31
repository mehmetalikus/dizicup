$(function(){
	
	var img = $("#bgPicker").find("img");
	img.click(function(){
		var imageUrl = $(this).attr("src");
		//alert(imageUrl);
		$('body').css('background-image', 'url(' + imageUrl + ')');
	
	});




})