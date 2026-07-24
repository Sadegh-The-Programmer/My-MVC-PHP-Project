<div class="box row">
    <div class="header">
        اطلاعات کاربر
    </div>
    <div class="content">
        <h4>اطلاعات مشتری حقیقی</h4>
        <hr/>
        <div class="col-sm-4 col-xs-12">
            <div class="content_item">
                <strong>نام و نام خانوادگی :</strong>
                <span><?=$customer_info['fullname'];?></span>
            </div>
            <div class="content_item">
                <strong>شماره موبایل :</strong>
                <span><?=$customer_info['cell_phone'];?></span>
            </div>
            <div class="content_item">
                <strong>جنسیت :</strong>
                <span><?=$jensiat;?></span>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="content_item">
                <strong>آدرس ایمیل :</strong>
                <span><?=$customer_info['email'];?></span>
            </div>
            <div class="content_item">
                <strong>شماره ثابت :</strong>
                <span><?=$customer_info['tell_phone'];?></span>
            </div>
            <div class="content_item">
                <strong>آدرس :</strong>
                <span> <?=$customer_info['address'];?></span>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="content_item">
                <strong>کد ملی :</strong>
                <span><?=$customer_info['national_code'];?></span>
            </div>
            <div class="content_item">
                <strong>تاریخ تولد :</strong>
                <span><?=$customer_info['birdthday'];?></span>
            </div>
            <div class="content_item">
                <strong>دریافت خبرنامه :</strong>
                <span> <?=$newsletter?> </span>
            </div>
        </div>
    </div>
    <div class="footer">
        <button class="btn btn-default pull-left">دریافت خبرنامه</button>
        <button class="btn btn-primary pull-left">ویرایش اطلاعات</button>
    </div>
</div>
