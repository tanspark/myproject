<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 6;
$page_base_name = "爱心捐赠";
$page_name = "爱心企业";
$page_link = "donate_enterprise.php";
$page_sub_name = "详情";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
    ->where('t_id='.$_GET['id'])
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

            <div class="span10">
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
</section>


<?php include "_footer.php"; ?>

</body>
</html>
