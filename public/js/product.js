$('.colors li').click(function () {
    $('.circle').html('');
    $('.circle', this).html('<i class="glyphicon glyphicon-ok"></i>');
});
$('#select_list').click(function () {
    var ultag=$('ul',this);
    ultag.slideToggle(500);
});

$('#select_list ul li').click(function () {
   var txt=$(this).text();
    $('.garanti_title').text(txt);
});
/////More Detail Button
var more_or_less=false;
$('#introduction .btn-block').click(function () {
    $('#introduction>p').toggleClass('active');
    if(!more_or_less){
        $(this).text('نمایش کمتر');
        more_or_less=true;
    }
    else{
        $(this).text('نمایش بیشتر');
        more_or_less=false;
    }
});
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
            var newMargin = parseFloat(marginRightNow) - 190;
            sliderscrollul.animate({'marginRight': newMargin}, 500);
            range++;
        }
    }
    else if (dir == 'right') {
        if (range > 0) {
            var newMargin = parseFloat(marginRightNow) + 190;
            sliderscrollul.animate({'marginRight': newMargin}, 500);
            range--;
        }
    }
    return range;
}


