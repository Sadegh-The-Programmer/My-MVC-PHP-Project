<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post">
    <input type="text" name="resnum" placeholder="Reservation number">
    <input type="text" name="amount" placeholder="Amount">
    <input name="send" type="submit" value="ارسال برگشت">
</form>
</body>
</html>
<?php
require_once 'nusoap/nusoap.php';

if(isset($_POST['send']))
{
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
        $stmt->bindValue(1,$_POST['resnum']);
        $stmt->execute();
        $result=$stmt->fetch();
        $current_amount=$result['amount']-$result['reverse'];
        $current_reverse=$_POST['amount'];
        if($current_amount>$current_reverse){
            $MID='xxxx=-xxxx-xxxx-xxxx';
            $pass='xxxxxxxxx';
            $client = new nusoap_client('https://sep.shaparak.ir/payments/referencepayment.asmx?WSDL','wsdl');
             $proxy=$client->getProxy();
             $result=$proxy->ReverseTransaction($_POST['resnum'],$MID,$pass,$_POST['amount']);
            if($result==1)
            {
                $sql='update customer_order set reverse=reverse+? where reservation_number=?';
                $stmt=$connect->prepare($sql);
                $stmt->bindValue(1,$_POST['amount']);
                $stmt->bindValue(2,$_POST['resnum']);
                $stmt->execute();
            }
            else{
                echo $result;
            }
        }
        else{
            echo 'Cant...';
        }



    }
}

?>