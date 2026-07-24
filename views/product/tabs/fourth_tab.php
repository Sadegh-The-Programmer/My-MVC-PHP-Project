<?php
//print_r($data);
$questions=$data[0];
$answers=$data[1];
?>
<h4>پرسش خود را مطرح نمایید</h4>
    <textarea placeholder="سوال خود را اینجا وارد نمایید"></textarea>
    <button class="bnt btn-primary pull-left">ثبت پرسش</button>
    <hr/>

    <h4>پرسش های شما</h4>
<?php foreach ($questions as $question){ ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-question-sign"></span>پرسش
            <div class="pull-left"><?= $question['insert_date']; ?></div>

        </div>
        <div class="panel-body">
            <?= $question['body']; ?>
        </div>

    </div>
<!-- پاسخ -->
    <?php foreach ($answers as $answer){
        if($answer['question_id']==$question['id']){
        ?>
<div style="background-color: #2bccf4;width: 80%;" class="panel panel-default">
    <div style="background-color: #00f1e2;" class="panel-heading">
        <span style="margin-left: 10px;" class="glyphicon glyphicon-info-sign"></span>پاسخ
    </div>
    <div class="panel-body">
        <?= $answer['body']; ?>
    </div>

</div>
        <?php } } ?>
<?php } ?>