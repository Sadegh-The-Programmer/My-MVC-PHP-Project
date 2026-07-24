<div id="newSlider" class="col-xs-12">
    <!--FIRST SLIDE -->
    <?php
    foreach ($data[1] as $slider) {
        foreach ($data[2] as $dates) {
            if ($slider['id'] == $dates['product_id']) {
                $date=$dates['end_date'];
            }
        }
        ?>
        <div class="col-xs-12 col-sm-9 col-md-9 right_part">
            <a href="<?=URL?>product/index/<?=$slider['id']; ?>">
                <div class="col-xs-6 col-sm-6 right_right_part">
                    <p>جشنواره تخفیف بهاری</p>
                    <div class="price_info"></div>
                    <b> فقط <?= $slider['total_price']; ?> تومان </b>
                    <p>توان دو نیم وات</p>
                    <p>مقاوم در مقابل ضربه</p>
                    <p> تا تاریخ : <?=$date; ?></p>
                </div>
                <div class="col-xs-6 col-sm-6 text-center left_right_part" id="">
                    <p class="col-xs-12"><?= $slider['title']; ?></p>
                    <img class="pull-left col-xs-8 col-sm-8 img-responsive"
                         src="public/images/products/<?= $slider['id']; ?>/medium/product3.jpg"/>
                </div>
            </a>

        </div>

    <?php } ?>

    <!--
    <!--SECOND Slide
    <div class="col-xs-12 col-sm-9 col-md-9 right_part">
        <a href="#">
            <div class="col-xs-6 col-sm-6 right_right_part">
                <p>خرید انواع آلات موسیقی</p>
                <p>با کیفیت تضمین شده</p>
                <p>همراه با آموزش</p>
            </div>
            <div class="col-xs-6 col-sm-6 text-center left_right_part">
                <p class="col-xs-12">آلات موسیقی</p>
                <img class="pull-left col-xs-8 col-sm-8 img-responsive"
                     src="public/images/secondSlider/slider2_2.jpg"/>
            </div>
        </a>
    </div>
    <!-- Third Slide
    <div class="col-xs-12 col-sm-9 col-md-9 right_part">
        <a href="#">
            <div class="col-xs-6 col-sm-6 right_right_part">
                <p>به روز ترین گوشی ها</p>
                <p>همراه با کیف گوشی</p>
                <p>ریجستر درب منزل</p>
            </div>
            <div class="col-xs-6 col-sm-6 text-center left_right_part">
                <p class="col-xs-12">New Galaxy series</p>
                <img class="pull-left col-xs-8 col-sm-8 img-responsive"
                     src="public/images/secondSlider/slider2_3.jpg"/>
            </div>
        </a>
    </div>

    <!--Fourth slide
    <div class="col-xs-12 col-sm-9 col-md-9 right_part">
        <a href="#">
            <div class="col-xs-6 col-sm-6 right_right_part">
                <p>جا صابونی هست</p>
                <p>چیز خوبی هست</p>
                <p>رطوبت را می کشد</p>
            </div>
            <div class="col-xs-6 col-sm-6 text-center left_right_part">
                <p class="col-xs-12">مناسب برای هر مکانی</p>
                <img class="pull-left col-xs-8 col-sm-8 img-responsive"
                     src="public/images/secondSlider/slider2_4.jpg"/>
            </div>
        </a>
    </div>
    -->
    <div class="hidden-xs col-sm-3" id="left_part">
        <ul class="list-unstyled">
            <?php
            foreach ($data[1] as $slider) {
                ?>
                <li><?= $slider['title']; ?></li>
            <?php } ?>
            <!--
              <li>بخار پز فلور</li>
              <li>خمیردندان سیگنال Extra</li>
              <li>+Samsung Galaxy 8</li>
              <li>VAIO 2017 Series</li>
              <li class="deactived">کیف دستی</li>
              <li class="deactived">مبلمان</li>
              -->
        </ul>
    </div>

</div>