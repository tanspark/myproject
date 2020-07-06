<?php
$page_id = 3;
$page_base_name = "参与活动";
$page_name = "奖励设置";
$page_link = "";
$page_sub_name = "奖励等级";

include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_content,t_time')
    ->order('t_time desc')
    ->where('t_selected=1 and t_type='.$_GET['type'])
    ->select('T_AWARD_GRADE');

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
                                    <strong>成果活动</strong>
                                    <ul>
                                        <li><a href="join_award_grade.php?type=1">奖励等级</a></li>
                                        <li><a href="join_award_form.php?type=1">奖励形式</a></li>
                                        <li><a href="join_award_insti.php?type=1">专业陪审团</a></li>
                                        <li><a href="join_award_insti.php?type=2">大众陪审团</a></li>
                                        <li><a href="join_award_other.php?type=1">专项奖励</a></li>
                                        <li><a href="join_award_other.php?type=2">十佳创新奖励</a></li>
                                        <li><a href="join_award_other.php?type=3">社会青年责任奖励</a></li>
                                        <li><a href="join_award_other.php?type=4">分赛区奖励</a></li>
                                    </ul>
                                </div>

                                <div id="adminMenus" class="mod">
                                    <strong>创意活动</strong>
                                    <ul>
                                        <li><a href="join_award_grade.php?type=2">奖励等级</a></li>
                                        <li><a href="join_award_form.php?type=2">奖励形式</a></li>
                                        <li><a href="join_award_insti.php?type=3">专业陪审团</a></li>
                                        <li><a href="join_award_insti.php?type=4">大众陪审团</a></li>
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
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title'] ?></span>
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