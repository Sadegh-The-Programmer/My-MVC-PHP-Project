<html>
<head>
    <title>Ajax</title>
    <script src="../public/test/jquery.js"></script>
</head>
<body>
<button>Click me...</button>
<script>
    $('button').click(function () {
        let url = 'json_reader.php';
        let data = {'id': 2};
        $.post(url,data,function (msg) {
            /*
            $.each(msg,function (index,value) {
                alert('Index : '+ index + ' - Value : '+value);
            });

            msg.forEach(function (index,value) {
                alert('Index : '+ index + ' - Value : '+value);
            })
            */

        },'json');

    });
</script>
</body>
</html>