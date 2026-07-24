<?php
class oop_db{
    public $connect;
    function __construct()
    {

        $servername='localhost';
        $username='root';
        $pass='';
        $dbname='test';
        $dsn="mysql:host=".$servername.";port=3306;dbname=".$dbname;
        try{
            $this->connect=new PDO($dsn,$username,$pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connect->exec("SET character_set_connection='utf8'");
            $this->connect->exec("SET NAMES 'utf8'");
        }
        catch(PDOException $error)
        {
            echo "Unable to connect".$error->getMessage();
        }

    }
    function get_product()
    {
        $id=14;
        $price=12000;
        $params=[$id,$price];
        $sql='select * from sample where id=? and price=?';
        $result=$this->do_select($sql,$params,false,PDO::FETCH_NUM);
        print_r($result);
    }
    function do_select($sql,$params=[],$fetchAll=true,$fetchStyle=PDO::FETCH_ASSOC)
    {
        $stmt=$this->connect->prepare($sql);
        foreach ($params as $key=>$value)
        {
            $stmt->bindValue($key+1,$value);
        }
        $stmt->execute();
        if($fetchAll)
        {
            $result=$stmt->fetchAll($fetchStyle);
        }
        else{
            $result=$stmt->fetch($fetchStyle);
        }
        return $result;
    }
}
$object=new oop_db;
$object->get_product();