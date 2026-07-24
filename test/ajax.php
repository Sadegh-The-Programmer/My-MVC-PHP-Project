<html>
<head>
    <title>Ajax</title>
    <script src="../public/test/jquery.js"></script>
</head>
<body>
<button>Click me...</button>
<script>
    $('button').click(function () {
        let url = 'ajax2.php';
        let data = {'id': 2};
        $.post(url,data,function (msg,status) {
           alert(msg+' '+status);
       });
    });
</script>
</body>
</html>