<?php
$page_id = 7;
$page_base_name = "精彩回顾";
$page_name = "本届大赛精彩回顾";
$page_link = "wonder_current.php";
$page_sub_name = "详情";

include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_segment,t_district,t_theme,t_content,t_filename,t_filepath')
    ->where('t_id='.$_GET['id'])
    ->select('T_WONDER');

$res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath')
    ->where('t_pid='.$_GET['id'])
    ->select('t_doc');
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 导航栏 ==================== -->
    <section class="padding-room"> </section>

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
                                        <strong>精彩回顾</strong>
                                        <li><a href="wonder_current.php">本届大赛精彩回顾</a></li>
                                        <li><a href="wonder_history.php">往届大赛精彩回顾</a></li>
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
                                    <li class="p_news_title" style="text-align: center">
                                        <span class="title-left"><?php echo $res[0]['t_title']; ?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <?php if(!empty($res)) echo $res[0]['t_content']; ?>
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