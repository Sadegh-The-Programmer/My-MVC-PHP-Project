<?php

class App
{
    public $controller = 'index';
    public $method = 'index';
    public $params=[];
    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->parseURL($url);
            $this->controller = $url[0];
            unset($url[0]);
            if(isset($url[1])) {
                $this->method = $url[1];
                if($this->method==''){$this->method = 'index';}
                unset($url[1]);
            }
            $this->params = array_values($url);
        }
        $address = 'controllers/' . $this->controller . '.php';

        if (file_exists($address)) {
            include $address;
            $object = new $this->controller();
            $object->model($this->controller);
            if (method_exists($object, $this->method))
                call_user_func_array([$object, $this->method], $this->params);
        }

    }

    function parseURL($url)
    {
        filter_var($url, FILTER_SANITIZE_URL);
        $array_url = explode('/', $url);
        return $array_url;
    }

}
// کدهای قدیمی
//echo 'we are index page <br/>';
// echo $_GET['url'].'<br/>';
//$url=explode('/',$_GET['url']);
//print_r($url);echo '<br/>';
//$controller=$url[0];
//unset($url[0]);
//$method=$url[1];
//unset($url[1]);
//$params=array_values($url);
//print_r($params);echo '<br/>';
//require ('controllers/'.$controller.'.php');
//controllerObject is an object
//controller is my controller like order or user
//$controllerObject = new $controller;
//$controllerObject->$method($params);
//call_user_func_array([$controllerObject,$method],$params);
?>