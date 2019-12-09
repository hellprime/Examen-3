$(document).ready(function () {
    var navOpen = false;
    $('.toggle-nav').click(function () {
        if (navOpen == false) {
            $('.wrapper').css("position", "absolute").animate({
                left: "30%"
            });
            $(this).animate({
                left: "30%"
            }).removeClass("entypo-menu").addClass("entypo-cancel");
            $('nav').animate({
                left: "0%"
            });
            navOpen = true;
        } else {
            $('.wrapper').animate({
                left: "0%"
            }, function () {
                $(this).css("position", "relative");
            });
            $(this).animate({
                left: "0%"
            }).removeClass("entypo-cancel").addClass("entypo-menu");
            $('nav').animate({
                left: "-30%"
            });
            navOpen = false;
        }
    });

    // Smooth Anchor Scrolling
    $('a').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500);
        return false;
    });
});

$(document).ready(function () {
    var menu = $('#menu'),
            pos = menu.offset();

    $(window).scroll(function () {
        console.log(menu);
        if ($(this).scrollTop() > pos.top + menu.height() && menu.hasClass('default')) {
            menu.fadeOut('fast', function () {
                $(this).removeClass('default').addClass('fixed').fadeIn('fast');
            });
            $(".wrapper").addClass('fixed');
        } else if ($(this).scrollTop() <= pos.top && menu.hasClass('fixed')) {
            menu.fadeOut('fast', function () {
                $(this).removeClass('fixed').addClass('default').fadeIn('fast');
            });
            $(".wrapper").removeClass('fixed');
        }
    });

});