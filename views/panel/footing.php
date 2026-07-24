</body>
<script>


    $('.details').click(function () {
        $(this).find('span').toggleClass('glyphicon-chevron-down');
        $(this).find('span').toggleClass('glyphicon-chevron-up');
        var tr = $(this).parent();
        tr.next('.details_row').slideToggle(200);
    });
</script>

<!-- Script for Slider -->
</html>



