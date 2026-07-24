<?php
$reserve_id=$data['orderInfo']['reservation_number'];
$ref_id=$data['orderInfo']['reference_id'];
$basket_rows=unserialize($data['orderInfo']['basket_rows']);
$passed=$data['orderInfo']['passed'];
$order_info=$data['orderInfo'];
$status_name=$data['status_name'];
?>
<style>
    h2{
        margin-top: 60px;
    }
    #product,#address{
        width: 100%;

    }
    a.btn{
        margin: 10px;
        background-color: #00f1e2;
        color: black;

    }
</style>
<div class="main container">


    <h5>رهگیری سفارش کالا</h5>
    <div id="first" class="row">

        <div class="progress">
            <div class="one primary-color">پرداخت</div>
            <div class="two primary-color">بازبینی</div>
            <div class="three primary-color">سفارش</div>
            <div class="four primary-color">ورود</div>
        </div>
        <?php
        if($passed==1){
        ?>
            <div class="alert-info">
                <h4 class="text-danger text-center">پرداخت موفق</h4>
                <h2 class="text-center">سفارش در اولین فرصت برای شما ارسال می گردد</h2>
        <h4>کد رهگیری کالا : <?= $ref_id ?></h4>
            </div>
        <?php  } ?>
         <h4>مشخصات خرید</h4>
        <h4> شماره مرجع خرید :<?=$reserve_id?></h4>
        <h4> وضعیت خرید :<?=$status_name?></h4>
        <?php
        $gozashte=time()-$order_info['time_sabt'];
        $mohlat=MOHLAT*3600;
        if($passed==0 && $mohlat>$gozashte){
        ?>
        <a class="btn btn-default" href="checkout\payonline\<?=$order_info['id']?>">پرداخت آنلاین</a>
            <select>
                <option>درگاه زرین پال</option>
                <option>درگاه بانک سامان</option>
                <option>درگاه بانک ملت</option>
            </select>
        <a class="btn btn-default" href="checkout/creditcard/<?= $order_info['id'] ?>">پرداخت با کارت</a>
        <?php  } ?>
        <?php
        if($gozashte>$mohlat)
        {
            ?>
            <p class="alert-danger">مهلت ثبت اطلاعات خرید گذشته است</p>
        <?php
        }
        ?>
        <table  id="product" class="table-bordered table-condensed">
            <tr>
                <th>نام محصول</th>
                <th>تعداد</th>
                <th>قیمت</th>
                <th>تخفیف</th>
                <th>گارانتی</th>
            </tr>

            <?php foreach($basket_rows as $basket_row){ ?>
            <tr>
                <td><?=$basket_row['title']?></td>
                <td><?=$basket_row['count']?></td>
                <td><?=$basket_row['price']?></td>
                <td><?=$basket_row['discount'].'%'?></td>
                <td><?=$basket_row['guarantee_name']?></td>
            </tr>

            <?php } ?>
        </table>
        <h4>مشخصات خریدار </h4>
        <table id="address" class="table-bordered table-condensed">
            <tr>
                <th>نام گیرنده</th>
                <th>کد پستی</th>
                <th>استان</th>
                <th>شهر</th>
                <th>آدرس</th>
                <th>شماره تماس اضطراری</th>
                <th>نوع پست</th>
            </tr>
            <tr>
                <td><?=$order_info['family']?></td>
                <td><?=$order_info['post_code']?></td>
                <td><?=$order_info['state']?></td>
                <td><?=$order_info['city']?></td>
                <td><?=$order_info['address']?></td>
                <td><?=$order_info['mobile']?></td>
                <td><?=$order_info['post_type']?></td>
            </tr>
        </table>
    </div>

</div>
