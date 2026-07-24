<div id="content" class="col-xs-12 col-sm-9">
    <ul class="list-unstyled page_navigator">
        <li>جست و جوی <img src="public/images/patharrow.png"/></li>
        <li>کالای دیجیتال<img src="public/images/patharrow.png"/></li>
        <li>موبایل<img src="public/images/patharrow.png"/></li>
        <li>گوشی موبایل<img src="public/images/patharrow.png"/></li>
        <li>50 نتیجه</li>
    </ul>

    <ul class="list-unstyled" id="filter_options">
        <li>
            تعداد سیم کارت : <span class="mainItem"> تک سیم<span onclick="removeMainItem(this);" class="glyphicon glyphicon-remove"></span></span>
        </li>
    </ul>
    <ul class="list-unstyled filter_top">
        <li>
            <select class="ultraSelect" id="mySelect1" name="myOptions1[]" multiple="multiple" size="3">
                <option value="option_1" selected>تک سیم</option>
                <option value="option_2">دو سیم</option>
                <option value="option_3">سه سیم</option>
            </select>
            <!--

            -->
        </li>
        <li>
            <select class="ultraSelect" id="mySelect2" name="myOptions2[]" multiple="multiple" size="3">
                <option value="option_1">8 مگاپیکسل</option>
                <option value="option_2">12 مگاپیکسل</option>
                <option value="option_3">14 مگاپیکسل</option>
                <option value="option_3">16 مگاپیکسل</option>
                <option value="option_3">32 مگاپیکسل</option>
            </select>

        </li>
        <li>
            <select class="ultraSelect" id="mySelect3" name="myOptions3[]" multiple="multiple" size="5">
                <option value="option_1">2 گیگابایت</option>
                <option value="option_2">4 گیگابایت</option>
                <option value="option_3">16 گیگابایت</option>
                <option value="option_4">32 گیگابایت</option>
                <option value="option_5">64 گیگابایت</option>
            </select>
        </li>
        <li>
            <select class="ultraSelect" id="mySelect4" name="myOptions4[]" multiple="multiple" size="5">
                <option value="option_1">WIFI</option>
                <option value="option_2">3G</option>
                <option value="option_3">4G</option>
                <option value="option_4">4.5G</option>
                <option value="option_5">5G</option>
            </select>
        </li>
        <li></li>
    </ul>

    <!-- Search section -->
    <hr class="style-seven"/>
    <div id="search_section" class="col-xs-12">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="input-group">
                    <input placeholder="جست و جو" class="form-control" type="text">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div id="existToggle" class="col-xs-12 col-sm-5 col-md-4">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
                <span>نمایش کالاهای موجود</span>
            </div>
            <div id="display_states" class="col-xs-12 col-sm-3 hidden-xs">
                حالات نمایش
                <span class="type1"></span>
                <span class="type2"></span>
            </div>
        </div>
        <div class="row">
                <span id="sort_based">
                    مرتب سازی بر اساس
                </span>
            <div class="col-xs-12">
                <select class="taki" title="مرتب سازی">
                    <option value="0">جدیدترین ها</option>
                    <option value="1">پربازدیدترین</option>
                    <option value="1">پرفروش ترین</option>
                    <option value="2">قیمت</option>
                </select>
                <select class="taki" title="مرتب سازی">
                    <option value="0">صعودی</option>
                    <option value="1">نزولی</option>
                </select>
                <select class="taki" title="مرتب سازی">
                    <option data-display="تعداد نمایش">همه</option>
                    <option value="1">10</option>
                    <option value="2">20</option>
                    <option value="3">30</option>
                    <option value="4">40</option>
                </select>
                <div id="navigator">
                    <span class="prev">قبل</span>
                    <span class="num">1</span>
                    <span class="num">2</span>
                    <span class="next">بعد</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Search section -->
    <!-- products -->
    <div class="col-xs-12" id="products">
        <ul class="list-unstyled">
            <li class="product">
                <div class="right_side">
                    <img src="public/images/products/product1.jpg"/><div class="colors"><span></span><span></span><span></span>
                    </div>
                    <div class="stars text-center">
                        <div class="gray">
                            <div class="red">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_side">
                    <div class="title">
                        Apple
                    </div>
                    <div class="description">
                        توضیحات محصول:<br/>
                        اپل در سالگرد ده‌سالگی آیفون، از آیفونی سخن به میان­ آورد که آن را با نام آیفون 10 یا آیفون
                        ایکس صدا می‌­زد. بسیاری از قسمت­‌های آیفون جدید، دست‌خوش تغییرات بزرگی شده‌­اند که
                        طرف­‌داران اپل را هیجان­‌زده کرده است و آیفون 10 را به محصولی متفاوت تبدیل کرده­‌اند.
                        نمایشگری که این بار با پنل­ اولد ساخته‌شده و اپل نام فناوری به‌کاررفته در آن را سوپر رتینا
                        گذاشته است تابه‌حال در هیچ آیفون دیگری استفاده‌نشده بود.
                    </div>
                    <div class="price ">
                        <p class="price_red">200,000 تومان</p>
                        <p class="price_green">100,000 تومان</p>
                    </div>
                    <div class="addtocart"></div>
                </div>
            </li>
            <li class="product">
                <div class="right_side">
                    <img src="public/images/products/product2.jpg"/><div class="colors"><span></span><span></span><span></span>
                    </div>
                    <div class="stars text-center">
                        <div class="gray">
                            <div class="red">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_side">
                    <div class="title">
                        Apple 2018
                    </div>
                    <div class="price ">
                        <p class="price_red">4,000,000 تومان</p>
                        <p class="price_green">1,000,000 تومان</p>
                    </div>
                    <div class="addtocart"></div>
                </div>
            </li>
            <li class="product">
                <div class="right_side">
                    <img src="public/images/products/product3.jpg"/><div class="colors"><span></span><span></span><span></span>
                    </div>
                    <div class="stars text-center">
                        <div class="gray">
                            <div class="red">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_side">
                    <div class="title">
                        LG 2016
                    </div>
                    <div class="price ">
                        <p class="price_red">250,000 تومان</p>
                        <p class="price_green">150,000 تومان</p>
                    </div>
                    <div class="addtocart"></div>
                </div>
            </li>
            <li class="product">
                <div class="right_side">
                    <img src="public/images/products/product4.jpg"/><div class="colors"><span></span><span></span><span></span>
                    </div>
                    <div class="stars text-center">
                        <div class="gray">
                            <div class="red">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_side">
                    <div class="title">
                        SAMSUNG
                    </div>
                    <div class="price ">
                        <p class="price_red">300,000 تومان</p>
                        <p class="price_green">200,000 تومان</p>
                    </div>
                    <div class="addtocart"></div>
                </div>
            </li>

        </ul>

    </div>

    <!-- end of Products -->

</div>
