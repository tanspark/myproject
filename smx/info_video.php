<?php
$page_id = 4;
$page_base_name = "活动资讯";
$page_name = "视频播报";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 9;
$total = MySqlOperate::getInstance()->totals('T_VIDEO');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_filename,t_filepath,t_author,t_time')
    ->order('t_time desc, t_id asc')
    ->limit($pageNo, $pageSize)
    ->select('T_VIDEO');
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
                                        <strong>活动资讯</strong>
                                        <li><a href="info_notice.php">通知公告</a></li>
                                        <li><a href="info_trends.php">活动动态</a></li>
                                        <li><a href="info_publicity.php">名单公示</a></li>
                                        <li><a href="info_activity.php">活动掠影</a></li>
                                        <li><a href="info_video.php">视频播报</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 m9 l9">

                    <div class="featured-posts w100dt mb-30">

                        <div class="sidebar-posts">

                            <div class="option-item no-border">

                                <ul class="video-list mt10">
                                <?php if(!empty($res))
                                for ($i=0; $i < count($res) ; $i++) {
                                ?>
                                    <li class="mb-10">
                                        <div class="video-image">
                                            <a href="info_video_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                <img src="<?php echo $res[$i]['t_filepath']; ?>"
                                                     alt="<?php echo $res[$i]['t_filename'];?>"
                                                     style="width: 300px; height: 160px;">
                                            </a>
                                        </div>
                                        <div class="news-handle tr center">
                                            <div class="name center" style="background-color: rgba(255,255,255,0.1);">
                                                <p><a href="info_video_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                        <?php echo $res[$i]['t_title'];?></a></p>
                                                <p><?php echo $res[$i]['t_time'];?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- /.sidebar-posts -->

                    </div>
                    <!-- /.featured-posts -->
                    <ul class="pagination w100dt">
                        <?php if($pageNo > 1) { ?>
                            <li class="waves-effect"><a href="info_video.php?pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                        <?php } ?>
                        <?php
                        for( $i=0; $i < $pageTotal; $i++) {
                            ?>
                            <li <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> >
                                <a href="info_video.php?pageNo=<?php echo $i+1;?>"><?php echo $i+1; ?></a>
                            </li>
                        <?php }?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li class="waves-effect"><a href="info_video.php?pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
                        <?php } ?>
                    </ul>
                    <!-- /.featured-posts -->

                </div>
                <!-- colm4 -->


            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#blog-section -->
    <!-- ==================== blog-section end ==================== -->
<?php include "_footer.php";?>