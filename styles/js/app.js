$(document).ready(cargar);

var contador = 1;
//var cont_margin = 1;

function cargar (){

    $(".descarga").click(function(){
        alert("DISPONIBLE PRÓXIMAMENTE EN ANDROID Y IOS");
    });

    /*if( isMobile.any() ){
        $(".text-funciona").click(function(){
            $(window).scrollTop(200);
        });
    }*/

    if( isMobile.any() ){
        $("nav").css("display", "none");

        $(".icon-menu").click(function(){
            if (contador == 1) {
                $("nav").css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                contador = 0;
            } else {
                $("nav").css('opacity', 1)
                    .slideUp(0)
                    .animate(
                        { opacity: 0 },
                        { queue: false, duration: 1 }
                    );
                contador = 1;
            }
        });
    }
};

$(document).ready(main);

function main () {

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
                $("#header-menu").css("border-bottom", "3px solid #999");
            } else if(window_y <= scroll_critical) {
                $("#header-menu").css("background-color","transparent");
                $("header nav").removeClass("navJS");

                $(".header-logo").css("background-color", "#FFF");
                $(".header-logo").css("padding-top", "20px");
                $(".header-logo").css("top", "15px");
                $(".logo-diet-up").css("padding-top", "0px");
                $("#header-menu").css("border-bottom", "none");
            }
        }
    })

    /*OCULTAR MENU AL HACER CLIK()*/

    $("#header-menu nav ul li a").click(function() {
        if( isMobile.any() ){
            $(".icon-menu").click();
            contador = 1;
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
