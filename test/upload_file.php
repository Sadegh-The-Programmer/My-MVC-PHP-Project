<?php
$file=$_FILES['file'];
$file_name=$file['name'];
$file_size=$file['size'];
$file_type=$file['type'];
$file_temporary_name=$file['tmp_name'];
$file_error=$file['error'];
$can_upload=true;
$new_name='pic';
if($file_type!=='image/jpg' && $file_type!=='image/jpeg'){
    $can_upload=false;
}
if($file_size>5242880){$can_upload=false;}
if($can_upload){
    $extension=pathinfo($file_name,PATHINFO_EXTENSION);
    $target='file/'.$new_name.'.'.$extension;
    move_uploaded_file($file_temporary_name,$target);
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
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file" title="انتخاب" >
    <input type="submit" value="send"/>
</form>
</body>
</html>