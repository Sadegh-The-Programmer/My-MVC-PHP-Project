<?php $colors = $data['colors'];
$guarantees = $data['guarantees'];

?>
<div class="row" id="details">
    <div id="right_details" class="col-xs-12 col-sm-12 col-md-5">
        <div id="icons"><span class="glyphicon glyphicon-heart-empty"></span>
            <span class="glyphicon glyphicon-share-alt"></span>
        </div>
        <div id="gallery">
            <img class="img-responsive pic1" src="public/images/products/<?= $product_info['id'] ?>/medium/product3.jpg"
                 data-zoom-image="public/images/products/<?= $product_info['id'] ?>/large/product3.jpg"/>
            <ul class="list-unstyled autocenter">
                <li data-toggle="modal" data-target="#myModal" id="more"><span
                            class="glyphicon glyphicon-circle-arrow-right"></span></li>
                <li class="photo_item"><img class="img-responsive"
                                            src="public/images/products/<?= $product_info['id']; ?>/small/product1.jpg"/>
                </li>
                <li class="photo_item"><img class="img-responsive"
                                            src="public/images/products/<?= $product_info['id']; ?>/small/product2.jpg"/>
                </li>
                <li class="photo_item"><img class="img-responsive"
                                            src="public/images/products/<?= $product_info['id']; ?>/small/product3.jpg"/>
                </li>


            </ul>
        </div>
    </div>
    <div id="left_details" class="col-xs-12 col-sm-12 col-md-7">
        <div class="panel panel-primary">
            <div id="product_title" class="panel-heading"><?= $product_info['title']; ?>
                <div class="stars text-center">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>


                </div>
            </div>
            <div class="panel-body">گوشی سامسونگ 2019 دو سیم کارت
                <div class="pull-left">6566,66 امتیاز</div>
            </div>
        </div>
        <div id="right" class="col-sm-12 col-md-6"><h4 id="select_color">انتخاب رنگ</h4>
            <ul class="colors">

                <?php foreach ($colors as $color) { ?>
                    <li><span style="background-color: <?= '#' . $color['hex'] ?>!important;"
                              class="circle"></span><?= $color['name']; ?></li>
                <?php } ?>
                <!--
                <li><span class="circle active"></span>سفید</li>
                <li><span class="circle"></span>نقره ای</li>
                 -->
            </ul>
            <h4>انتخاب گارانتی</h4>
            <div id="select_list"><span class="garanti_title">انتخاب گارانتی</span>
                <ul id="guarantee_select" class="list-unstyled">
                    <?php foreach ($guarantees as $guarantee) { ?>
                        <li><?= $guarantee['name']; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="price"><?php if ($offer == 1) { ?>
                    <span>قیمت : <del><?= $product_info['price'] ?></del></span>
                <?php } else { ?>
                    <span>قیمت : <b><?= $product_info['price'] ?></b></span>
                <?php } ?>
                <?php if ($offer == 1) { ?>
                    <span class="discount">
                        <span class="right">
                            <span class="number"><?= $product_info['price_discount']; ?></span>
                            <span class="toman">تومان</span>
                        </span>
                        <span class="left">
                            <span>تخفیف</span>
                        </span>
                    </span>
                <?php } ?>
            </div>
            <div id="display_for_you">
                <span class="glyphicon glyphicon-transfer"></span>
                <span>قیمت برای شما : </span>
                <span>590,000 تومان</span>
            </div>
            <div id="compare">
                <button style="width: 150px" onclick="add_to_basket(<?= $product_info['id'] ?>)"
                        class="btn btn-primary"><img src="public/images/basket.png"/> خرید
                </button>
                <button class="btn btn-info">مقایسه کن</button>
            </div>
        </div>
        <script>
            var color_name='';
            var guarantee_name='';
            $('.colors li').click(function () {
                color_name=$(this).text();
                alert(color_name)
            });
            $('#guarantee_select li').click(function () {
                guarantee_name=$(this).text();
            });
            function add_to_basket(id) {
                var url = "<?=URL?>product/add_to_basket/<?=$product_info['id']?>/";
                var data = {'color_name':color_name,'guarantee_name':guarantee_name};
                $.post(url, data, function (msg) {
                    alert(msg);
                });

            }
        </script>

        <div id="left" class="col-sm-12 col-md-6">
            <ul class="list-unstyled">
                <li><span class="glyphicon glyphicon-info-sign"></span> سیستم عامل : اندروید</li>
                <li><span class="glyphicon glyphicon-info-sign"></span>ظرفیت داخلی : 64 گیگ</li>
                <li><span class="glyphicon glyphicon-plus"></span>موارد بیشتر</li>
            </ul>
            <div id="gift">
                <span class="glyphicon glyphicon-gift"></span>
                <span>هدایای این کالا</span>
            </div>
            <div class="text-center">این کالا هدیه ندارد!!!</div>

        </div>
        <div id="services" class="col-xs-12">
            <ul class="col-xs-12 list-unstyled">
                <li class="col-xs-12 col-sm-6 col-md-3 text-center"><a href=""> ضمانت مرجوعی<span
                                class="services_icons glyphicon glyphicon glyphicon-retweet"></span></a></li>
                <li class="col-xs-12 col-sm-6 col-md-3 text-center"><a href=""> خدمات<span
                                class="services_icons glyphicon glyphicon-ok"></span></a></li>
                <li class="col-xs-12 col-sm-6 col-md-3 text-center"><a href=""> ارسال ویژه<span
                                class="services_icons glyphicon glyphicon glyphicon-plane"></span></a></li>
                <li class="col-xs-12 col-sm-6 col-md-3 text-center"><a href=""> پرداخت اینترنتی<span
                                class="services_icons glyphicon glyphicon glyphicon-shopping-cart"></span></a></li>
            </ul>

        </div>
    </div>
</div>