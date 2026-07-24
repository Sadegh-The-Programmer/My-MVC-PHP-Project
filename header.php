
<!-- Start of Header -->
<header>
    <!-- first row ==>Logo    Sign up  Enter -->
    <div class="container">
        <div id="up_header" class="row">
            <!--- logo column -->
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-4 pull-left autocenter"><img src="public/images/eShop-logo.png"
                                                                                        class="logo"></div>
            <!--- Enter column -->
            <div id="enter" class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                <span class="icon glyphicon glyphicon-log-in"></span>
                <a href="<?=URL?>login" class="textIcon">ورود</a>

            </div>
            <!--- Sign up column -->
            <div id="signup" class="col-md-2 col-sm-4 col-xs-6"><span class="icon glyphicon glyphicon-registration-mark"></span>
                <a href="<?=URL?>register" class="textIcon">ثبت نام</a></div>
        </div>
        <!--- second row ==> Search box   Basket section -->
        <div class="row" id="down_header">
            <!-- Basket column -->
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 pull-right">

                <a id="basket_logo" href="cart"> <span
                        class="icon glyphicon glyphicon glyphicon-grain pull-right"></span>
                </a>
                <div class="" id="basket">
                    سبد خرید
                    <span>5</span>
                </div>

            </div>
            <!-- Search column -->
            <div id="searchbox" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right">
                <div id="search"><input type="text" placeholder="جست و جو..."/>
                    <button  class="searchbutton"><span>بگرد </span></button>

                </div>
            </div>
        </div>
    </div>

</header>
<!-- End of Header -->
<!-- Start of Nav -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">

            <!-- Left nav -->
            <ul class="nav navbar-nav">
                <li class=""><a href="#">کامپیوتر<span class="caret"></span> <span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="dropdown-menu custom">
                        <li><a href="#">سخت افزار</a></li>
                        <li><a href="#">نرم افزار</a></li>
                        <li><a href="#">شبکه</a></li>
                        <li><a href="#">امنیت<span class="caret"></span><span  class="glyphicon glyphicon-chevron-down"></span></a>
                            <ul class="dropdown-menu sub2">


                                <li><a href="#">امنیت سرور</a></li>
                                <li><a href="#">امنیت سایت</a></li>
                                <li><a href="#">امنیت در اندروید</a></li>
                                <li><a href="#">امنیت در IOS</a></li>


                            </ul>
                        </li>
                        <li id="mobile"><a href="#">تجارت الکترونیک <span class="caret"></span><span class="glyphicon glyphicon-chevron-down"></span></a>
                            <ul class="dropdown-menu sub1">
                                <li><a href="#">آموزش وب</a></li>
                                <li class="divider"></li>
                                <li><a href="#">گزینه ی اول</a></li>
                                <li><a href="#">گزینه ی دوم</a></li>
                                <li><a href="#">گزینه ی سوم</a></li>
                                <li><a href="#">گزینه ی چهارم</a></li>
                            </ul>
                            <ul class="dropdown-menu sub3">
                                <li><a href="#">آموزش اندروید</a></li>
                                <li class="divider"></li>
                                <li><a href="#">گزینه ی اول</a></li>
                                <li><a href="#">گزینه ی دوم</a></li>
                                <li><a href="#">گزینه ی سوم</a></li>
                                <li><a href="#">گزینه ی چهارم</a></li>
                            </ul>
                            <ul class="dropdown-menu sub4">
                                <li><a href="#">آموزش سئو</a></li>
                                <li class="divider"></li>
                                <li><a href="#">گزینه ی اول</a></li>
                                <li><a href="#">گزینه ی دوم</a></li>
                                <li><a href="#">گزینه ی سوم</a></li>
                                <li><a href="#">گزینه ی چهارم</a></li>
                                <img class="thumbnail pull-left"
                                     src="public/images/itlogo.jpg"/>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li><a href="#">لوازم خانگی</a></li>
                <li><a href="#">ابزارآلات</a></li>
                <li><a href="#">بدلیجات</a></li>
                <li><a href="#">تماس با ما<span class="glyphicon glyphicon-earphone"></span></a></li>
                <li><a href="#">درباره ی ما<span class="glyphicon glyphicon-info-sign"></span></a></li>
            </ul>

            <!-- Right nav -->

            <a class="navbar-brand pull-left" href="<?=URL?>index/index/">eShop <span class="glyphicon glyphicon-apple"></span></a>

        </div><!--/.nav-collapse -->

    </div><!--/.container -->
</div>

<!-- End of Nav -->
<!-- banner -->