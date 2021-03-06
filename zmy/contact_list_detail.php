<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_content')
    ->order('t_time desc')
    ->where('t_type='.$_GET['id'])
    ->select('T_CONTACT');

if(!empty($res)) {
    $res_type = MySqlOperate::getInstance()->field('t_id,t_title')
        ->where('t_id='.$res[0]['t_type'])
        ->select('T_CONTACT_TYPE');
}
?>

<?php
$page_id = 7;
$page_base_name = "联系我们";
if(!empty($res_type)) {
    $page_name = $res_type[0]['t_title'];
    $page_link = "";
    $page_sub_name = "详情";
} else {
    $page_name = "";
    $page_link = "";
    $page_sub_name = "";
}
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
                                    <a class="accordion-toggle" href="contact_list_detail.php?id=<?php echo $res_contact_type[$i]['t_id'] ?>">
                                        <?php echo $res_contact_type[$i]['t_title'] ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="contact_us.php">
                                    联系方式
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
            <div class="span10">
                <div class="span8">

                    <div class="text-title">
                        <?php if(!empty($res)) echo $res[0]['t_title'] ?>
                    </div>
                    <hr>

                    <div>
                        <?php if(!empty($res)) echo $res[0]['t_content'] ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
