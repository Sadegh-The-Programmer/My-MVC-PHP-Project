<?php
$orderInfo=$data['orderInfo'];

?>
<style>

</style>
<div id="main" style="width: 95%;margin:20px;;background: #fff;padding: 10px;float: right;">

    <form style="padding: 10px" class="form-horizontal col-xs-12 col-sm-8 col-md-4" action="checkout/creditcard/<?= $orderInfo['id'] ?>" method="post">

        <div class="">
            <h3>
                اطلاعات واریز کارت به کارت
            </h3>
        </div>

        <div class="">

        <span class="title w120">
            تاریخ واریز:
        </span>

            <span class="title">
روز:
        </span>
            <select class="form-control" name="day">
                <?php
                for ($i = 1; $i < 32; $i++) {
                    ?>
                    <option value="<?= $i ?>">
                        <?= $i ?>
                    </option>
                <?php } ?>
            </select>
            <span class="title">
ماه:
        </span>
            <select class="form-control" name="month">
                <?php
                for ($i = 1; $i < 13; $i++) {
                    ?>
                    <option value="<?= $i ?>">
                        <?= $i ?>
                    </option>
                <?php } ?>
            </select>
            <span class="title">
سال:
        </span>
            <select class="form-control" name="year">

                <option value="1400">
                    1400
                </option>
                <option value="1399">
                    1399
                </option>

            </select>

        </div>

        <div class="row2">

        <span class="title w120">
شماره کارت:
        </span>

            <input class="form-control" name="creditcard" type="text">

        </div>


        <div class="row2">

        <span class="title w120">
نام بانک صادرکننده:
        </span>

            <input class="form-control" name="bank" type="text">

        </div>


        <div class="row2">

        <span class="title w120">
            زمان واریز:
        </span>

            <span class="title">
ساعت:
          </span>
            <select class="form-control" name="hour">
                <?php
                for ($i = 0; $i < 24; $i++) {
                    ?>
                    <option value="<?= $i ?>">
                        <?php
                        if ($i == 0) {
                            echo '00';
                        } else {
                            echo $i;
                        }

                        ?>
                    </option>
                <?php } ?>
            </select>
            <span class="title">
دقیقه:
        </span>
            <select class="form-control" name="minute">
                <?php
                for ($i = 1; $i < 60; $i++) {
                    ?>
                    <option value="<?= $i ?>">
                        <?= $i ?>
                    </option>
                <?php } ?>
            </select>

        </div>

        <div class="row2">
            <a style="margin: 10px;" class="btn btn-primary" onclick="submitForm()">
                ثبت اطلاعات
            </a>
        </div>

    </form>
    <a style="margin: 10px;" class="btn btn-primary" href="checkout/index/<?= $orderInfo['id'] ?>">
        بازگشت
    </a>
    <script>
        function submitForm()
        {
            $('form').submit()
        }
    </script>

</div>














