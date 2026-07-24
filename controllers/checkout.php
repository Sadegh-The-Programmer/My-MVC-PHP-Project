<?php
class Checkout extends Controller
{

    // http://localhost/Digikala_MVC/checkout?Authority=65954145&Status=100
    function __construct()
    {
        parent::__construct();
    }
    function index($orderId='')
    {
        $data=[];
        if(isset($_GET['Authority'])){
            $result=$this->objectModel->zarinpal_checkout($_GET);
            $data=array('orderInfo'=>$result[0],'status_name'=>$result[1]);
        }
        if($orderId!==''){

            $result=$this->objectModel->getOrderInfo($orderId);

            $data=array('orderInfo'=>$result[0],'status_name'=>$result[1]);

        }
        $this->view('checkout/','index',$data,false);
    }
    function payonline($order_id)
    {
        $this->objectModel->pay_online($order_id);
    }
    function showerror(){

        $Error=$_GET['error'];
        $orderId=$_GET['orderId'];
        $data=array('Error'=>$Error,'orderId'=>$orderId);
        $this->view('checkout/','error',$data,true);

    }
    function creditcard($orderId){

        if(isset($_POST['day'])){

            $this->objectModel->updateCreditCard($_POST,$orderId);

        }
        $orderInfo=$this->objectModel->getOrderInfo($orderId);
        $data=array('orderInfo'=>$orderInfo[0]);
        $this->view('checkout/','creditcard',$data);

    }
}