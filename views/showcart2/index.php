<?php
$addresses=$data['addresses'];
$post_types=$data['post_types'];
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
    <div class="row">
        <h4 class="pull-right">انتخاب آدرس</h4>
        <button onclick="show_add_address()" data-toggle="modal" data-target="#myModal" class="btn btn-default pull-left">افزودن آدرس جدید</button>
    </div>

    <?php foreach ($addresses as $address){ ?>
    <div class="row table-bordered">
        <div class="col-sm-1 col-xs-12 valed_cricle"><i class=""></i> <i class="circle" data-id="<?=$address['city_id']?>" data-row="<?=$address['id']?>"></i></div>
        <div class="col-sm-7 col-xs-12 middle">
            <div class="internal_row ">
                نام تحویل گیرنده :  <span class="user_name"><?= $address['name']?></span>
            </div>
            <div class="internal_row">
                <div class="col-sm-3 col-xs-12 ">استان : <span class="state_name" data-value="<?=$address['state_id']?>"><?= $address['state_name']?></span></div>
                <div class="col-sm-3 col-xs-12">شهر : <span class=" city_name" data-value="<?=$address['city_id']?>"><?= $address['city_name']?></span></div>

            </div>
            <div class="internal_row">
                <div class="col-sm-8 col-xs-12">آدرس کامل : <span class="address"><?= $address['address']?></span></div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12 middle-2">
            <div class="internal_row ">تلفن اضظراری : <span class="emergency_phone"><?= $address['emergency_phone']?></span></div>
            <div class="internal_row ">تلفن ثابت منزل : <span class="cell_phone"><?= $address['cell_phone']?></span></div>
            <div class="internal_row "> کد  پستی :           <span class="code_post"><?=$address['post_code']?></span></div>

        </div>
        <div class="col-sm-1 col-xs-12 table-bordered end">
            <div title="<?= $address['id']?>" class="edit col-sm-12 col-xs-6"><i class="glyphicon glyphicon-edit"></i></div>
            <div class="col-sm-12 col-xs-6"><i class="glyphicon glyphicon-remove"></i></div>

        </div>



    </div>
<?php } ?>

    <h4>انتخاب شیوه ارسال</h4>
    <?php foreach ($post_types as $post_type){ ?>
    <div class="second row table-bordered">
        <div class="col-sm-1 col-xs-12 valed_cricle2"><i class="circle2"></i>
        </div>
        <div class="col-sm-9 col-xs-12"><img src="public/images/post_48_icon.png" class="pull-right"/><p class="post_type_name"><?=$post_type['name']?></p>
            <p><?=$post_type['description']?></p></div>
        <div class="col-sm-2 col-xs-12"><p>هزینه ارسال</p>
            <p class="post_price">0</p>ریال</div>
    </div>
    <?php } ?>
    <div class="row">
        <a href="showcart3" class="btn btn-primary pull-left">بازبینی</a>
        <a href="cart" class="btn btn-info pull-right">سبد خرید</a>
    </div>

</div>