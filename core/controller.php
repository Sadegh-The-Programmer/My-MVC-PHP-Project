<?php

class Controller
{
    public $objectModel;

    function __construct()
    {

    }

    function view($viewurl,$name='', $data=[], $just_main = false)
    {
        if(!$just_main) {
            require 'views/' . $viewurl . 'head.php';
            require 'header.php';
            require 'views/' . $viewurl .$name. '.php';
            require 'footer.php';
            require 'views/' . $viewurl . 'footing.php';
        }
        else{

            require 'views/' . $viewurl . '.php';

        }
    }

    function model($modelurl)
    {
        require 'models/model_' . $modelurl . '.php';
        $classname = 'model_' . $modelurl;
        $this->objectModel = new $classname;
    }
}