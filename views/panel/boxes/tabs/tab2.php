<?php
$orders=$data["orders"];

?>
<div class="tab-pane " id="2">
    <h4>سفارشات من</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>کد</th>
                <th>تاریخ</th>
                <th>مبلغ کل</th>
                <th>وضعیت</th>
                <th>جزئیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            foreach ($orders as $order){
            $i++;
                ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$order["reservation_number"]?></td>
                <td><?=$order["date"]?></td>
                <td><?=$order["amount"]?></td>
                <td><?=$order["title"]?></td>
                <td class="details"><span class="glyphicon glyphicon-chevron-down"></span></td>
            </tr>

            <tr class="details_row">
                <td colspan="8">
                    <table class="table table-responsive">
                        <thead>
                        <tr class="danger">
                            <th>کالا</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th>قیمت کل</th>
                            <th>تخفیف</th>
                            <th>مبلغ کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $baskets=unserialize($order["basket_rows"]);
                        foreach ($baskets as $basket){

                        ?>
                        <tr class="success">
                            <td><?=$basket["title"]?></td>
                            <td><?=$basket["count"]?></td>
                            <td><?=$basket["price"]?></td>
                            <td><?=$basket["price"]*$basket["count"]?></td>
                            <td><?=($basket["price"]*$basket["discount"])/100?></td>
                            <td><?=$order["amount"]?></td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div class="myrow">
                        <?php if($order['status_id']==1){
                           $ok="done";
                           $passed_mony="done";
                           $store_process="done";
                           $ready_for_send="todo";
                           $user_delivery="todo";
                        }else if($order['status_id']==9){
                            $ok="todo";
                            $passed_mony="todo";
                            $store_process="todo";
                            $ready_for_send="todo";
                            $user_delivery="todo";
                        }else if($order['status_id']==5){
                            $ok="done";
                            $passed_mony="done";
                            $store_process="done";
                            $ready_for_send="done";
                            $user_delivery="done";
                        }else if($order['status_id']==4){
                            $ok="done";
                            $passed_mony="done";
                            $store_process="done";
                            $ready_for_send="done";
                            $user_delivery="todo";
                        }

                        ?>
                        <h5>رهگیری سفارش</h5>
                        <div class="header-progress-container">
                            <ol class="header-progress-list">
                                <li class="header-progress-item <?=$user_delivery?>">تحویل شده</li><!--
       -->
                                <li class="header-progress-item <?=$ready_for_send?>">آماده ارسال</li><!--
       -->
                                <li class="header-progress-item <?=$store_process?>">پردازش انبار</li><!--
       -->
                                <li class="header-progress-item <?=$passed_mony?>">پرداخت</li>
                                <li class="header-progress-item <?=$ok?>">تایید سفارش</li>
                            </ol>
                        </div>
                    </div>
                    <div class="myrow">
                        <div class="col-xs-12 col-sm-4"><strong>روش ارسال : </strong> <?=$order["post_type"]?>

                        </div>
                        <div class="col-xs-12 col-sm-4"><strong>زمان ارسال : </strong> تا سه روز کاری بعد از پرداخت

                        </div>
                        <div class="col-xs-12 col-sm-4"><strong>کد مرسوله : </strong> <?=$order["id"]?></div>
                    </div>
                    <div class="myrow">
                        <div class="col-xs-12 col-sm-4"><strong>مکان تحویل : </strong><?=$order["address"]?></div>
                        <div class="col-xs-12 col-sm-4"><strong>تحویل گیرنده : </strong> <?=$customer_info['fullname'];?>
                        </div>
                        <div class="col-xs-12 col-sm-4"><strong>شماره تماس : </strong> <?=$order["tell"]?></div>
                    </div>

                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
