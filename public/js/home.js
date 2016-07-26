$("document").ready(function () {
    // scroll 監聽
    var currentScroll = $(this).scrollTop();
    if (currentScroll == 0 ) {
        $('.navbar.navbar-ncufresh').css('background-color','transparent').css('font-size','1em');
    }
    $(window).scroll(function () {
        currentScroll = $(this).scrollTop();
        if (currentScroll != 0 ) {
            $('.navbar.navbar-ncufresh').css('background-color','#20d4bb').css('font-size','1.15em');
        } else {
            $('.navbar.navbar-ncufresh').css('background-color','transparent').css('font-size','1em');
        }
    });

    // 換生活照
    $("#logo").backstretch([
        "img/home/background1.jpg"
      , "img/home/background2.jpg"
      , "img/home/background3.jpg"
    ], {duration: 3000, fade: 1250});

    // 隨機季節
    var spring = 'img/home/spring.png';
    var spring_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%)';
    var summer = 'img/home/summer.png';
    var summer_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(145,214,234,.8) 100%)'
    var fall = 'img/home/fall.png';
    var fall_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%)';
    var winter = 'img/home/winter.png';
    var winter_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(1,50,104,.8) 100%)';
    // final var
    var primary_color = '';
    var background_url = '';
    var background_color = '';

    var rand = Math.floor((Math.random() * 4) + 1);
    switch(rand) {
        case 1:
            background_url = spring;
            background_color = spring_bc;
            primary_color = 'spring';
            break;
        case 2:
            background_url = summer;
            background_color = summer_bc;
            primary_color = 'summer';
            break;
        case 3:
            background_url = fall;
            background_color = fall_bc;
            primary_color = 'fall';
            break;
        case 4:
            background_url = winter;
            background_color = winter_bc;
            primary_color = 'winter'
            break;
        default:
            console.log('fuck');
    }
    $("main").css("background-image"," url("+'../'+background_url+") ");
    $("body").css("background", background_color);
    $("#ann i").addClass(primary_color + '_c');
    $("#timeline .timeline-item .timeline-icon").addClass(primary_color + '_c');
    $("#timeline .timeline-item .timeline-content h2").addClass(primary_color + '_c');
    // 難用
    $("#timeline").addClass(primary_color); // 線
    $("#timeline .timeline-item .timeline-content.left").addClass(primary_color); // 左箭頭
    $("#timeline .timeline-item .timeline-content.right").addClass(primary_color); // 右箭頭
});
