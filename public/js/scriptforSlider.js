/**
 * Created by Vaio on 11/20/2017.
 */
<!-- Script for Slider -->
var slidertag = $('#slider');
var slideritems = slidertag.find('.item');
var curSlide = 1;
var nav = $('#slider_navigator ul li');

// slideritems.eq(curSlide - 1).fadeIn(0).css("display", "flex").css("justifyContent", "center");
gotoSlide(1);

var timer = setInterval(nextslider, 5000);
$("#slider").mouseleave(function (e) {
    clearInterval(timer);
    timer = setInterval(nextslider, 5000);
});

$('#right').click(function () {
    prevslider();
    clearInterval(timer);
});
$('#left').click(function () {

    nextslider();
    clearInterval(timer);
});
function nextslider() {
    if (curSlide == 4)curSlide = 0;
    curSlide++;
    gotoSlide(curSlide);
}
function prevslider() {
    if (curSlide == 1)curSlide = 5;
    curSlide--;
    gotoSlide(curSlide);
}
$("#slider_navigator ul li").click(function () {
    var index = ($(this).index() + 1);
    gotoSlide(index);
    clearInterval(timer);

})
function gotoSlide(n) {
    curSlide = n;
    slideritems.hide();
    slideritems.eq(curSlide - 1).fadeIn(1000).css("display", "flex").css("justifyContent", "center");
    nav.removeClass('activated');
    nav.eq(n - 1).addClass('activated');

}

//Code for Second Slider ...
$(".right_part").hide();
$(".right_part").eq(0).show(0);
var curSlide2 = 1;
var timer2 = setInterval(nextslider2, 7000);

function nextslider2() {
    if (curSlide2 == 4)curSlide2 = 0;
    curSlide2++;
    gotoSlide2(curSlide2);
    $("#left_part ul li").removeClass('activated');

}
function gotoSlide2(n) {
    $(".right_part").hide().fadeOut(100);
    $(".right_part").eq(n - 1).fadeIn(500);
}
$("#left_part ul li").click(function () {
    var a = $(this).index();
    $(".right_part").hide().fadeOut(100);
    $(".right_part").eq(a).fadeIn(500);
    clearInterval(timer2);
    $(this).parent().find('li').removeClass('activated');
    $(this).toggleClass('activated');
});
$("#newSlider").mouseleave(function (e) {
    clearInterval(timer2);
    timer2 = setInterval(nextslider2, 7000);
});

////Set Variables
var range = 0;
var range1=0;
var range2=0;
var range3=0;
var limmit;
var width = $(window).width();
if (width >= 1200) {
    limmit = 1;
}
else if (width < 1200 && width >= 990) {
    limmit = 2;
}
else if (width < 990 && width >= 746) {
    limmit = 1;
}
else if (width < 746 && width >= 566) {
    limmit = 2;
}
else if (width < 566 && width >= 410) {
    limmit = 3
}
else {
    limmit = 4
}
////End of Set Variables

function  scroll2(dir,tag,r) {

    range=r;
    //alert(limmit);
    var span_tag=$(tag);
    var sliderScroll = span_tag.parents(".Scroll-Slider");
    var sliderscrollul = sliderScroll.find(".slider-content .main ul");
    var marginRightNow = sliderscrollul.css('margin-right');
    if (dir == 'left') {
        if (range < limmit) {
            var newMargin = parseFloat(marginRightNow) - 150;
            sliderscrollul.animate({'marginRight': newMargin}, 500);
            range++;
        }
    }
    else if (dir == 'right') {
        if (range > 0) {
            var newMargin = parseFloat(marginRightNow) + 150;
            sliderscrollul.animate({'marginRight': newMargin}, 500);
            range--;
        }
    }
    return range;
}






