<?php
$params = $data[0];
$comments = $data[1];
//print_r($params);
?>
<div id="comments_result">
    <div class="col-xs-12 col-sm-6" id="result">
        <h5> میانگین امتیاز ها به : <em id="title"></em></h5>
        <?php foreach ($params as $param) {
            $all=5;
            $rank = floor($param['rank']);
            ?>
            <div class="row">
                <span class="title"><?= $param['title'] ?></span>
                <ul class="list-unstyled">
                    <?php for ($i = 1; $i <= $rank; $i++) { ?>
                        <li style="background-color: #2aabd2;"></li>
                    <?php } ?>
                    <?php if($param['float_rank']>0){
                        $all=4;
                        ?>
                        <li><span style="display: block;width: <?= $param['float_rank']*100;?>%;height: 10px;background-color:#2aabd2; "></span></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $all-$rank; $i++) { ?>
                        <li></li>
                    <?php } ?>

                </ul>
            </div>
        <?php } ?>
        <!--
                    <div class="row">
                        <span class="title">سرعت دستگاه</span>
                        <ul class="list-unstyled">
                            <li style="background-color: #2aabd2;"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="row">
                        <span class="title">نوآوری</span>
                        <ul class="list-unstyled">
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="row">
                        <span class="title">شارژ باطری</span>
                        <ul class="list-unstyled">
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li><span style="background-color: #2aabd2;"></span></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="row">
                        <span class="title">طراحی ظاهری</span>
                        <ul class="list-unstyled">
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="row">
                        <span class="title">سیستم عامل و برنامه ها</span>
                        <ul class="list-unstyled">
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li style="background-color: #2aabd2;"></li>
                            <li><span style="background-color: #2aabd2;"></span></li>
                        </ul>
                    </div>
                    -->
    </div>
    <div class="col-xs-12 col-sm-6" id="send_comment">
        <p>شما هم می توانید در مورد این کالا نظر دهید</p>
        <p>برای ثبت نظرات خود ابتدا باید وارد سامانه کاربری خود شوید نظرات شما برای سایر کاربران قابل دیدن
            است بنابراین پس از تایید در این قسمت درج می شود.</p>
        <button class="btn btn-primary">ارسال نظر</button>
    </div>
</div>
<div id="comments">
    <h4>نظرات کاربران</h4>
    <hr/>
    <section class="">
        <!-- First Comment -->
        <?php foreach ($comments as $comment) { ?>
            <article class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-responsive"
                             src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png"/>
                        <figcaption class="text-center">صادق خان</figcaption>
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-user text-right">
                                    <span><?= $comment['title']; ?><i
                                                class="glyphicon glyphicon-thumbs-up"></i><b><?= $comment['like_count']; ?></b>
                                            <i class="glyphicon glyphicon-thumbs-down"></i><b><?= $comment['dislike_count']; ?></b></span>
                                </div>
                                <time class=""><?= $comment['insert_date']; ?></time>
                            </header>
                            <div class="comment_body">
                                <p>
                                    <?= $comment['body']; ?>
                                </p>
                                <p><b>مزایا : </b><?= $comment['positive']; ?></p>
                                <p><b>معایب : </b><?= $comment['negative']; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </article>
        <?php } ?>

    </section>

</div>
<script>
$('#title').text($('#product_title').text());
</script>