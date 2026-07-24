<?php
$error=$data['error'];
?>

<div class="main container">
    <?php if($error==-2){ ?>
    <div class="alert-danger text-center">
        <?= 'نسخه آزمایشی - خطا در اتصال به زرین پال' ?>

    </div>
    <?php } ?>
    <h5>رهگیری سفارش کالا</h5>
    <div id="first" class="row">

        <div class="progress">
            <div class="one no-color">پرداخت</div>
            <div class="two primary-color">بازبینی</div>
            <div class="three primary-color">سفارش</div>
            <div class="four primary-color">ورود</div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">کد تخفیف</div>
        <div class="col-xs-12 col-sm-6">کد تخفیف را می توانید از طریق کانال فروشگاه دریافت نمایید یا با پشتیبانی سایت
            تماس بگیرید
        </div>
        <div class="col-xs-12 col-sm-4">
            <input name="discount_code" id="discount_code" placeholder="کد را اینجا وارد کنید" class="input-sm" type="text">
            <button id="send_discount_code" class="btn btn-danger">ثبت تخفیف</button>
            <script>
                $('#send_discount_code').click(function () {
                    let id=$('#discount_code').val();
                    let url = 'showcart4/check_card/' + id;
                    let data = [];
                    $.post(url, data, function (msg) {
                     if(msg=='no')
                     {
                         $('#discount_code').removeClass('green');
                        $('#discount_code').addClass('red');
                     }
                     else{
                         $('#discount_code').removeClass('red');
                         $('#discount_code').addClass('green');
                         calculate_final_price(msg);
                     }
                    });

                });


            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">کد هدیه</div>
        <div class="col-xs-12 col-sm-6">کدهای هدیه در مناسبت های خاص اهدای مشتری قدیمی می شود.</div>
        <div class="col-xs-12 col-sm-4">
            <input placeholder="کد هدیه" name="gift_code" class="input-sm" type="text">
            <button class="btn btn-danger">ثبت کد هدیه</button>
        </div>
    </div>
    <div class="row total_money">
        <h4 style="padding: 10px">مبلغ قابل پرداخت نهایی به تومان</h4>
        <h5 id="final"></h5>
    </div>
    <script>
        function calculate_final_price(discount) {
            let url = 'showcart4/calculate_final_price/';
            let data = [];
            $.post(url, data, function (msg) {
                $('#final').text(msg-((msg*discount)/100));

            });
        }
        calculate_final_price(0);
            $('#submit').click(function () {
                $('form').submit();
            });
    </script>
    <style>
        input[type='radio']
        {
            position: relative;

            right: 130px;

            top: 10px;
            z-index: 999999;
        }
    </style>
    <form action="showcart4/save_order/" method="post">
    <div class="row">
        <div class="col-xs-12">شیوه پرداخت</div>
    </div>
    <div class="second row table-bordered">
        <div class="myrow">
            <div class="col-sm-3 col-xs-6">
                <input title="زرین پال" type="radio" name="pay_type" value="1">
                <p class="bank_name text-right">درگاه زرین پال</p>
            </div>
            <div class="col-sm-8 col-xs-6 col-sm-pull-1"><img src="public/images/icon-128x128.png" class="pull-right"/>
                <p> </p></div>
        </div>
        <div class="myrow">
            <div class="col-sm-3 col-xs-6 ">
                <input title="بانک سامان" type="radio" name="pay_type" value="2">
                <p class="bank_name text-right">درگاه بانک سامان</p>
            </div>
            <div class="col-sm-8 col-xs-6 col-sm-pull-1">
                <img src="public/images/saman_bank_logo.png" class="pull-right"/>
                <p> </p>
            </div>
        </div>
        <div class="myrow">
            <div class="col-sm-3 col-xs-6">
                <input title="بانک ملت" type="radio" name="pay_type" value="3">
                <p class="bank_name text-right">درگاه بانک ملت</p>
            </div>
            <div class="col-sm-8 col-xs-6 col-sm-pull-1">
                <img src="public/images/mellat_bank_logo.jpg" class="pull-right"/>
                <p> </p>
            </div>
        </div>
        <div class="myrow">
            <div class="col-sm-3 col-xs-6">
                <input title="کارت به کارت" type="radio" name="pay_type" value="4">
                <p class="bank_name text-right">کارت به کارت</p>
            </div>
        </div>

    </div>
    <div class="row">
        <button id="submit" style="margin-left: 20px;" class="btn btn-primary">پرداخت نهایی</button>
        با پرداخت نهایی به بانک مقصد متصل می شوید.
    </div>

</div>
</form>