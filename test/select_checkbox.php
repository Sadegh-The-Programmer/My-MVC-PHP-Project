<?php
if(isset($_POST['submit']))
{
    echo 'submitted';
    print_r($_POST);
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input name="name[]" type="checkbox" value="one"/>
    <input name="name[]" type="checkbox" value="two"/>
    <input name="name[]" type="checkbox" value="three" />
    <input name="submit" type="submit" value="send">
</form>
</body>
</html>