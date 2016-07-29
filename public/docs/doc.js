$(document).ready(function() {
    // 根據視窗調整按鈕大小、參考值還需要調整!!!

    // fadeIn() animation
    $("body").fadeIn("slow");

    // 讓上方畫面的內容垂直置中
    $("#outerLeftSidebar, #outerRightSidebar").css({
        "padding-top": ($(".jumbotron").height() - $("#outerLeftSidebar").height()) / 2
    });

    // 點下 "開啟大學部畫面" 或 "開啟研究所畫面" 的圖片時
    $("p a[href='#under-1'], p a[href='#graduate-1']").on('click', function(event) {
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
        $('html, body').animate({
            scrollTop: $(hash).offset().top - $("nav").height()
        }, "slow");
    });

    // 切換研究所的三個主項目畫面
    $("li a[href='#graduate-1'], li a[href='#graduate-2'], li a[href='#graduate-3']").on('click', function(event) {
        if (window.location.hash !== this.hash) {
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
        }
    });

    // 切換大學部的三個主項目畫面
    $("li a[href='#under-1'], li a[href='#under-2'], li a[href='#under-3']").on('click', function(event) {
        if (window.location.hash !== this.hash) {
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
                scrollTop: $(hash).offset().top - $("nav").height()
            }, "slow", function() {
                window.location.hash = hash;
            });
        }
    });

    // 調整視窗大小時
    $(window).resize(function() {
        // 讓上方畫面的內容垂直置中
        $("#outerLeftSidebar, #outerRightSidebar").css({
            "padding-top": ($(".jumbotron").height() - $("#outerLeftSidebar").height()) / 2
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
    // test();
});
