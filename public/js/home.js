$("document").ready(function () {
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
    var background_url = '';
    var background_color = '';
    var rand = Math.floor((Math.random() * 4) + 1);
    switch(rand) {
        case 1:
            background_url = spring;
            background_color = spring_bc;
            break;
        case 2:
            background_url = summer;
            background_color = summer_bc;
            break;
        case 3:
            background_url = fall;
            background_color = fall_bc;
            break;
        case 4:
            background_url = winter;
            background_color = winter_bc;
            break;
        default:
            console.log('fuck');
    }
    $("#all").css("background-image"," url("+'../'+background_url+") ");//.css('background-attachment','fixed');
    $("body").css("background",background_color);
});
