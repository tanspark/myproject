<?php
$page_id = 5;
$page_base_name = "线上展厅";
$page_name = "参赛团队";
$page_link = "online_team.php";
$page_sub_name = "活动详情";

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_name,t_contestant,t_teacher,t_school,t_content,t_filename')
        ->where('t_id='.$_GET['id'])
        ->select('T_TEAM');
}
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
                                        <li><a href="online_team.php">参赛团队</a></li>
                                        <li><a href="online_stories.php">参赛作品</a></li>
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
                    <div class="blogs mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content">
                                <ul>
                                    <li class="p_news_title">
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_name']; ?></span>
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