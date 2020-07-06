<?php
$page_id = 5;
$page_base_name = "Online Hall";
$page_name = "Team";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 10;
$total = MySqlOperate::getInstance()->totals('T_TEAM');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_name,t_filename,t_filepath,t_time')
    ->order('t_time desc, t_id asc')
    ->limit($pageNo, $pageSize)
    ->select('T_TEAM');
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
                                        <strong>Online Hall</strong>
                                        <li><a href="online_team.php">Team</a></li>
                                        <li><a href="online_stories.php">Entries</a></li>
                                        <li><a href="online_expert.php">Expert Style</a></li>
                                        <li><a href="online_sicence.php?type=1">Basic Knowledge</a></li>
                                        <li><a href="online_internet.php">Online Exhibition</a></li>
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
                                <?php for ($i=0; $i < count($res) ; $i++) { ?>
                                    <li class="mb-10">
                                        <div class="video-image">
                                            <a href="online_team_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                <img src="<?php echo $res[$i]['t_filepath'];?>"
                                                     alt="<?php echo $res[$i]['t_filename'];?>"
                                                     style="max-width: 300px; max-height: 160px;">
                                            </a>
                                        </div>
                                        <div class="news-handle tr center">
                                            <div class="name center" style="background-color: rgba(0,255,0,0.1);">
                                                <p><a href="online_team_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                        <?php echo $res[$i]['t_name'];?></a></p>
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
                            <li class="waves-effect"><a href="online_team.php?pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                        <?php } ?>
                        <?php
                        for( $i=0; $i < $pageTotal; $i++) {
                            ?>
                            <li <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> >
                                <a href="online_team.php?pageNo=<?php echo $i+1;?>"><?php echo $i+1; ?></a>
                            </li>
                        <?php }?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li class="waves-effect"><a href="online_team.php?pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
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