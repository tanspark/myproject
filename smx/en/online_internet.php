<?php
$page_id = 5;
$page_base_name = "Online Hall";
$page_name = "Online Exhibition";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_link,t_intro,t_time')
    ->order('t_time desc')
    ->select('T_INTERLINK');

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
                                        <span class="title-left">各地网上展厅链接</span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <ul class="post-mate-time left">
                                        <?php
                                        if(!empty($res)) {
                                        for($i=0; $i<count($res);$i++) {?>
                                        <li>
                                            <span class="mb-30"><?php echo $i+1; ?></span>
                                            <a href="<?php echo $res[$i]['t_link']; ?>" target="_blank">
                                                <span class="mb-30" style="margin-left: 10px;">
                                                    <?php echo $res[$i]['t_title']; ?> &nbsp;&nbsp;
                                                </span>
                                            </a>
                                        </li>
                                        <?php } } ?>
                                    </ul>

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