<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php include "admin/com/mysqloperate.php"?>

<?php
if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 9;
$res_total = MySqlOperate::getInstance()->field('t_id')
    ->where('t_type='.$_GET['id'])
    ->select('T_CONTACT');
$total = count($res_total);
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_file_name,t_file_path')
    ->order('t_time desc')
    ->where('t_type='.$_GET['id'])
    ->select('T_CONTACT');

$res_type = MySqlOperate::getInstance()->field('t_id,t_title')
    ->where('t_id='.$_GET['id'])
    ->select('T_CONTACT_TYPE');
?>

<?php
$page_id = 7;
$page_base_name = "Contact Us";
if(!empty($res_type)) {
    $page_name = $res_type[0]['t_title'];
} else {
    $page_name = "";
}
$page_link = "";
$page_sub_name = "";
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
                        <?php for($i=0; $i<count($res_contact_type); $i++) {?>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="contact_list.php?id=<?php echo $res_contact_type[$i]['t_id'] ?>">
                                        <?php echo $res_contact_type[$i]['t_title'] ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="contact_us.php">
                                    Contact Information
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
            <section id="page-sidebar" class="pull-right span10">
                <section class="portfolio ">
                    <?php for($i=0; $i<count($res); $i++) { ?>
                    <article data-type="javascript html" class="span2" style="max-height: 150px;">
                        <div class="inner-image">
                            <a href="contact_list_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
                                <img src="<?php echo $res[$i]['t_file_path']; ?>" alt="<?php echo $res[$i]['t_file_name']; ?>" />
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
            </section>
        </div>

    </div>
</section>

<?php if(!empty($res)) { ?>
<!--pagination-->
<div class="pagination pagination-centered">
    <ul>
        <?php if($pageNo > 1) { ?>
            <li class="disabled"><a href="contact_list.php?id=<?php echo $_GET['id'];?>&pageNo=<?php echo $pageNo-1;?>">&laquo;</a></li>
        <?php } ?>
        <?php for( $i=0; $i < $pageTotal; $i++) { ?>
            <li><a <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> href="contact_list.phpid=<?php echo $_GET['id'];?>&?pageNo=<?php echo $i+1;?>">
                    <?php echo $i+1; ?></a></li>
        <?php } ?>
        <?php if($pageNo < $pageTotal) { ?>
            <li><a href="contact_list.php?id=<?php echo $_GET['id'];?>&pageNo=<?php echo $pageNo+1;?>">&raquo;</a></li>
        <?php } ?>
    </ul>
</div>
<?php } ?>

<?php include "_footer.php"; ?>

</body>
</html>
