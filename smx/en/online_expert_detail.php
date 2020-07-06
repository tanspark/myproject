<?php
$page_id = 5;
$page_base_name = "Online Hall";
$page_name = "Expert Style";
$page_link = "online_expert.php";
$page_sub_name = "Detail";

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_name,t_desc,t_content,t_filename,t_filepath,t_video_name,t_video_path')
        ->where('t_id='.$_GET['id'])
        ->select('T_EXPERT');
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

                    <div class="blogs mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content w100dt">
                                <ul>
                                    <li class="p_news_title">
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_name']; ?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_desc'];?></span>
                                    <br>
                                    <br>
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