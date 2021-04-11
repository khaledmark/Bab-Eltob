
$(document).ready(function(){
    $('.open-menu').click(function(){
        $('.menu2').css({"width":"60%",})
        $('.side-menu-header').css({"left":"40%",})
        $(this).toggle();
        $('.side-menu-headerspan').toggle();

    });
    $('.close-menu').click(function(){
        $(this).parent().css({"width":"0",})
        $('.side-menu-header').css({"left":"0",})
        $('.open-menu').toggle();
        $('.side-menu-header span').toggle();
    });


    $('.opinions .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        rtl:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{
                items:1
            }
        }
    })



    $('.app-screens .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        rtl:true,
        nav:true,
        dots:true,
        // autoplay:true,
        // autoplayTimeout:3000,
        navText:[" " ," "],
        responsive:{
            0:{
                items:1
            }
        }
    })


});

$(document).ready(function(){
    $('.features-head').click (function(){
        $('html, body').animate({
            scrollTop: $("#features").offset().top
        }, 1000);
        return false;
    });

    $('.opinions-head').click (function(){
        $('html, body').animate({
            scrollTop: $("#opinions").offset().top
        }, 2000);
        return false;
    });

    $('.app-screens-head').click (function(){
        $('html, body').animate({
            scrollTop: $("#app-screens").offset().top
        }, 2000);
        return false;
    });
    $('.support-head').click (function(){
        $('html, body').animate({
            scrollTop: $("#support").offset().top
        }, 2000);
        return false;
    });


});

//scroll background color of navbar
$(window).scroll(function() {
    var scrollVal = $(this).scrollTop();
 if ( scrollVal > 250) {
     
     $('.side-menu .side-menu-header').css({'background-color':'#43a2a4'});
 }
   else{
       
     $('.side-menu .side-menu-header').css({'background-color':'transparent'});
   }
 
});
// AOS.init({
//     offset: 100,
//     duration: 500,
//     easing: 'ease-in-quad',
//     delay: 0,
//   });
//     //fancy box
//     $('.various').fancybox({
//         padding : 10,
//         openEffect  : 'fade'
//     });
  


