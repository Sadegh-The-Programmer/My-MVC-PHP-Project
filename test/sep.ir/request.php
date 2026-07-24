<?php
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
$amount=1000;
$reservation_number=time();
$family='sadeqi';
$sql='insert into customer_order(reservation_number,amount,family) values (?,?,?)';
$stmt=$connect->prepare($sql);
$stmt->bindValue(1,$reservation_number);
$stmt->bindValue(2,$amount);
$stmt->bindValue(3,$family);
$stmt->execute();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../../public/test/jquery.js"></script>
</head>
<body>
<form class="form" method="post" action="https://sep.shaparak.ir/Payment.aspx">
<input name="Amount" type="hidden" value="<?=$amount?>">
<input name="MID" type="hidden" value="xxxx-xxxx-xxxx-xxxx">
<input name="ResNum" type="hidden" value="<?=$reservation_number?>">
<input name="RedirectURL" type="hidden" value="http://localhost/Digikala_MVC/test/sep.ir/verify.php">

</form>
<script>$('.form').submit();</script>
</body>
</html>
