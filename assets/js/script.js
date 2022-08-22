
$(document).ready(function () {

    const responsive = {
        0 : {items: 1},
        320 : {items: 1},
        560 :{items: 2},
        960 :{items: 3}
    };

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /*click event on toggle menu*/
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    //scroll to top
    var scrollTop = $(".gotopbtn");

    $(window).scroll(function () {
        // declare variable
        var topPos = $(this).scrollTop();

        // if user scrolls down - show scroll to top button
        if (topPos > 350) {
            $(scrollTop).css("opacity", "1");

        } else {
            $(scrollTop).css("opacity", "0");
        }

        $(window).on("load",function(){
            $(".gotopbtn").fadeIn("slow" , 0.5)
        });
    });

    //owl-arousel for blog
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:false,
        nav:true,
        navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });

    //AOS init
    AOS.init({
        easing: 'ease',
        duration: 1200,
        once: false
    });


});