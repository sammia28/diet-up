$(document).ready(main);
$(".descarga").click(function(){
	alert("DISPONIBLE PRÓXIMAMENTE EN ANDROID Y IOS");
});
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
				top: "0%"
			});
		}
	});
        
    var cont_margin = 1;

    $(".icon-menu").click(function(){
        if (cont_margin == 1) {
            $(".content").animate({
                top : "0"
            });
            cont_margin = 0;
        } else {
            cont_margin = 1;
            $(".content").animate({
                top : "15rem"
            });
        }
    });





	$(window).scroll(function(){
	    var window_y = $(window).scrollTop();
	    var scroll_critical = parseInt($("#header-menu").height());
        if( !isMobile.any() ){
            if (window_y > scroll_critical) {
                $("#header-menu").css("background-color","#FFF");
                $("header nav").addClass("navJS");

                $(".header-logo").css("background-color", "transparent");
                $(".header-logo").css("padding-top", "0px");
                $(".header-logo").css("top", "2px");
                $(".logo-diet-up").css("padding-top", "5px");

            } else if(window_y <= scroll_critical) {
                $("#header-menu").css("background-color","transparent");
                $("header nav").removeClass("navJS");

                $(".header-logo").css("background-color", "#FFF");
                $(".header-logo").css("padding-top", "20px");
                $(".header-logo").css("top", "15px");
                $(".logo-diet-up").css("padding-top", "0px");
            }
        }
	});

}

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
