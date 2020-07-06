<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 3;
$page_base_name = "公益项目";
$page_name = "神奇的石墨烯改变世界";
$page_link = "";
$page_sub_name = "动态";
?>

<?php
include "admin/com/mysqloperate.php";
include "admin/com_kp/mysqloperate.php";
?>

<?php

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 5;
$total = MySqlOperateMatch::getInstance()->totals('t_trends');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperateMatch::getInstance()->field('t_id,t_title,t_desc,t_author,t_time')
    ->order('t_time desc, t_id asc')
    ->limit($pageNo, $pageSize)
    ->select('t_trends');

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
                                <a class="accordion-toggle" href="welfare_project_intro.php">
                                    项目简介
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_flow.php">
                                    流程图
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_trends.php">
                                    动态
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_operate.php?type=1">
                                    合作学校
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_policy.php">
                                    相关政策
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
                                    <a href="welfare_trends_detail.php?id=<?php echo $res[$i]['t_id']; ?>"><?php echo $res[$i]['t_title']; ?></a>
                                    <span style="float: right;"><?php echo $res[$i]['t_time']; ?></span>
                                </div>

                            </div>
                        </div>
                    </article>
                    <hr />

                <?php } ?>

                <?php if(!empty($res)) {?>
                <!--pagination-->
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php if($pageNo > 1) { ?>
                                <li><a href="welfare_trends.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                            <?php } ?>
                            <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                                <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="welfare_trends.php?pageNo=<?php echo $i+1;?>">
                                        <?php echo $i+1; ?></a></li>
                            <?php } ?>
                            <?php if($pageNo < $pageTotal) { ?>
                                <li><a href="welfare_trends.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </section>

        </div>
    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>
