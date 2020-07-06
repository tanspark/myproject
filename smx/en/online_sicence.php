<?php
$page_id = 5;
$page_base_name = "Online Hall";
$page_name = "Basic Knowledge";
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
                                        <strong>Online Hall</strong>
                                        <li><a href="online_team.php">Team</a></li>
                                        <li><a href="online_stories.php">Entries</a></li>
                                        <li><a href="online_expert.php">Expert Style</a></li>
                                        <li><a href="online_sicence.php?type=1">Development History</a></li>
                                        <li><a href="online_sicence.php?type=2">Physical and Chemical Properties</a></li>
                                        <li><a href="online_sicence.php?type=3">Application Area</a></li>
                                        <li><a href="online_sicence.php?type=4">Industry Trends</a></li>
                                        <li><a href="online_internet.php">Online Exhibition</a></li>
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
                                                echo "Development History";
                                            } else if($_GET['type'] == 2) {
                                                echo "Physical and Chemical Properties";
                                            } else if($_GET['type'] == 3) {
                                                echo "Application Area";
                                            } else if($_GET['type'] == 4) {
                                                echo "Industry Trends";
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