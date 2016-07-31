$("document").ready(function () {

    // scroll 監聽
    var window_height = 0;//$(window).height() - 50;
    var currentScroll = $(this).scrollTop();
    if (currentScroll < window_height ) {
        $('.navbar.navbar-ncufresh').css('background-color','transparent');
    }
    $(window).scroll(function () {
        currentScroll = $(this).scrollTop();
        if (currentScroll > window_height ) {
            $('.navbar.navbar-ncufresh').css('background-color','#212121');
        } else {
            $('.navbar.navbar-ncufresh').css('background-color','transparent');
        }
    });

});
