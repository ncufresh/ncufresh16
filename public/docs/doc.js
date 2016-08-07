$(document).ready(function() {
    // remove inline style of table, th, tr, td
    $("div.modal-body").find("table, th, tr, td").removeAttr("style");

    // 讓圖片自適應大小
    $("div.modal-body").find("img").addClass("img-responsive").removeAttr("style");

    // 設定智慧財產權的圖片最大寬度
    $("img[alt='智慧財產權']").css("max-height", 600);

    // hide
    $("#under-2, #under-3").hide();

    // fadeIn() animation
    $("body").fadeIn("slow");

    // 點下 "開啟大學部畫面" 或 "開啟研究所畫面" 的圖片時
    $("div a[href='#under-1'], div a[href='#graduate-1']").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        if (hash === "#under-1") {
            $("#under-1").css("display", "inline-table");
            $("#under-2, #under-3").hide();
            $("#leftScreen").fadeIn("fast");
            $("#rightScreen").hide();
        } else {
            $("#leftScreen").hide();
            $("#graduate-1").css("display", "inline-table");
            $("#graduate-2").hide();
            $("#rightScreen").fadeIn("fast");
        }
        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').stop().animate({
            scrollTop: $("#midScreen").offset().top - $("nav").height()
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
                $("#graduate-1").css("display", "inline-table");
                $("#graduate-2").hide();
                break;
            case "#graduate-2":
                $("#graduate-1").hide();
                $("#graduate-2").css("display", "inline-table");
                break;
        }

        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').stop().animate({
            scrollTop: $("#midScreen").offset().top - $("nav").height()
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
                $("#under-1").css("display", "inline-table");
                $("#under-2").hide();
                $("#under-3").hide();
                break;
            case "#under-2":
                $("#under-1").hide();
                $("#under-2").css("display", "inline-table");
                $("#under-3").hide();
                break;
            case "#under-3":
                $("#under-1").hide();
                $("#under-2").hide();
                $("#under-3").css("display", "inline-table");
                break;
        }

        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').stop().animate({
            scrollTop: $("#midScreen").offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

    // 
    $("a[href='#bottomScreen']").on('click', function(event) {
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

    // 滑鼠進入
    $(".img-wrapper").mouseenter(function() {

        if ($(window).width() > 767) {
            $(this).find("img").stop().animate({
                // 滑鼠進入的圖片大小
                "width": "27vw",
                "padding-top": "0"
            }, "fast");
        } else {
            $(this).find("img").stop().animate({
                // 滑鼠進入的圖片大小
                "width": "42vw",
                "padding-top": "0"
            }, "fast");
        }


    });

    // 滑鼠離開
    $(".img-wrapper").mouseleave(function() {
        if ($(window).width() > 767) {
            $(this).find("img").stop().animate({
                // 滑鼠離開的圖片大小
                "width": "25vw",
                "padding-top": "2vw"
            }, "fast");
        } else {
            $(this).find("img").stop().animate({
                // 滑鼠離開的圖片大小
                "width": "40vw",
                "padding-top": "2vw"
            }, "fast");
        }
    });
});
