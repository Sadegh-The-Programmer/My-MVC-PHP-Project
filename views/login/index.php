<div class="main row">
    <div class="col-xs-12 header">
        <img src="public/images/login.jpg"/>
        <p>
            وارد پنل کاربری خود شوید
        </p>
    </div>
    <div class="right col-xs-12 col-sm-6">
        <form id="form" method="post" action="login/check_user" >
        <div class="form-group has-success">
            <label for="inpEmail">ایمیل شما</label>
            <input name="email" type="email" class="form-control" placeholder="" id="inpEmail">
        </div>
        <div class="form-group has-success">


            <label for="inppass">رمز عبور</label>
            <input name="password" type="password" class="form-control" placeholder="" id="inppass">
        </div>
        <div class="form-group has-success">
            <label class="mylabel">
                <input type="checkbox" name="remember_me"><span class="label-text">مرا به خاطرت نگهدار</span>
            </label>
        </div>
        <button name="login" type="submit" class="btn btn-default btn-lg col-xs-push-4">ورود</button>
        </form>
    </div>
    <div class="left col-xs-12 col-sm-6">
        <h3 id="useful">مزیت های خرید اینترنتی</h3>
        <ul id="useful_items" class="list-unstyled">
            <li><span class="glyphicon glyphicon-shopping-cart"></span>ساده و آسان خرید کنید</li>
            <li><span class="glyphicon glyphicon-time"></span>در وقت خود صرفه جویی کنید</li>
            <li><span class="glyphicon glyphicon-off"></span>از تخفیفات ویژه برخوردار باشید</li>
            <li><span class="glyphicon glyphicon-star-empty"></span>همه چیز را یک جا داشته باشید</li>
        </ul>
    </div>
</div>
