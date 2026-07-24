<?php
$items = $data['basket'];
$all_price = $data['all_price'];

?>
<div class="main container">
    <div class="head">
        <h4 class="pull-right">سبد خرید شما در فروشگاه</h4>
        <button class="pull-left btn btn-primary">نهایی کردن خرید</button>
    </div>
    <div class="mytable">
        <div class="table_header">
            <div class="col-xs-12 col-sm-3">نام</div>
            <div class="col-xs-12 col-sm-3">تعداد</div>
            <div class="col-xs-12 col-sm-3">قیمت واحد</div>
            <div class="col-xs-12 col-sm-3">قیمت کل</div>
        </div>
        <div id="master_data">
            <?php foreach ($items as $item) { ?>
                <div class="table_body">
                    <div class="col-xs-12 col-sm-3">
                        <img id="ax" src="public/images/products/<?= $item['id'] ?>/medium/product3.jpg"/>
                        <p class="text-center"><?= $item['title'] ?><br>
                        <?= $item['color_name'] ?><br>
                        <?= $item['guarantee_name'] ?></p>
                    </div>
                    <div style="padding-top: 30px;" class="col-xs-12 col-sm-3">
                        <input onchange="update_basket(this)" data-id="<?= $item['basket_id'] ?>" class="counter" style="font-size: 16px" type="number"
                               title="تعداد" value="<?= $item['count'] ?>"/>
                    </div>
                    <div class="col-xs-12 col-sm-3"><span> <?= $item['price'] ?> تومان</span></div>
                    <div class="col-xs-12 col-sm-3"><span> <?= $item['price'] * $item['count'] ?> تومان</span><span
                                onclick="remove_basket(<?= $item['basket_id']; ?>)"
                                class="glyphicon glyphicon-remove"></span></div>
                </div>
            <?php } ?>
        </div>
        <script>
                //همه را باید به صورت تابع نوشت اگر رویداد بنویسید در زمانی که با جاوااسکریپت لود می شود دیگر دکمه کار نمی کند
            function update_basket(obj) {
                var id = $(obj).attr('data-id');
                var new_count =$(obj).val();
                var url = 'cart/update_basket/';
                var data = {'id':id,'new_count':new_count};
                $.post(url, data, function (msg) {
                    create_basket_list(msg);
                },'json')

            }
            function remove_basket(id) {
                var url = 'cart/delete_item/' + id;
                var data = [];


                $.post(url, data, function (msg) {
                    create_basket_list(msg);
               }, 'json');
            }

            function create_basket_list(list) {
                $('#master_data').empty();
                var basket = list[0];
                var all_price = list[1];
                $.each(basket, function (index, value) {
                    var table_body ='<div class="table_body"><div class="col-xs-12 col-sm-3"><img id="ax" src="public/images/products/'+value['id']+'/medium/product3.jpg"/><p class="text-center">' + value['title'] +'<br>'+value['color_name']+'<br>'+value['guarantee_name'] +'</p></div><div style="padding-top: 30px;" class="col-xs-12 col-sm-3"><input onchange="update_basket(this)" style="font-size:16px" class="counter" data-id="'+value['basket_id']+'" type="number" title="تعداد" value="' + value['count'] + '"/></div><div class="col-xs-12 col-sm-3"><span>تومان' + value['price'] + '</span></div><div class="col-xs-12 col-sm-3"><span>تومان' + value['price'] * value['count'] + '</span><span onclick="remove_basket(' + value['basket_id'] + ')" class="glyphicon glyphicon-remove"></span></div></div>';
                    $('#master_data').append(table_body);
                });
                $('#all_price').text('جمع کل خرید شما :' + all_price + 'تومان');


            }
            /*
            $('.counter').on('change', function () {

            });
            */
        </script>
        <div class="table_footer">
            <div class="">
                <p id="all_price">جمع کل خرید شما : <?= $all_price ?> تومان</p>

            </div>
            <button class="pull-right btn btn-default">لغو سفارش</button>
            <a href="showcart1" class="pull-left btn btn-primary" <?php if(sizeof($items)==0){echo 'disabled';} ?>>پرداخت</a>
        </div>
    </div>
</div>