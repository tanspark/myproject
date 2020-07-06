<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 5;
$page_base_name = "Information Disclosure";
$page_name = "Rules and Regulations";
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

$pageSize = 8;
$total = MySqlOperate::getInstance()->totals('T_INFO_RULE');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_file_name,t_file_path,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->select('T_INFO_RULE');
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
                                    Annual Report
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_audit.php">
                                    Audit Report
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_rule.php">
                                    Rules and Regulations
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_revenue.php">
                                    Revenue and Expenditure
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="info_report.php">
                                    Assessment Report
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

            <section id="page-sidebar" class="pull-right span10">

            <?php for($i=0; $i<count($res); $i++) { ?>
            <article class="blog-post">
                <div class="row">
                    <div class="span10">
                        <div class="post-content" style="margin-top: 10px;">
                            <span><?php echo $i+1; ?>&nbsp;&nbsp;&nbsp;</span>
                            <a href="<?php echo $res[$i]['t_file_path']; ?>"><?php echo $res[$i]['t_title']; ?></a>
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
                        <li><a href="info_rule.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                    <?php } ?>
                    <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                        <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="info_rule.php?pageNo=<?php echo $i+1;?>">
                                <?php echo $i+1; ?></a></li>
                    <?php } ?>
                    <?php if($pageNo < $pageTotal) { ?>
                        <li><a href="info_rule.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
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
