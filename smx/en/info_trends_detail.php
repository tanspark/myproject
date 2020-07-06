<?php
$page_id = 4;
$page_base_name = "News";
$page_name = "Trend";
$page_link = "info_trends.php";
$page_sub_name = "Detail";

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
        ->where('t_id='.$_GET['id'])
        ->select('T_TRENDS');

    $res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath')
        ->where('t_pid='.$_GET['id'])
        ->select('t_doc');
}
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 填充空间，向上的空间覆盖 ==================== -->
    <section class="padding-room"> </section>

    <!-- ==================== 导航栏 ==================== -->
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
                                        <strong>News</strong>
                                        <li><a href="info_notice.php">Notice</a></li>
                                        <li><a href="info_trends.php">Trend</a></li>
                                        <li><a href="info_publicity.php">List Publicity</a></li>
                                        <li><a href="info_activity.php">Activity Snapshot</a></li>
                                        <li><a href="info_video.php">Video Broadcast</a></li>
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
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title']?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <?php if(!empty($res)) echo $res[0]['t_content']; ?>

                                    <br>

                                    <?php if(!empty($res_doc)) if(count($res_doc)>0) { ?>
                                        <div>下载文件：
                                            <?php for ($i = 0; $i< count($res_doc); $i++) { ?>
                                                <p>
                                                    <a href="<?php echo $res_doc[$i]['t_filepath']; ?>"
                                                       download="<?php echo $res_doc[$i]['t_filepath']; ?>">
                                                        <?php echo $res_doc[$i]['t_filename']; ?>
                                                    </a>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    <?php }?>
                                </div>

                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blogs -->

                </div>
                <!-- colm8 -->
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