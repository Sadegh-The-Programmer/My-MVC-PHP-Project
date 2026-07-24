    $('select.taki').niceSelect();
    $(".ultraSelect#mySelect3").ultraselect({noneSelected: 'حافظه داخلی'});
    $(".ultraSelect#mySelect1").ultraselect({noneSelected: 'تعداد سیم کارت'});
    $(".ultraSelect#mySelect2").ultraselect({noneSelected: 'رزولیشن عکس'});
    $(".ultraSelect#mySelect4").ultraselect({noneSelected: 'شبکه های ارتباطی'});
    var ckball=false;
    //زدن تیک فیلتر
    $(".ultraselectWrapper input").click(function () {
        var ckb = $(this).is(':checked');
        //alert(ckball);

        var rootnode = $(this).parents('.ultraselect').attr('id');



        var p = $(this).parents('.ultraSelect').find('.select .selection').text();
        //console.log(rootnode);
        var index = -1;


        if ($('#filter_options li').length == 0) {
            $('#filter_options').append('<li>' + $('#' + rootnode).find('.selection').text() + ' :</li>');
            index=0;

        }
        else {
            $("#filter_options li").each(function () {
                //console.log($(this).text());
                //console.log($('#' + rootnode).find('.selection').text());
                if (($(this).text().search($('#' + rootnode).find('.selection').text())) >= 0) {

                    index = $(this).index();
                }
            });
            if (index == -1) {

                index = $('#filter_options li').size() ;
                $('#filter_options').append('<li>' + $('#' + rootnode).find('.selection').text() + ' :</li>');
            }
        }

        //console.log(index);
        var v = $(this).parent().find('label').text();
        var span = ' <span class="mainItem">' + v + '<span onclick="removeMainItem(this)" style="vertical-align: middle;padding-right: 5px;" class="glyphicon glyphicon-remove"></span></span>';
        var t = $("#filter_options li").eq(index).find('span.mainItem');
        var flag = false;
        //تکه کد حذف همه موارد در بالا و نشان دادن انتخاب همه
        if (ckb == true) {
            var opt = $(this).parents(".options").find("input").eq(0);
            if (v.trim() == "انتخاب همه" || opt.is(':checked')) {
                $("#filter_options li").each(function () {
                    if (($(this).text().trim().search(p.trim())) >= 0) {
                        $(this).text(p + " :");
                        span = ' <span class="mainItem">' + 'انتخاب همه' + '<span onclick="removeMainItem(this)" style="vertical-align: middle;padding-right: 5px;" class="glyphicon glyphicon-remove"></span></span>';
                    }
                });
            }

        }

        t.each(function () {
            if ($(this).text().trim() == v.trim()) {
                $(this).remove();
                flag = true;
            }
        });
        if (ckb == false) {
            if(ckball==true)
            {
                //$("#filter_options li").eq(index).html('');
                var temp=p.trim();

                $("#filter_options li").eq(index).text(temp+' :');
                var checked=$('#'+rootnode+' input');
                checked.each(function () {
                    if($(this).is(':checked')){
                        v=($(this).parent().find('label').text());
                        span = ' <span class="mainItem">' + v + '<span onclick="removeMainItem(this)" style="vertical-align: middle;padding-right: 5px;" class="glyphicon glyphicon-remove"></span></span>';
                        $("#filter_options li").eq(index).append(span);
                    }
                });

                flag = true;
            }
            $("#filter_options li").each(function () {
                if (p.trim() == $(this).text().replace(' :', '').trim()) {
                    $(this).remove();
                }
            });
            //alert('ok');
        }
        if (!flag) {

            $("#filter_options li").eq(index).append(span);
        }


        ckball = $(this).parents('.options').find('input').eq(0).is(':checked');

    });

    var all;
    var root;
    function removeMainItem(tag) {
        var name = $('.ultraselect label');
        if ($(tag).parent().text().trim() == 'انتخاب همه') {
            var key = ($(tag).parents("li").text().replace('انتخاب همه', '').replace(' :', ''));
            $('span.selection').each(function () {
                if (key.trim() == $(this).text().trim()) {
                    all = $(this);
                }
            });
            root = all.parents('.ultraselect').attr('id');
            $('#' + root + ' input').each(function () {
                $(this).attr('checked', false);
                $(this).parent().removeClass('checked');
            });
            ckball=false;
        }
        name.each(function () {
            if ($(this).text().trim() == $(tag).parent().text().trim()) {
                var inp = $(this).parent().find('input');
                inp.attr('checked', false);
                inp.parent().removeClass('checked');
            }
        });


        $(tag).parent().remove();
        root = $('#filter_options li');
        root.each(function () {
            //alert($(this).find('.mainItem').length);
            if ($(this).find('.mainItem').length == 0) {
                $(this).remove();
            }
        });


    }
    $(".type1").click(function () {
        $("#products").addClass('display1');
        $(".left_side").addClass('col-sm-9');
        $(".right_side").addClass('col-sm-3');
    });
    $(".type2").click(function () {
        $("#products").removeClass('display1');
        $(".left_side").removeClass('col-sm-9');
        $(".right_side").removeClass('col-sm-3');
    });

