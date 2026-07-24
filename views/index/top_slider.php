<div id="slider">
            <span id="right" class="glyphicon glyphicon-chevron-right"
            ></span>
    <span id="left" class="glyphicon glyphicon-chevron-left"
    ></span>

    <div id="slider_main">
        <?php

        foreach ($data[0] as $slider) {
            ?>
            <a href="<?= $slider['link'] ?>" class="item"><img class="img-responsive" src="<?= $slider['img'] ?>"/> </a>

        <?php

        }
        ?>


    </div>
    <div class="col-xs-12" id="slider_navigator">
        <ul class="col-xs-12 list-unstyled">
            <?php        foreach ($data[0] as $slider) {
            ?>
            <li class="col-xs-12 col-sm-3"><?=$slider['title'];?></li>
<?php } ?>
        </ul>

    </div>
</div>