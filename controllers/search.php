<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 04:20 PM
 */

class search extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $this->view('search/');
    }
}