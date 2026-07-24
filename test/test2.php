<?php
$servername='localhost';
$username='root';
$pass='';
$dbname='test';
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
    $sql='select * from sample';
    $stmt=$connect->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();

//    $stmt=$connect->query($sql);
//    $result=$stmt->fetchAll();
    foreach ($result as $row)
    {
        print_r($row);
        echo '<br>';
    }

}