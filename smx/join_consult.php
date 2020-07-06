<?php
$page_id = 3;
$page_base_name = "参与活动";
$page_name = "咨询答疑";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 10;
$total = MySqlOperate::getInstance()->totals('T_CONSULT');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res1 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_desc,t_content,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->where('t_type=1')
    ->select('T_CONSULT');
$res2 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_desc,t_content,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->where('t_type=2')
    ->select('T_CONSULT');

?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 导航栏 ==================== -->
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
                                        <strong>参与活动</strong>
                                        <li><a href="join_institution.php?type=1">组织机构</a></li>
                                        <li><a href="join_guide.php">活动指南</a></li>
                                        <li><a href="join_award_grade.php?type=1">奖励设置</a></li>
                                        <li><a href="join_consult.php">咨询答疑</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s9 m9 l9">
                    <div class="top-post w100dt mb-30">

                        <ul id="tabs-swipe-demo" class="top-post-tab tabs tabs-fixed-width">
                            <li class="tab">
                                <a href="#test-swipe-1" class="active">
                                    常见问题
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#test-swipe-2">
                                    咨询答疑
                                </a>
                            </li>
                        </ul>

                        <div id="test-swipe-1" class="tab-contant most-view">
                            <div class="sidebar-posts">
                                <div class="card">
                                    <!-- /.card-image -->
                                    <div class="card-content">
                                        <div class="text-content">
                                            <ul class="post-mate-time left mb-30">
                                                <?php if(!empty($res1))
                                                    for ($i=0; $i < count($res1) ; $i++) {
                                                    ?>
                                                    <li><a href="join_consult_detail.php?id=<?php echo $res1[$i]['t_id']; ?>">
                                                            <i class="icofont icofont-ui-calendar"></i>&nbsp;&nbsp;|&nbsp;&nbsp;
                                                            <span class="mb-30"><?php echo $res1[$i]['t_title'];?></span></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>


                                        </div>
                                    </div>
                                    <!-- /.card-content -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.sidebar-posts -->
                        </div>
                        <!-- /.most-view -->

                        <div id="test-swipe-2" class="tab-contant most-view">
                            <div class="sidebar-posts">
                                <div class="card">
                                    <!-- /.card-image -->
                                    <div class="card-content">
                                        <div class="text-content">
                                            <ul class="post-mate-time left mb-30">
                                                <?php
                                                for ($i=0; $i < count($res2) ; $i++) {
                                                    ?>
                                                    <li><a href="join_consult_detail.php?id=<?php echo $res2[$i]['t_id']; ?>">
                                                            <i class="icofont icofont-ui-calendar"></i>&nbsp;&nbsp;|&nbsp;&nbsp;
                                                            <span class="mb-30"><?php echo $res2[$i]['t_title'];?></span></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>

                                        </div>
                                    </div>
                                    <!-- /.card-content -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.sidebar-posts -->
                        </div>
                        <!-- /.most-view -->

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
                    <!-- /.top-post -->

                </div>
                <!-- colm8 -->

            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#blog-section -->
    <!-- ==================== blog-section end ==================== -->
<?php include "_footer.php";?>