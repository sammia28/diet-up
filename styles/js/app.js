$(document).ready(main);
var contador = 1;
function main () {
	$(".menu_bar").click(function(){
		if (contador == 1) {
			$("nav").animate({
				top: "-100%"
			});
			contador = 0;
		} else {
			contador = 1;
			$("nav").animate({
				top: "14%"
			});
		}
	});
	$(window).scroll(function(){
	    window_y = $(window).scrollTop();
	    scroll_critical = parseInt($("#header-menu").height());
	    if (window_y > scroll_critical) {
	       $("#header-menu").css("background-color","#14c6ae");
	    } else {
	    	$("#header-menu").css("background-color","transparent");
	    }
	});
}

