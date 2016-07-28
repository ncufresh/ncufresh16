$("document").ready(function () {

    // scroll 監聽
    var currentScroll = $(this).scrollTop();
    if (currentScroll == 0 ) {
        $('.navbar.navbar-ncufresh').css('background-color','transparent');
    }
    $(window).scroll(function () {
        currentScroll = $(this).scrollTop();
        if (currentScroll != 0 ) {
            $('.navbar.navbar-ncufresh').css('background-color','#20d4bb');
        } else {
            $('.navbar.navbar-ncufresh').css('background-color','transparent');
        }
    });

});
