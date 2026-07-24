<?php
$options=Model::get_option();
?>
<footer class="container">
    <div id="footer_top" class="row">
        <div id="seven" class="col-xs-12 col-sm-4">هفت روز هفته 24 ساعته پاسخ گوی شما هستیم</div>
        <div class="col-xs-12 col-sm-3 col-lg-push-1">شماره تماس ما : <?= $options['Tell_company'] ?></div>
        <div  class="col-xs-12 col-sm-2 col-lg-push-1"><a id="faq" href="">سوالات متداول <span class="glyphicon glyphicon-question-sign"></span></a></div>
        <div id="email_company" class="col-xs-12 col-sm-2 col-lg-push-1"><?= $options['Email'] ?></div>
    </div>
    <div id="footer_bottom" class="row">
        <div class="col-xs-12 col-sm-3 col-md-2 text-center">
            <h3>راهنمای خرید</h3>
            <ul class="list-unstyled text-right">
                <li><a href="">ثبت سفارش</a> </li>
                <li><a href="">رویه های ارسال کالا</a> </li>
                <li><a href="">ثبت کد تخفیف</a> </li>
                <li><a href="">شیوه های پرداخت</a> </li>
                <li><a href="">بن کارت من</a> </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-2 text-center">
            <h3>خدمات آنلاین</h3>
            <ul class="list-unstyled text-right ">
                <li><a href="">دانلود راهنما</a> </li>
                <li><a href="">ارسال کالا</a> </li>
                <li><a href="">همکاری با ما</a> </li>
                <li><a href="">ارسال پستی</a> </li>
                <li><a href="">تازه ترین ها</a> </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-push-2">
            <div id="email_services">اولین نفری باشید که خبردار می شود باشید!!!</div>
            <div class="input-group input-group-lg contact_us_items">
                <input class="form-control" type="text" placeholder="ایمیل شما">
                <div class="input-group-btn">
                    <button class="btn btn-primary">ارسال</button>
                </div>
            </div>
            <div id="logos">
                <a href="" > <span class="glyphicon glyphicon-send"></span></a>
                <span class="glyphicon glyphicon-earphone"></span>
                <span class="glyphicon glyphicon-copyright-mark"></span>
                <span class="glyphicon glyphicon-apple"></span>
            </div>
            <div id="apps_logo">
                <img src="public/images/brands/appstore.png"/>
                <img src="public/images/brands/cafebazzar.png"/>
            </div>
        </div>

    </div>
</footer>
