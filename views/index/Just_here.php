<div class="Scroll-Slider col-xs-12">
    <h3>فقط در اینجا</h3>
    <div class="slider-content col-xs-12">
        <div class=" prev"><span onclick="range1=scroll2('right',this,range1);"
                                 class="glyphicon glyphicon-circle-arrow-right"></span></div>
        <div class="col-xs-12 col-sm-11 main">
            <ul class="list-unstyled">
                <?php
                $just_here = $data[3];
                foreach ($just_here as $slider) {
                    ?>
                    <li>
                        <a href="<?=URL?>product/index/<?=$slider['id'];?>">
                            <img style="width: 120px" src="public/images/products/<?= $slider['id']; ?>/medium/product3.jpg"/>
                            <br/>
                            <img src="public/images/sliderscroll1/exclusive-blue.png"/>
                            <p class="text-center"><?= $slider['title'] ?></p>
                            <p class="text-center price"><?= $slider['price'] ?>ریال</p>
                        </a>
                    </li>
                <?php } ?>
                <!--
                <li class="">
                    <a href="">
                        <img src="public/images/sliderscroll1/scrollslider_2.jpg"/>
                        <br/>
                        <img src="public/images/sliderscroll1/exclusive-blue.png"/>
                        <p class="text-center">گوشی جدید سامسونگ</p>
                        <p class="text-center price"> 28,000,000
                            ریال</p>

                    </a>
                </li>
                <li class=""><a href="">
                        <img src="public/images/sliderscroll1/scrollslider_3.jpg"/>
                        <br/>
                        <img src="public/images/sliderscroll1/exclusive-blue.png"/>
                        <p class="text-center">لب تاپ DELL</p>
                        <p class="text-center price">18,000,000
                            ریال</p>
                    </a></li>
                <li class=""><a href="">
                        <img src="public/images/sliderscroll1/scrollslider_4.jpg"/>
                        <br/>
                        <img src="public/images/sliderscroll1/exclusive-blue.png"/>
                        <p class="text-center">لب تاپ ACCER</p>
                        <p class="text-center price"> 1,000,000
                            ریال</p>
                    </a></li>
                <li class=""><a href="">
                        <img src="public/images/sliderscroll1/scrollslider_5.jpg"/>
                        <br/>
                        <img src="public/images/sliderscroll1/exclusive-blue.png"/>
                        <p class="text-center">مودم بی سیم</p>
                        <p class="text-center price"> 29,000,000
                            ریال</p>
                    </a></li>
                    -->
            </ul>
        </div>
        <div class=" next"><span onclick="range1=scroll2('left',this,range1);"
                                 class="glyphicon glyphicon-circle-arrow-left"></span></div>
    </div>
</div>