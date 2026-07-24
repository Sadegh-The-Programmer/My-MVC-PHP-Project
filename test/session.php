<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/16/2019
 * Time: 11:50 AM
 */
session_start();
$_SESSION['user_id']=10;
echo $_SESSION['user_id'].'<br>';
echo $_COOKIE['basket'];
