<?php
$page_id = 5;
$page_base_name = "线上展厅";
$page_name = "石墨烯基础知识";
$page_link = "";
$page_sub_name = "";


include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_content,t_video_name,t_video_path,t_time')
    ->order('t_time desc')
    ->where('t_type='.$_GET['type'])
    ->select('T_SMX_INFO');

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
                                        <li><a href="online_sicence.php?type=1">发展历程</a></li>
                                        <li><a href="online_sicence.php?type=2">物理化学性质</a></li>
                                        <li><a href="online_sicence.php?type=3">应用领域</a></li>
                                        <li><a href="online_sicence.php?type=4">行业动态</a></li>
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
                                        <span class="title-left">
                                            <?php
                                            if($_GET['type'] == 1) {
                                                echo "发展历程";
                                            } else if($_GET['type'] == 2) {
                                                echo "物理化学性质";
                                            } else if($_GET['type'] == 3) {
                                                echo "应用领域";
                                            } else if($_GET['type'] == 4) {
                                                echo "行业动态";
                                            }
                                            ?>
                                        </span>
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