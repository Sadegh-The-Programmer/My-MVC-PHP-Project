<script src="public/js/product.js"></script>
<script>
    $('.photo_item').click(function () {
        var str = 'public/images/products/<?=$product_info['id'];?>/medium/product' + $(this).index() + '.jpg';
        var str2 = 'public/images/products/<?=$product_info['id']; ?>/large/product' + $(this).index() + '.jpg';
        $('.pic1').attr('src', str);
        $('.pic1').data('zoom-image', str2).elevateZoom({
            lensShape: "round",
            cursor: 'crosshair',
            'zoomWindowOffetx': -800,
            'lensFadeIn': true,
            'lensFadeOut': true,
            'zoomWindowFadeIn': true,
            'zoomWindowFadeOut': true,
            'tint': true
        });

    });
    if ($(document).width() > 1000) {
        $('.pic1').elevateZoom({
            lensShape: "round",
            cursor: 'crosshair',
            'zoomWindowOffetx': -800,
            'lensFadeIn': true,
            'lensFadeOut': true,
            'zoomWindowFadeIn': true,
            'zoomWindowFadeOut': true,
            'tint': true
        });
    }

</script>
</body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">گالری
                <?php if($product_info['3d']==1){ ?>
                    <span id="3dcheckbox">3D<input type="checkbox"/></span>
                    <?php } ?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="left col-sm-3 col-xs-12">
                    <ul class="list-unstyled">
                        <?php $gallery = $data['gallery'];
                        foreach ($gallery as $row) {
                            ?>
                            <li>
                                <img src="public/images/products/<?= $product_info['id']; ?>/gallery/small/<?= $row ['img'] . '.jpg'; ?>">
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="right col-sm-9 col-xs-12">
                    <canvas id="cv" style="width: 100%;height: 300px;"></canvas>
                    <img id="Album_Large_photo" class="img-responsive"
                         src="public/images/products/<?= $product_info['id']; ?>/gallery/large/<?= $gallery[0]['img'] . '.jpg'; ?>">
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $('.modal-body>.left img').click(function () {
        var name = $(this).attr('src').substr(-15);
        var str = "public/images/products/<?=$product_info['id'];?>/gallery/large" + name;
        $('#Album_Large_photo').attr('src', str);
        ///////////////
    });


    var canvasTag = document.getElementById('cv');
    var viewer = new JSC3D.Viewer(canvasTag, {
        SceneUrl: 'public/images/products/<?=$product_info['id'];?>/3d/product.obj',
        InitRotationX: -100,
        InitRotationY: -100,
        InitRotationZ: 0,
        RenderMode: 'texturesmooth'
    });
    viewer.init();
    viewer.update();
    $('#cv').hide();

    $('#3dcheckbox input').mouseover(function () {
        $('#Album_Large_photo').fadeOut(100);
    });
    $('#3dcheckbox input').mouseleave(function () {
        if (!$(this).is(':checked')) {$('#Album_Large_photo').fadeIn(100);}
    });
    $('#3dcheckbox input').click(function () {
        if ($(this).is(':checked')) {
            $('#cv').fadeIn(1000);
        }
        else {
            $('#cv').fadeOut(100);

        }
    });
    //مربوط به تب بندی
    $('.tab li').click(function () {
        $('.tab_child>section').fadeOut(1);
        var index = $(this).index();
        var selected_section = $('.tab_child>section').eq(index);
        var url = "<?=URL?>product/tab/<?=$product_info['id']?>/<?=$product_info['cat'];?>";
        var data = {'index': index};
        $.post(url, data, function (msg) {
            //alert(msg);
            selected_section.html(msg);
        });
        $('.tab li').removeClass('active');
        $(this).addClass('active');

        selected_section.fadeIn(500);


    });

</script>

<!-- Script for Slider -->
</html>

