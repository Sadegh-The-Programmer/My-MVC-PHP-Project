<?php
require_once 'nusoap/nusoap.php';
$Amount=0;//get from database
$state="OK";//$_POST['State'];
$reservation_number="1559213810";//$_POST['ResNum'];
$reference_number="khgjdfgshfhsd345hhdhss";//$_POST['RefNum'];
$servername='localhost';
$username='root';
$pass='';
$dbname='digikala_mvc';
$dsn="mysql:host=".$servername.";port=3306;dbname=".$dbname;
try{
    $connect=new PDO($dsn,$username,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connect->exec("SET character_set_connection='utf8'");
    $connect->exec("SET NAMES 'utf8'");
}
catch(PDOException $error)
{
    echo "Unable to connect".$error->getMessage();
}
finally{
    $sql='select * from customer_order where reservation_number=?';
    $stmt=$connect->prepare($sql);
    $stmt->bindValue(1,$reservation_number);
    $stmt->execute();
    $result=$stmt->fetch();
    $Amount=$result['amount'];
    $order_id=$result['id'];
        $reference_number_current=$result['reference_id'];


}

if($state!='OK')
{
    echo 'خطایی در تراکنش رخ داده';
}
else{
  //  $client = new nusoap_client('https://sep.shaparak.ir/payments/referencepayment.asmx?WSDL','wsdl');
   // $proxy=$client->getProxy();
    //$result=$proxy->VerifyTransaction($reference_number,$Amount);
      // var_dump($result);
        $result=1000; // for example...
    if($result==$Amount)
    {
        echo ' مبلغ تایید شده است.';

        if($reference_number_current=='') {
            $sql = 'update customer_order set reference_id=? where id=?';
            $stmt = $connect->prepare($sql);
            $stmt->bindValue(1, $reference_number);
            $stmt->bindValue(2, $order_id);
            $stmt->execute();
            echo  'تراکنش ثبت شد';
        }else
        {
            echo ' قبلا تراکنش ثبت شده است';
        }


    }
    else{
        //باز هم رفرنس آی دی را دخیره کن برادر
        echo ' < ';
        echo ' > ';
        echo ' - ';
        echo ' یا کمتر یا بیشتر است یا اینکه منفی رخ داده که خطا می باشد';
    }


}