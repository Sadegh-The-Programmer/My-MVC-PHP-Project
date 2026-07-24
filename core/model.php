<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/28/2019
 * Time: 11:43 AM
 */

class Model
{
    public static $connect='';
    function __construct()
    {
        $servername='localhost';
        $username='root';
        $pass='';
        $dbname='digikala_mvc';
        $dsn="mysql:host=".$servername.";port=3306;dbname=".$dbname;
        try{
            self::$connect=new PDO($dsn,$username,$pass);
            self::$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$connect->exec("SET character_set_connection='utf8'");
            self::$connect->exec("SET NAMES 'utf8'");
        }
        catch(PDOException $error)
        {
            echo "Unable to connect".$error->getMessage();
        }
        finally{}
    }
    public static function get_option()
    {
        $sql='select * from settings';
        $stmt=self::$connect->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $options=array();
        foreach ($result as $row)
        {
            $options[$row['name']]=$row['value'];
        }
        return $options;
    }
    public function get_discount($price,$discount)
    {
        return ((100-$discount)*$price)/100;
    }
    function do_select($sql,$params=[],$fetchAll=true,$fetchStyle=PDO::FETCH_ASSOC)
    {
        $stmt=self::$connect->prepare($sql);
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
    function do_query($sql,$params=[])
    {
        $stmt=self::$connect->prepare($sql);
        foreach ($params as $key=>$value)
        {
            $stmt->bindValue($key+1,$value);
        }
        $stmt->execute();

    }
    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;


    }
    public static function  session_init()
    {
        session_start();
    }
    public static function  session_set($name,$value)
    {
        $_SESSION[$name]=$value;
    }
    public static function session_get($name)
    {
        if(isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        else{
            return false;
        }
    }
    public static function get_basket_cookie()
    {
        if(isset($_COOKIE['basket']))
        {
            return $_COOKIE['basket'];
        }
        else{
            $value=time();
            $expire=time()+7*24*3600;
            setcookie('basket',$value,$expire,'/');
            return $value;
        }
    }
    public  function  get_basket()
    {
        $cookie=self::get_basket_cookie();
        $sql='select basket.count,basket.color_name,basket.guarantee_name,basket.id as basket_id,product.* from basket join product on basket.product_id=product.id where basket.cookie=?';
        $param=[$cookie];
        $result= $this->do_select($sql,$param);
        $sum_discount=0;
        foreach ($result as $key=>$row) {
            $discount=($row['discount']*$row['price'])/100;
            $discount_row=$row['count']*$discount;
            $sum_discount+=$discount_row;
            $result[$key]['discount_row']=$discount_row;

        }




        $all_price=0;
        foreach ($result as $row)
        {
            $price=$row['price'];
            $count=$row['count'];
            $totalPrice=$price*$count;
            $all_price+=$totalPrice;
        }


        return [$result,$all_price,$sum_discount];
    }
}