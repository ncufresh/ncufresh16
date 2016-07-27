$(document).ready(function() {
    // 根據視窗調整按鈕大小、參考值還需要調整!!!
    $("img").width($(window).height() / 4);

    // @override body attr.
    // fadeIn() animation
    $("body").attr("data-target", ".scrollspy").css("overflow", "auto").fadeIn("slow");

    $(".jumbotron").css({
        // 在上方導覽列的位置留空
        "padding-top": $("nav").height(),
        // 設定高度
        "height": $(window).height() - $(".footer-below").outerHeight() - $(".footer-above").outerHeight()
    });

    // 設定中間畫面的高度
    $("#leftScreen, #rightScreen").css("height", $(".jumbotron").height());

    // 讓上方畫面的內容垂直置中
    $("#outerLeftSidebar, #outerRightSidebar").css({
        "padding-top": ($(".jumbotron").height() - $("#outerLeftSidebar").height()) / 2
    });

    // 用來讓 scrollspy 提前結束追蹤位置
    // $("#left-hiddden-section").css("padding", $("nav").height() / 2);

    // 設定 .affix (在中間) 時候
    // $(".nav.side-nav.hidden-xs.hidden-sm.affix").css({
    //     "width": $(window).width() / 4,
    //     "top": $("nav").height()
    // });

    // 大學部、研究所導覽列 affix offset 位置
    // $("#leftNav, #rightNav").affix({
    //     offset: {
    //         top: $(".jumbotron").outerHeight() - $("nav").height(),
    //         bottom: $("footer").outerHeight(true)
    //     }
    // });

    // 點下 "開啟大學部畫面" 或 "開啟研究所畫面" 的圖片時
    $("p a[href='#under-1'], p a[href='#graduate-1']").on('click', function(event) {
        // 設定 scrollspy 的高度
        // $(".affix, .affix-top, .affix-bottom").css("height", $(window).height() - $("nav").height());

        if (this.hash !== "") {
            // 顯示 scrollbar
            $("body").css("overflow", "auto");
            // 砍掉 footer 的 fixed
            $("footer").removeAttr("style");
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            if (hash === "#under-1") {
                $("#leftScreen").fadeIn("fast");
                $("#rightScreen").hide();
            } else {
                $("#leftScreen").hide();
                $("#rightScreen").fadeIn("fast");
            }
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, "slow");
        }
    });

    // 調整視窗大小時
    $(window).resize(function() {

        $("img").width($(window).height() / 4);

        $(".jumbotron").css({
            // 在上方導覽列的位置留空
            "padding-top": $("nav").height() + $("nav").height(),
            // 設定高度
            "height": $(window).height() - $(".footer-below").outerHeight() - $(".footer-above").outerHeight()
        });

        // 設定中間畫面的高度
        $("#leftScreen, #rightScreen").css("height", $(".jumbotron").height());

        // 讓上方畫面的內容垂直置中
        $("#outerLeftSidebar, #outerRightSidebar").css({
            "padding-top": ($(".jumbotron").height() - $("#outerLeftSidebar").height()) / 2
        });

        // 調整 scrollspy 的高度
        // $(".affix, .affix-top, .affix-bottom").css("height", $(window).height() - $("nav").height());

        // 調整大學部、研究所導覽列 affix offset 位置
        // $("#leftNav, #rightNav").affix({
        //     offset: {
        //         top: $(".jumbotron").outerHeight() - $("nav").height(),
        //         bottom: $("footer").outerHeight(true)
        //     }
        // });

        // affix-top 時清除 inline style
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix-top").removeAttr("style");

        // affix 時調整寬度與頂部位置
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix").css({
        //     "width": $(window).width() / 4,
        //     "top": $("nav").height()
        // });

        // affix-bottom 時調整寬度
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix-bottom").css("width", $(window).width() / 4);

        // 設定 scrollspy 的高度
        // $(".affix, .affix-top, .affix-bottom").css("height", $(window).height() - $("nav").height());
    });

    // 滾動畫面時
    $(window).scroll(function() {

        // $(".jumbotron").css({
        //     // 在上方導覽列的位置留空
        //     "padding-top": $("nav").height(),
        //     // 設定高度
        //     "height": $(window).height() - $(".footer-below").outerHeight() - $(".footer-above").outerHeight()
        // });

        // 調整大學部、研究所導覽列 affix offset 位置
        // $("#leftNav, #rightNav").affix({
        //     offset: {
        //         top: $(".jumbotron").outerHeight() - $("nav").height(),
        //         bottom: $("footer").outerHeight(true)
        //     }
        // });

        // affix-top 時清除 inline style
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix-top").removeAttr("style").css("height", $(window).height() - $("nav").height());

        // affix 時調整寬度與頂部位置
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix").css({
        //     "width": $(window).width() / 4,
        //     "top": $("nav").height(),
        //     "height": $(window).height() - $("nav").height()
        // });

        // affix-bottom 時調整寬度
        // $(".nav.side-nav.hidden-xs.hidden-sm.affix-bottom").css({
        //     "width": $(window).width() / 4,
        //     "height": $(window).height() - $("nav").height()
        // });

        // 當滾動到最上方讓畫面回復初始狀態
        if ($(document).scrollTop() === 0) {
            window.location.hash = "";
            $("footer").css({
                "position": "fixed",
                "bottom": $(".footer-above").outerHeight() + $(".footer-below").outerHeight() - $("footer").height()
            }).hide().fadeIn("fast");
            $("body").css("overflow", "hidden");
            $("#leftScreen").fadeOut("fast");
            $("#rightScreen").fadeOut("fast");
            $("#bottomScreen").fadeOut("fast");
        }
    });

    // 
    $(".fixed-button").click(function() {
        
        // Make sure this.hash has a value before overriding default behavior
        // 顯示 scrollbar
        $("body").css("overflow", "auto");
        // 砍掉 footer 的 fixed
        $("footer").fadeOut("slow");
        $("#leftScreen").fadeOut("slow");
        $("#rightScreen").fadeOut("slow");
        $("#bottomScreen").fadeIn("slow");

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: $("#bottomScreen").offset().top
        }, "slow");
        test();
    });

    // 平滑移動視窗
    $("footer a[href='#app-layout']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area

            $("footer").css({
                "position": "fixed",
                "bottom": 0
            });

            $("#leftScreen").fadeOut(900);
            $("#rightScreen").fadeOut(900);
            $("#bottomScreen").fadeOut(900);
        } // End if
    });

    // testing
    function test() {
        $(".test1").text($(".footer-above").outerHeight() + $(".footer-below").outerHeight() - $("footer").height());
        // $(".test2").text($(window).width() / 4);
        // $(".test3").text($(".jumbotron").height() / 2 - $(window).width() / 4);
        // $(".test4").text(($(".jumbotron").height() / 2) - ($(window).width() / 4));
    }
    // test();
});
