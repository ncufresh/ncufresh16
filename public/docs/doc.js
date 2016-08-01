$(document).ready(function() {
    // fadeIn() animation
    $("body").fadeIn("slow");

    // 高度為螢幕高度
    $("#topScreen, #midScreen").css("height", $(window).innerHeight());

    // 垂直置中
    $("#innerLeftSidenav").css("padding-top", ($(window).innerHeight() - $("#innerLeftSidenav").height()) / 2);
    

    // 點下 "開啟大學部畫面" 或 "開啟研究所畫面" 的圖片時
    $("p a[href='#under-1'], p a[href='#graduate-1']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        if (hash === "#under-1") {
            $("#leftScreen").fadeIn("fast");
            $("#rightScreen").hide();
            $("#innerLeftSidenav").css("padding-top", ($(window).innerHeight() - $("#innerLeftSidenav").height()) / 2);
        } else {
            $("#leftScreen").hide();
            $("#rightScreen").fadeIn("fast");
            $("#innerRightSidenav").css("padding-top", ($(window).innerHeight() - $("#innerRightSidenav").height()) / 2);
        }
        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow");
    });

    // 切換研究所的三個主項目畫面
    $("li a[href='#graduate-1'], li a[href='#graduate-2'], li a[href='#graduate-3']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        switch (hash) {
            case "#graduate-1":
                $("#innerRightPage-1").show();
                $("#innerRightPage-2").hide();
                $("#innerRightPage-3").hide();
                break;
            case "#graduate-2":
                $("#innerRightPage-1").hide();
                $("#innerRightPage-2").show();
                $("#innerRightPage-3").hide();
                break;
            case "#graduate-3":
                $("#innerRightPage-1").hide();
                $("#innerRightPage-2").hide();
                $("#innerRightPage-3").show();
                break;
        }

        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

    // 切換大學部的三個主項目畫面
    $("li a[href='#under-1'], li a[href='#under-2'], li a[href='#under-3']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        switch (hash) {
            case "#under-1":
                $("#innerLeftPage-1").show();
                $("#innerLeftPage-2").hide();
                $("#innerLeftPage-3").hide();
                break;
            case "#under-2":
                $("#innerLeftPage-1").hide();
                $("#innerLeftPage-2").show();
                $("#innerLeftPage-3").hide();
                break;
            case "#under-3":
                $("#innerLeftPage-1").hide();
                $("#innerLeftPage-2").hide();
                $("#innerLeftPage-3").show();
                break;
        }

        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').animate({
            scrollTop: $("#leftScreen").offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

    // 調整視窗大小時
    $(window).resize(function() {

    });

    // 
    $("a[href='#midScreen'], a[href='#bottomScreen']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow");
    });

    // testing
    function test() {
        $(".test1").text();
        $(".test2").text();
        $(".test3").text();
        $(".test4").text();
    }

    $("div p a img").mouseenter(function () {
        $(this).css("width", "40vw");
    });

    $("div p a img").mouseleave(function () {
        $(this).css("width", "35vw");
    });
});
