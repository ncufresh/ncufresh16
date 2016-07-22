$(document).ready(function() {
  $("body").fadeIn("slow");
  var getNavBlockHeight = ($("nav").outerHeight(true) - 20);
  var getFooterBlockHeight = 150;

  function test() {
    $(".test1").text('$("body").width(): ' + $("body").width());
    $(".test2").text('$("body").innerWidth():' + $("body").innerWidth());
    $(".test3").text($("#addNewUnderScreen").css("display"));
    $(".test4").text('$(window).innerWidth(): ' + $(window).innerWidth());
    $("body").attr("data-target", ".scrollspy").css("background-color", "#2d2d30");
  }

  // status : 頁面的狀態
  const INIT_SCREEN = 0; // 初始畫面
  const LEFT_SCREEN = 1; // 開啟左邊的大學部新生必讀
  const RIGHT_SCREEN = 2; // 開啟右邊的研究所新生必讀

  var status = INIT_SCREEN;
  const scrollbarWidth = 17;

  function init() {
    $("#addNewUnderScreen").css("display", "none");
    $("#addNewGraduateScreen").css("display", "none");
    $("#leftScreen").css("display", "none");
    $("#rightScreen").css("display", "none");
    $("#openAnimationScreen").css("display", "none");
    $("#innerLeftPage").css("display", "none");
    $("#innerRightPage").css("display", "none");
    $("#innerLeftSidebar").css({
      "display": "none",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": 0,
      "width": ($(window).width() - 17) / 4,
      "height": $(window).height()
    });
    $("#innerRightSidebar").css({
      "display": "none",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": ($(window).width() - 17) * 3 / 4,
      "width": $(window).width() / 4,
      "height": $(window).height()
    });
    $("#outerLeftSidebar").css({
      "height": $(window).height() - getNavBlockHeight - getFooterBlockHeight,
      "display": "none"
    }).fadeIn("slow");
    $("#outerRightSidebar").css({
      "height": $(window).height() - getNavBlockHeight - getFooterBlockHeight,
      "display": "none"
    }).fadeIn("slow");
  }

  function setNavBlockHeight() {
    $("#navBlock").css("height", getNavBlockHeight);
  }

  function hasHorizontalScrollbar() {
    if ($("body").height() > $(window).height()) {
      return true;
    } else {
      return false;
    }
  }

  setNavBlockHeight();
  init();
  test();

  // open left page
  $("#btnOpenLeftPage").click(function() {
    test();
    // close init screen
    $("#initScreen").fadeOut("fast");
    status = LEFT_SCREEN; // set status for resize condition
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").removeAttr("style").css({
      "display": "block",
      "background": "#47a3da",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": 0,
      "width": $(window).width() / 2,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({ "width": ($(window).width() - 17) / 4 }, "fast");
    // show left screen
    $("#openAnimationScreen").delay("fast").delay("fast").fadeOut("slow");
    $("#leftScreen").css("display", "block");
    $("#innerLeftSidebar").delay("fast").delay("fast").fadeIn("slow");
    $("#innerLeftPage").delay("fast").delay("fast").fadeIn("slow");
  });

  // back to origin from left
  $("#btnBackLeftPage").click(function() {
    test();
    // close left screen
    $("#addNewUnderScreen").css("display", "none");
    $("#leftScreen").fadeOut("slow");
    $("#innerLeftSidebar").fadeOut("slow");
    $("#innerLeftPage").fadeOut("slow");
    // set status for resize condition
    status = INIT_SCREEN;
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").css({
      "top": getNavBlockHeight,
      "width": $(window).width() / 4,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({ "width": ($(window).width() + 17) / 2 }, "fast");
    // open init srceen
    $("#openAnimationScreen").delay("slow").delay("fast").fadeOut("slow");
    $("#initScreen").delay("slow").delay("fast").fadeIn("slow");
  });

  // open right page
  $("#btnOpenRightPage").click(function() {
    test();
    // close init screen
    $("#initScreen").fadeOut("fast");
    status = RIGHT_SCREEN; // set status for resize condition
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").removeAttr("style").css({
      "display": "block",
      "position": "fixed",
      "background": "#fff",
      "top": getNavBlockHeight,
      "left": $(window).width() / 2,
      "width": $(window).width() / 2,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({
      "left": ($(window).width() - 17) * 3 / 4,
      "width": ($(window).width() - 17) / 4
    }, "fast");
    // show right screen
    $("#openAnimationScreen").delay("fast").delay("fast").fadeOut("fast");
    $("#rightScreen").css("display", "block");
    $("#innerRightSidebar").delay("fast").delay("fast").fadeIn("slow");
    $("#innerRightPage").delay("fast").delay("fast").fadeIn("slow");
  });

  // back to origin from right
  $("#btnBackRightPage").click(function() {
    test();
    // close right screen
    $("#addNewGraduateScreen").css("display", "none");
    $("#rightScreen").fadeOut("slow");
    // set status for resize condition
    status = INIT_SCREEN;
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").css({
      "top": getNavBlockHeight,
      "left": $(window).width() * 3 / 4,
      "width": $(window).width() / 4,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({
      "left": ($(window).width() + 17) / 2,
      "width": ($(window).width() + 17) / 2
    }, "fast");
    // open init srceen
    $("#openAnimationScreen").delay("slow").delay("fast").fadeOut("slow");
    $("#initScreen").delay("slow").delay("fast").fadeIn("slow");
  });

  // if resize set navBlock height again
  $(window).resize(function() {
    test();
    getNavBlockHeight = ($("nav").outerHeight(true) - 20);
    setNavBlockHeight();
    // 若在初始狀態
    // if (status === INIT_SCREEN) {
    $("#outerLeftSidebar").css("height", $(window).height() - getNavBlockHeight - getFooterBlockHeight);
    $("#outerRightSidebar").css("height", $(window).height() - getNavBlockHeight - getFooterBlockHeight);
    // }
    // 若打開了左邊大學部新生必讀
    // if (status === LEFT_SCREEN) {
    $("#innerLeftSidebar").css({
      "top": getNavBlockHeight,
      "width": ($(window).width() / 4),
      "height": $(window).height()
    });
    // }
    // 若打開了右邊研究所新生必讀
    // if (status === RIGHT_SCREEN) {
    $("#innerRightSidebar").css({
      "top": getNavBlockHeight,
      "left": ($(window).width() * 3 / 4),
      "width": ($(window).width() / 4),
      "height": $(window).height()
    });
    // }
  });

  $("#test1").click(function() {
    test();
  });

  $("#test2").click(function() {
    test();
  });

  $("#test3").click(function() {
    test();
  });

  $("#test4").click(function() {
    test();
  });

  $("#btnAddUnder").click(function() {
    if ($("#addNewUnderScreen").css("display") === "none") {
      $("#addNewUnderScreen").css("display", "block");
    } else {
      $("#addNewUnderScreen").css("display", "none");
    }
  });

  $("#btnAddGraduate").click(function() {
    if ($("#addNewGraduateScreen").css("display") === "none") {
      $("#addNewGraduateScreen").css("display", "block");
    } else {
      $("#addNewGraduateScreen").css("display", "none");
    }
  });

  // $("#innerLeftPage").mouseover(function(){
  //   $("html").css("overflow", "auto");
  // });

  // $("#innerLeftPage").mouseout(function(){
  //   $("html").css("overflow", "hidden");
  // });

  // $("#innerRightPage").mouseover(function(){
  //   $("html").css("overflow", "auto");
  // });

  // $("#innerRightPage").mouseout(function(){
  //   $("html").css("overflow", "hidden");
  // });
});
