<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/16/2019
 * Time: 07:39 PM
 */
setcookie('basket',120,time()+24*3600);
header('location:http://localhost/Digikala_MVC/test/session.php');