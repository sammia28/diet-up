$(document).ready(main);
var contador = 1;
function main () {
	// $("nav").css("display" , "none");
	$(".menu_bar").click(function(){
		if (contador == 1) {
			$("nav").animate({
				top: "-100%"
			});
			contador = 0;
		} else {
			contador = 1;
			$("nav").animate({
				top: "1%"
			});
		}
	});
	$(window).scroll(function(){
	    window_y = $(window).scrollTop();
	    scroll_critical = $("#header-menu").height();
	    if (window_y > scroll_critical) {
	       $("#header-menu").css({
			  	"background": "#fff"
			});
	       $(".text-color").css({
	       		"color" : "gray"
	       });
	    } else {
	    	$("#header-menu").css({
	    		"background-color" : "transparent"
	    	});
	    	 $(".text-color").css({
	       		"color" : "#fff"
	       });
	    }
	});
}

