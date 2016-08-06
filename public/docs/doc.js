$(document).ready(function() {
    // remove inline style of table, th, tr, td
    $("div.modal-body").find("table, th, tr, td").removeAttr("style");

    // 讓圖片自適應大小
    $("div.modal-body").find("img").addClass("img-responsive").removeAttr("style");

    // 設定智慧財產權的圖片最大寬度
    $("img[alt='智慧財產權']").css("max-height",600);

    // fadeIn() animation
    $("body").fadeIn("slow");

    // 垂直置中
    $("#innerLeftSidenav").css("padding-top", ($(window).innerHeight() - $("#innerLeftSidenav").height()) / 2);
    $("#innerLeftPage-1").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-1").height()) / 2);
    $("#innerLeftPage-2").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-2").height()) / 2);
    $("#innerLeftPage-3").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-3").height()) / 2);
    $("#innerRightSidenav").css("padding-top", ($(window).innerHeight() - $("#innerRightSidenav").height()) / 2);
    $("#innerRightPage-1").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-1").height()) / 2);
    $("#innerRightPage-2").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-2").height()) / 2);
    $(".img-wrapper").css("padding-top", ($(window).innerHeight() - $(".img-wrapper").height()) / 2);

    // 點下 "開啟大學部畫面" 或 "開啟研究所畫面" 的圖片時
    $("div a[href='#under-1'], div a[href='#graduate-1']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        if (hash === "#under-1") {
            $("#leftScreen").fadeIn("fast");
            $("#rightScreen").hide();
            $("#innerLeftSidenav").css("padding-top", ($(window).innerHeight() - $("#innerLeftSidenav").height()) / 2);
            $("#innerLeftPage-1").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-1").height()) / 2);
            $("#innerLeftPage-2").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-2").height()) / 2);
            $("#innerLeftPage-3").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-3").height()) / 2);
        } else {
            $("#leftScreen").hide();
            $("#rightScreen").fadeIn("fast");
            $("#innerRightSidenav").css("padding-top", ($(window).innerHeight() - $("#innerRightSidenav").height()) / 2);
            $("#innerRightPage-1").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-1").height()) / 2);
            $("#innerRightPage-2").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-2").height()) / 2);
        }
        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').stop().animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

    // 滑鼠進入方形按鈕的特效
    $(".btn-wrapper").mouseenter(function() {
        $(this).find(".btn-mouseenter").stop().fadeOut("fast");
        $(this).find(".btn-mouseleave").stop().fadeIn("fast");
    });

    // 滑鼠離開方形按鈕的特效
    $(".btn-wrapper").mouseleave(function() {
        $(this).find(".btn-mouseleave").stop().fadeOut("fast");
        $(this).find(".btn-mouseenter").stop().fadeIn("fast");
    });

    // 切換研究所的三個主項目畫面
    $("li a[href='#graduate-1'], li a[href='#graduate-2']").on('click', function(event) {
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
        $('html, body').stop().animate({
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
        $('html, body').stop().animate({
            scrollTop: $("#leftScreen").offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

    // 調整視窗大小時
    $(window).resize(function() {
        // 垂直置中
        $("#innerLeftSidenav").css("padding-top", ($(window).innerHeight() - $("#innerLeftSidenav").height()) / 2);
        $("#innerLeftPage-1").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-1").height()) / 2);
        $("#innerLeftPage-2").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-2").height()) / 2);
        $("#innerLeftPage-3").css("padding-top", ($(window).innerHeight() - $("#innerLeftPage-3").height()) / 2);
        $("#innerRightSidenav").css("padding-top", ($(window).innerHeight() - $("#innerRightSidenav").height()) / 2);
        $("#innerRightPage-1").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-1").height()) / 2);
        $("#innerRightPage-2").css("padding-top", ($(window).innerHeight() - $("#innerRightPage-2").height()) / 2);
        $(".img-wrapper").css("padding-top", ($(window).innerHeight() - $(".img-wrapper").height()) / 2);
    });

    // 
    $("a[href='#midScreen'], a[href='#bottomScreen']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').stop().animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow");
    });

    $(".img-wrapper").mouseenter(function() {
        $(this).find("img").stop().animate({
            "width": "27vw",
            "padding-top": "0"
        }, "fast");
    });

    $(".img-wrapper").mouseleave(function() {
        $(this).find("img").stop().animate({
            "width": "25vw",
            "padding-top": "2vw"
        }, "fast");
    });
});
