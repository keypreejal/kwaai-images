/*
 * Url preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
this.screenshotPreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.screenshot").hover(function(e){


		//addded for dynamic position

		
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='url preview' />"+ c +"</p>");
winwidth = $(window).innerWidth();
posleft = $(this).offset().left;
// posright = $(this).offset().right;
// console.log(posright);
postop = $(this).offset().top;
// console.log(postop);
totalwidth = $(window).width();
right = totalwidth-posleft;

// leftfinal = totalwidth-posright;
 leftposfinal = posleft+180;
 //console.log(winwidth-e.pageX);

if((winwidth-e.pageX)>550){
	// $("#screenshot")
	// 		.css("top",(e.pageY - xOffset) + "px")
	// 		.css("left",(e.pageX + yOffset) + "px")
	// 		.fadeIn("fast");
	$("#screenshot")
			.css("top",postop + "px")
			.css("left",leftposfinal+ "px")
			.fadeIn("fast");
}
else{
	$("#screenshot")
			.css("top",postop + "px")
			.css("right",right + "px")
			.fadeIn("fast");
}

		

			// console.log(e.pageX);
			// console.log(xOffset);
			// console.log(yOffset);
								
		$("#screenshot").addClass('test');
		$(this).addClass('imgtest');
    },
	function(){
		this.title = this.t;	
		$("#screenshot").remove();
    });	
	// $("a.screenshot").mousemove(function(e){
	// 	winwidth = $(window).innerWidth();
	// 	if((winwidth-e.pageX)>440){
	// 		$("#screenshot")
	// 			.css("top",(e.pageY - xOffset) + "px")
	// 			.css("left",(e.pageX + yOffset) + "px");
	// 	}
	// 	else{
	// 		$("#screenshot")
	// 		.css("top",(e.pageY - xOffset) + "px")
	// 		.css("right",400 + "px")
	// 		.fadeIn("fast");
	// 	}		
	// });			
};


// starting the script on page load
$(document).ready(function(){
	screenshotPreview();
});