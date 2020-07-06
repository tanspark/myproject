<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 4;
$page_base_name = "新闻资讯";
$page_name = "机构动态-新闻";
$page_link = "news_list.php";
$page_sub_name = "详情";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_time,t_content,t_from,t_from_time,t_link')
    ->where('t_id='.$_GET['id'])
    ->select('T_NEWS_TRENDS');
?>

<?php include "_head.php"; ?>

<body>

<!--top menu-->
<?php include "_top.php"?>

<!--菜单栏-->
<?php include "_header.php"; ?>

<!--页面导航栏-->
<?php include "_nav.php"; ?>

<section id="container">
    <div class="container">
        <div class="row">
            <aside id="sidebar" class="pull-left span2">
                <section>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_list.php">
                                    基金会新闻
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_trends.php">
                                    行业动态
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_story.php">
                                    基金会故事
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_honour.php">
                                    荣誉
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_media.php">
                                    媒体关注
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="news_video.php">
                                    视频资料
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
            <div class="span10">
                <div class="text-title">
                    <?php if(!empty($res)) echo $res[0]['t_title'] ?>
                </div>
                <span style="">来源：<a href="<?php if(!empty($res)) echo $res[0]['t_link'] ?>">
                        <?php if(!empty($res)) echo $res[0]['t_from'] ?></a></span>
                <span style="margin-left: 20px;">发布时间：<?php if(!empty($res)) echo $res[0]['t_from_time'] ?></span>

                <hr>

                <div>
                    <?php if(!empty($res)) echo $res[0]['t_content'] ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
