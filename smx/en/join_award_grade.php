<?php
$page_id = 3;
$page_base_name = "Join";
$page_name = "Award Settings";
$page_link = "";
$page_sub_name = "Award Level";

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
                                    <strong>Join</strong>
                                    <ul>
                                        <li><a href="join_award_grade.php?type=1">Award Level</a></li>
                                        <li><a href="join_award_form.php?type=1">Form of Awards</a></li>
                                        <li><a href="join_award_insti.php?type=1">Professional Jury</a></li>
                                        <li><a href="join_award_insti.php?type=2">Public Jury</a></li>
                                        <li><a href="join_award_other.php?type=1">Special Award</a></li>
                                        <li><a href="join_award_other.php?type=2">Top 10 Innovation Awards</a></li>
                                        <li><a href="join_award_other.php?type=3">Social youth Responsibility Award</a></li>
                                        <li><a href="join_award_other.php?type=4">Division Awards</a></li>
                                    </ul>
                                </div>

                                <div id="adminMenus" class="mod">
                                    <strong>Creative</strong>
                                    <ul>
                                        <li><a href="join_award_grade.php?type=2">Award Level</a></li>
                                        <li><a href="join_award_form.php?type=2">Form of Awards</a></li>
                                        <li><a href="join_award_insti.php?type=3">Professional Jury</a></li>
                                        <li><a href="join_award_insti.php?type=4">Public Jury</a></li>
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