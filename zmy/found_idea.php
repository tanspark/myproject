<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 2;
$page_base_name = "项目基金会概况";
if($_GET['type'] == 1) {
    $page_name = "愿景";
} else if($_GET['type'] == 2) {
    $page_name = "使命";
} else if($_GET['type'] == 3) {
    $page_name = "价值观";
} else {

}
$page_link = "";
$page_sub_name = "";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
    ->order('t_time desc')
    ->where('t_selected=1 and t_type='.$_GET['type'])
    ->select('T_FOUND_IDEA');
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
            <?php if(!empty($res)) { ?>
                <aside id="sidebar" class="pull-left span2">
                    <section>
                        <div class="accordion" id="accordion2">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_about.php">
                                        关于我们
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=1">
                                        愿景
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=2">
                                        使命
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=3">
                                        价值观
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_word.php">
                                        发起人寄语
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=1">
                                        理事会
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=2">
                                        监事会
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=3">
                                        秘书处
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_charter.php">
                                        章程
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            <?php } ?>

            <div class="span9">
                <div class="text-title">
                    <?php if(!empty($res)) echo $res[0]['t_title'] ?>
                </div>
                <hr>

                <div class="text-content">
                    <?php if(!empty($res)) echo $res[0]['t_content'] ?>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
