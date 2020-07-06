<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 6;
$page_base_name = "爱心捐赠";
$page_name = "爱心企业";
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

$pageSize = 20;
$res_total = MySqlOperate::getInstance()->field('t_id')
    ->where('t_type=2')
    ->select('T_DONATE');
$total = count($res_total);
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_file_name,t_file_path')
    ->order('t_time desc')
    ->where('t_type=2')
    ->limit($pageNo, $pageSize)
    ->select('T_DONATE');
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
                            <a class="accordion-toggle" href="donate_person.php">
                                捐赠人
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" href="donate_enterprise.php">
                                爱心企业
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" href="donate_check.php">
                                捐赠查询
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </aside>

        <section class="span10 portfolio filtrable clearfix">

            <?php for($i=0; $i<count($res); $i++) { ?>
            <article class="span2" style="width: 200px; height: 150px; border: solid 1px #00a2d4;">
                <div class="inner-image" >
                    <a href="donate_person_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
                        <img src="<?php echo $res[$i]['t_file_path']; ?>" alt="<?php echo $res[$i]['t_file_name']; ?>"
                             style="width: 200px; height: 150px;" />
                        <span class="frame-overlay"></span>
                    </a>
                </div>
                <div class="sliding">
                    <div class="inner-text">
                        <p style="text-align: center;"><?php echo $res[$i]['t_title']; ?></p>
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
                    <li><a href="donate_enterprise.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                <?php } ?>
                <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                    <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="donate_enterprise.php?pageNo=<?php echo $i+1;?>">
                            <?php echo $i+1; ?></a></li>
                <?php } ?>
                <?php if($pageNo < $pageTotal) { ?>
                    <li><a href="donate_enterprise.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
