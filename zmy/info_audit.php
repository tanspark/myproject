<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 5;
$page_base_name = "信息公开";
$page_name = "审计报告";
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

$pageSize = 12;
$total = MySqlOperate::getInstance()->totals('T_INFO_AUDIT');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_pic_name,t_pic_path,t_file_name,t_file_path,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->select('T_INFO_AUDIT');
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
                                <a class="accordion-toggle" href="info_annual.php">
                                    工作年报
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_audit.php">
                                    审计报告
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_rule.php">
                                    基金会规章制度
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_revenue.php">
                                    善款收支
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_report.php">
                                    评估报告
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

            <section class="span10 portfolio filtrable clearfix">
                <?php for($i=0; $i<count($res); $i++) { ?>
                <article class="span2" style="width: 200px; height: 150px; border: solid 1px #00a2d4;">
                    <div class="inner-image">
                        <a href="<?php echo $res[$i]['t_file_path']; ?>">
                            <img src="<?php echo $res[$i]['t_pic_path']; ?>" alt="<?php echo $res[$i]['t_pic_name']; ?>"
                                 style="width: 200px; height:150px;" />
                            <span class="frame-overlay"></span>
                        </a>
                    </div>
                        <div class="sliding">
                            <div class="inner-text">
                                <h4 class="title" style="font-size: 12px; text-align: center;"><?php echo $res[$i]['t_title']; ?></h4>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </section>
        </div>

        <!--pagination-->
        <div class="pagination pagination-centered">
            <ul>
                <?php if($pageNo > 1) { ?>
                    <li><a href="info_audit.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                <?php } ?>
                <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                    <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="info_audit.php?pageNo=<?php echo $i+1;?>">
                            <?php echo $i+1; ?></a></li>
                <?php } ?>
                <?php if($pageNo < $pageTotal) { ?>
                    <li><a href="info_audit.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
                <?php } ?>

            </ul>
        </div>

    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>
