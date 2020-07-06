<?php
$page_id = 8;
$page_base_name = "关于我们";
$page_name = "成功案例";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content,t_time')
    ->where('t_selected=1 and t_id='.$_GET['id'])
    ->select('T_ABOUT_CASE');
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 填充空间，向上的空间覆盖 ==================== -->
    <section class="padding-room"> </section>

<?php include "_start.php"; ?>

<?php include "_nav.php"; ?>

    <!-- ==================== blog-section start ==================== -->
    <section id="blog-section" class="intro-section w100dt mb-10">
        <div class="container">
            <div class="row">

                <div class="col s9 m9 l3">
                    <div class="mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content w100dt">
                                <div id="adminMenus" class="mod">
                                    <ul>
                                        <strong>关于我们</strong>
                                        <li><a href="about_who.php">我们是谁</a></li>
                                        <li><a href="about_case.php">成功案例</a></li>
                                        <li><a href="about_contact.php">联系我们</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 m9 l9">
                    <div class="blogs mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content">
                                <ul>
                                    <li class="p_news_title">
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title'] ?></span>
                                        <span style="float: right;"><?php if(!empty($res)) echo $res[0]['t_time']; ?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <?php if(!empty($res)) echo $res[0]['t_content'] ?>
                                </div>

                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blogs -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#blog-section -->
    <!-- ==================== blog-section end ==================== -->



<?php
include "_footer.php";
?>