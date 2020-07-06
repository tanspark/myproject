<?php
$page_id = 4;
$page_base_name = "News";
$page_name = "Notice";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 15;
$total = MySqlOperate::getInstance()->totals('t_notice');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_author,t_time')
    ->order('t_time desc, t_id asc')
    ->limit($pageNo, $pageSize)
    ->select('t_notice');

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
                                    <li class="p_news_title">
                                        <span class="title-left">Notice</span>
                                    </li>
                                </ul>
                                <div class="text-content">
                                    <ul class="post-mate-time left mb-30">

                                        <?php if(!empty($res))
                                            for ($i=0; $i < count($res) ; $i++) {
                                                ?>
                                                <li><a href="info_notice_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
                                                        <i class="icofont icofont-ui-calendar"></i> <?php echo $res[$i]['t_time'];?>&nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <span class="mb-30"><?php echo $res[$i]['t_title'];?></span></a>
                                                </li>
                                            <?php } ?>
                                    </ul>

                                    <ul class="pagination w100dt">
                                        <?php if($pageNo > 1) { ?>
                                            <li class="waves-effect"><a href="info_notice.php?pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                                        <?php } ?>
                                        <?php
                                        for( $i=0; $i < $pageTotal; $i++) {
                                            ?>
                                            <li <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> >
                                                <a href="info_notice.php?pageNo=<?php echo $i+1;?>"><?php echo $i+1; ?></a>
                                            </li>
                                        <?php }?>
                                        <?php if($pageNo < $pageTotal) { ?>
                                            <li class="waves-effect"><a href="info_notice.php?pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
                                        <?php } ?>
                                    </ul>

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