<?php
$messages=$data['messages'];

?>
<div class="tab-pane active" id="1">
    <h4>پیغام های من</h4>
    <div style="border-bottom: 1px solid red" class="header-table">
        <div class="col-xs-4">
            <strong>عنوان پیام</strong>
        </div>
        <div class="col-xs-4">وضعیت پیام</div>
        <div class="col-xs-4">تاریخ دریافت</div>
    </div>

    <?php foreach ($messages as $message){
        if($message["status"]==0){$status="خوانده نشده";}
            else{$status="خوانده شده";}

            ?>
        <div class="header-table">
            <div class="col-xs-4">
                <strong><?=$message["title"];?></strong>
            </div>
            <div class="col-xs-4"><?=$status?></div>
            <div class="col-xs-4"><?=$message["date"];?></div>
        </div>


    <?php } ?>
</div>
