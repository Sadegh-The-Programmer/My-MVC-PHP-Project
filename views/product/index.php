<div class="main container">
    <?php
        $product_info=$data['product_info'];
        $title=$product_info['title'];
        $offer=$data['offer'];
        $date=$data['date'];
        if($offer==1){
    ?>
    <?php require 'offer.php'; }?>
    <?php require 'details.php'; ?>
    <?php require 'introduction.php'; ?>
    <?php require 'slider.php'; ?>
    <ul class="tab list-unstyled">
        <li class="tab_item">نقد و بررسی</li>
        <li class="tab_item">مشخصات فنی</li>
        <li class="tab_item">نظرات شما</li>
        <li class="tab_item">پرسش و پاسخ</li>
    </ul>
    <div class="tab_child">

        <section id="first_tab"></section>
        <section id="second_tab"></section>
        <section id="third_tab"></section>
        <section id="fourth_tab"></section>

        <?php //require 'tabs/first_tab.php'; ?>
        <?php //require 'tabs/second_tab.php'; ?>
        <?php //require 'tabs/third_tab.php'; ?>
        <?php //require 'tabs/fourth_tab.php'; ?>

    </div>
</div>