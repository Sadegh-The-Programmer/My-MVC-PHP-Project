<?php
$user_address=$data['user_address'];
$post_price=$data['post_price'];
$items=$data['items'];
$sum_price=$data['sum_price'];
$sum_discount=$data['sum_discount'];
?>
<div class="main container">
    <h5>رهگیری سفارش کالا</h5>
    <div id="first" class="row">

        <div class="progress">
            <div class="one no-color">پرداخت</div>
            <div class="two no-color">بازبینی</div>
            <div class="three primary-color">سفارش</div>
            <div class="four primary-color">ورود</div>
        </div>

    </div>
    <div class="head">
        <h4 class="pull-right">سبد خرید شما در فروشگاه</h4>
        <a href="showcart4/index/" class="pull-left btn btn-primary">نهایی کردن خرید</a>
    </div>
    <div class="mytable">
        <div class="table_header">
            <div class="col-xs-12 col-sm-5">نام</div>
            <div class="col-xs-12 col-sm-1">تعداد</div>
            <div class="col-xs-12 col-sm-3">قیمت واحد</div>
            <div class="col-xs-12 col-sm-3">قیمت کل</div>
        </div>
        <div style="float: right;width: 100%;background-color: #00f1e2" id="master_data">
            <?php foreach ($items as $item) { ?>
                <div class="table_body">
                    <div class="col-xs-12 col-sm-3">
                        <img id="ax" src="public/images/products/<?= $item['id'] ?>/medium/product3.jpg"/>
                        <p class="text-center"><?= $item['title'] ?><br>
                            <?= $item['color_name'] ?><br>
                            <?= $item['guarantee_name'] ?></p>
                    </div>
                    <div style="padding-top: 30px;" class="col-xs-12 col-sm-3">
                        <input class="counter" style="font-size: 16px" type="text" title="تعداد" value="<?= $item['count'] ?>" readonly/>
                    </div>
                    <div class="col-xs-12 col-sm-3"><span> <?= $item['price'] ?> تومان</span></div>
                    <div class="col-xs-12 col-sm-3"><span> <?= $item['price'] * $item['count'] ?> تومان</span><span style="color:red"><?=$item['discount_row']?>تومان</span></div>
                </div>
            <?php } ?>
        </div>
    <div class="myrow clearfix">
        <a href="cart/index" class="btn btn-danger pull-left">ویرایش سبد خرید</a>

    </div>

        <div class="table_footer">
            <div class="">
                <p>جمع کل خرید شما : <?=$sum_price?> تومان</p>
                <p>هزینه ارسال و بیمه : <?=($post_price/10)?> تومان</p>
                <p>میزان تخفیف  :<?=($sum_discount)?> تومان</p>
                <p class="text-primary">مبلغ قابل پرداخت شما : <?=($sum_price+($post_price/10))-$sum_discount?> تومان</p>
            </div>
            <div class="head">
                <h4 class="pull-right">اطلاعات ارسال سفارش</h4>
                <div class="myrow">
                    <p>
                        آدرس و نام تحویل گیرنده :
                    </p>
                    <p>
                        <?= $user_address['name'].' - '?>
                        <?= $user_address['city_name'].' - '?>
                        <?= $user_address['state_name'].' - '?>
                        <?= $user_address['address'].' - '?>
                    </p>
                    <div class="col-xs-12 col-sm-2 text-center">
                        <i class="glyphicon glyphicon-send"></i>
                    </div>
                    <div class="col-xs-12 col-sm-8">بسته شما به صورت سالم در مدت وعده داده شده ارسال می گردد</div>
                </div>
                <div class="myrow">
                    <div class="col-xs-12 col-sm-2">
                        <i class="glyphicon glyphicon-gift"></i>
                    </div>
                    <div class="col-xs-12 col-sm-8">بسته شما بیمه شده است در صورت هر نقصان موضوع را سریعا گزارش نمایید</div>
                </div>
            </div>
            <a href="showcart2/index" class="pull-right btn btn-default">مرحله قبل</a>
        </div>
    </div>



</div>