<?php
$customer_info=($data['customer_info']);
$statistics=($data['statistics']);
if($customer_info['sex']==1) {
    $jensiat = 'مرد';
}else{
    $jensiat = 'زن';
}
if($customer_info['Subscribe_to_Newsletter']==1) {
    $newsletter = 'بلی';
}
else{
    $newsletter = 'خیر';
}

?>
<div class="main container">
    <?php require 'boxes/box1.php'; ?>
    <?php require 'boxes/box2.php'; ?>
    <?php require 'boxes/box3.php'; ?>

</div>
