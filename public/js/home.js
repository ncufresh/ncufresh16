$("document").ready(function () {
    // 換生活照
    $("#logo").backstretch([
        "img/home/background1.jpg"
      , "img/home/background2.jpg"
      , "img/home/background3.jpg"
    ], {duration: 3000, fade: 1250});
    // 隨機季節
    var spring = 'img/home/spring.png';
    var fall = 'img/home/fall.png';
    var winter = 'img/home/winter.png';
    var url = '';
    var rand = Math.floor((Math.random() * 4) + 1);
    switch(rand) {
        case 1:
            url = spring;
            break;
        case 2:
            url = fall;
            break;
        case 3:
            url = fall;
            break;
        case 4:
            url = winter;
            break;
        default:
            console.log('fuck');
    }
    $("#all").css("background-image"," url("+'../'+url+") ");//.css('background-attachment','fixed');
});
