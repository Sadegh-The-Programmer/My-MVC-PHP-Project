<?php
//procedural and OPP programming
$servername='localhost';
$username='root';
$pass='';
$dbname='test';
$mysql=new mysqli($servername,$username,$pass,$dbname);
$mysql->set_charset('UTF8');

if($mysql->connect_error)
{
    echo $mysql->connect_errno;
    die();

}
else{
    echo 'OK ...<br>';
    //$sql='update sample set title="sadeq" where id=1';
    //$sql='delete from sample where title="sadeq"';
    $param='fsdf';
    $price=12000;
    $sql='insert into sample(title,price) values(?,?)';
    $stmt=$mysql->prepare($sql);
    $stmt->bind_param('si',$param,$price);
    $stmt->execute();

    $result=$mysql->query($sql);
    ///////////
    $sql='select * from sample';
    $result=$mysql->query($sql);
    while($row=$result->fetch_object())
    {
       echo $row->id;
       echo '<br>';
       echo $row->title;
       echo '<br>';
       echo $row->price;
       echo '<br>';
    }



}
?>