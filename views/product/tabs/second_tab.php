<?php
$header_attr = $data[1];
$attrs = $data[0];
//print_r($attrs);
?>


<div class="part">
    <?php foreach ($header_attr as $header) { ?>
        <h4><?= $header['title']; ?></h4>
        <?php foreach ($attrs as $attr) {
            if ($attr['parent'] == $header['id']) {
                ?>
                <div class="row">

                    <div class="col-xs-12 col-sm-3 right"><?= $attr['title']; ?></div>
                    <div class="col-xs-12 col-sm-8 left"><?php if(isset($attr['value'])){echo $attr['value'];}else{echo '-';}?></div>

                </div>

            <?php } ?>
        <?php } ?>
    <?php } ?>

    <!--
    <div class="row">
        <div class="col-xs-12 col-sm-3 right">وزن</div>
        <div class="col-xs-12 col-sm-9 left">400 گرم</div>
    </div>
-->
</div>
