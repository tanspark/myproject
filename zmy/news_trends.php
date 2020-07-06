<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 4;
$page_base_name = "新闻资讯";
$page_name = "机构动态-行业动态";
$page_link = "";
$page_sub_name = "";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 6;
$res_total = MySqlOperate::getInstance()->field('t_id')
    ->where('t_type=2')
    ->select('T_NEWS_TRENDS');
$total = count($res_total);
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_link,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->where('t_type=2')
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

<!--container-->
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
            <section id="page-sidebar" class="pull-left span10">

                <?php for($i=0; $i<count($res); $i++) { ?>
                <article class="blog-post">
                    <div class="row">
                        <div class="span10">
                            <div class="post-content" style="margin-top: 10px;">
                                <span><?php echo $i+1; ?>&nbsp;&nbsp;&nbsp;</span>
                                <a href="<?php echo $res[$i]['t_link']; ?>" target="_blank"><?php echo $res[$i]['t_title']; ?></a>
                                <span style="float: right;"><?php echo $res[$i]['t_time']; ?></span>
                            </div>

                        </div>
                    </div>
                </article>
                <hr />
                <?php } ?>

                <!--pagination-->
                <div class="pagination pagination-centered">
                    <ul>
                        <?php if($pageNo > 1) { ?>
                            <li><a href="news_trends.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                        <?php } ?>
                        <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                            <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="news_trends.php?pageNo=<?php echo $i+1;?>">
                                    <?php echo $i+1; ?></a></li>
                        <?php } ?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li><a href="news_trends.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>
