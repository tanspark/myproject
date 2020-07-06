<?php
$page_id = 5;
$page_base_name = "线上展厅";
$page_name = "专家风采";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 9;
$total = MySqlOperate::getInstance()->totals('T_EXPERT');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_name,t_desc,t_filename,t_filepath,t_author,t_time')
    ->order('t_time desc, t_id asc')
    ->limit($pageNo, $pageSize)
    ->select('T_EXPERT');
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
                                        <strong>线上展厅</strong>
                                        <li><a href="online_team.php">参与团队 </a></li>
                                        <li><a href="online_stories.php">活动作品</a></li>
                                        <li><a href="online_expert.php">专家风采</a></li>
                                        <li><a href="online_sicence.php?type=1">石墨烯基础知识</a></li>
                                        <li><a href="online_internet.php">网上展厅</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 m9 l9">
                    <div class="featured-posts w100dt ">
                        <div class="sidebar-posts">
                            <div class="option-item no-border">
                                <ul class="video-list mt10">
                                    <?php
                                    if(!empty($res)) {
                                    for ($i=0; $i < count($res) ; $i++) {
                                        ?>
                                        <li class="mb-10">
                                            <div class="video-image">
                                                <a href="online_expert_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                    <img src="<?php echo $res[$i]['t_filepath'];?>"
                                                         alt="<?php echo $res[$i]['t_filename'];?>"
                                                         style="width: 150px; height: 200px;">
                                                </a>
                                            </div>
                                            <div class="news-handle tr center">
                                                <div class="name center" style="background-color: rgba(255,255,255,0.1);">
                                                    <p><a href="online_expert_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                            <?php echo $res[$i]['t_name'];?></a></p>
<!--                                                    <p>--><?php //echo $res[$i]['t_time'];?><!--</p>-->
                                                </div>
                                            </div>
                                        </li>

                                    <?php } } ?>
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