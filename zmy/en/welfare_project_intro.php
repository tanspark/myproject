<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 3;
$page_base_name = "Welfare Project";
$page_name = "Amazing Graphene Changes The World";
$page_link = "";
$page_sub_name = "Project Introduction";
?>

<?php
include "admin/com/mysqloperate.php";
include "admin/com_kp/mysqloperate.php";
?>

<?php

//$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
//    ->where('t_id='.$_GET['id'])
//    ->select('T_WELFARE_PROJECT');

$res_match = MySqlOperateMatch::getInstance()->field('t_id,t_title,t_content,t_time')
    ->order('t_time desc')
    ->where('t_type=1 and t_selected=1')
    ->select('T_MATCH_INFO');

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
        <section class="row">
            <aside id="sidebar" class="pull-left span2">
                <section>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_project_intro.php">
                                    Project Introduction
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_flow.php">
                                    Flow Chart
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_trends.php">
                                    Trend
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_operate.php?type=1">
                                    Cooperative School
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="welfare_policy.php">
                                    Relevant Policies
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

            <section id="page-sidebar" class="pull-left span10">
                <div class="text-title">
                    <?php if(!empty($res_match)) echo $res_match[0]['t_title'] ?>
                </div>
                <hr>

                <div>
                    <?php if(!empty($res_match)) echo $res_match[0]['t_content'] ?>
                </div>
            </section>

        </div>
    </div>
</section>


<?php include "_footer.php"; ?>

</body>
</html>
