<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/26/2019
 * Time: 04:40 PM
 */

class Showcart1 extends Controller
{
    function __construct()
    {
        Model::session_init();
        if(Model::session_get('user_id'))
        {
            header('location:'.URL.'showcart2/index/');
        }
    }
    function index()
    {

        model::session_set('cart',true);
        $this->view('showcart1/','index');
    }
}