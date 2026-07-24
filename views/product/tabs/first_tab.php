<div class="panel-group wrap" id="bs-collapse">
<?php
    foreach ($data as $panel){
?>
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#" href="#<?=$panel['link'];?>">
                    <?= $panel['title']; ?>
                    </a>
                </h4>
            </div>
            <div id="<?=$panel['link'];?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= $panel['value']; ?>
                </div>
            </div>

        </div>
    <?php } ?>
    </div>
<script>
    $('.collapse.in').prev('.panel-heading').addClass('active');
    $('#accordion, #bs-collapse')
        .on('show.bs.collapse', function(a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function(a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
</script>