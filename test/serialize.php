<?php
$array=array(1=>5,2=>3);
$str= serialize($array);
echo $str;
//print_r( unserialize($str));