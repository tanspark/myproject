<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 2;
$page_base_name = "Project Foundation Overview";
$page_name = "About Us";
$page_link = "";
$page_sub_name = "";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_FOUND_ABOUT');
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
                                        About Us
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=1">
                                        Vision
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=2">
                                        Mission
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_idea.php?type=3">
                                        Values
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_word.php">
                                        Sponsor Message
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=1">
                                        Council
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=2">
                                        Board of Supervisors
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_organ.php?type=3">
                                        Secretariat
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" href="found_charter.php">
                                        Constitution
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
