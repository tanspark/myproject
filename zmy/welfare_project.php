<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 3;
$page_base_name = "公益项目";
$page_name = "";
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

$pageSize = 9;
$total = MySqlOperate::getInstance()->totals('T_WELFARE_PROJECT');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_file_name,t_file_path')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->select('T_WELFARE_PROJECT');
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

        <section class="row portfolio filtrable clearfix">
            <?php  for($i=0; $i<count($res); $i++) { ?>
            <article data-id="id-2" data-type="php" class="span4">
                <div class="inner-image" style="width: 400px; height: 300px;">
                    <a href="welfare_project_intro.php?id=<?php echo $res[$i]['t_id'] ?>">
                        <img src="<?php echo $res[$i]['t_file_path'] ?>" alt="photo" style="max-width: 400px; max-height: 300px;" />
                        <span class="frame-overlay"></span>
                    </a>
                </div>
                <div class="sliding">
                    <div class="inner-text">
                        <p class="title"><?php echo $res[$i]['t_title'] ?></p>
                    </div>
                </div>
            </article>
            <?php } ?>
        </section>

        <!--pagination-->
        <div class="pagination pagination-centered">
            <ul>
                <?php if($pageNo > 1) { ?>
                    <li><a href="welfare_project.php?pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
                <?php } ?>
                <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                    <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="welfare_project.php?pageNo=<?php echo $i+1;?>">
                            <?php echo $i+1; ?></a></li>
                <?php } ?>
                <?php if($pageNo < $pageTotal) { ?>
                    <li><a href="welfare_project.php?pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
