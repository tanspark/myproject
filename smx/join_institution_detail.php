<?php
$page_id = 3;
$page_base_name = "参与活动";
$page_name = "组织机构";
$page_link = "join_institution.php";
$page_sub_name = "详情";

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
        ->where('t_id='.$_GET['id'])
        ->select('T_INSTITUTION');
}
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 填充空间，向上的空间覆盖 ==================== -->
    <section class="padding-room"> </section>

    <!-- ==================== 导航栏 ==================== -->
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
                                        <strong>组织机构</strong>
                                        <li><a href="join_institution.php?type=1">主办单位</a></li>
                                        <li><a href="join_institution.php?type=2">协办单位</a></li>
                                        <li><a href="join_institution.php?type=3">承办单位</a></li>
                                        <li><a href="join_institution.php?type=4">支持单位</a></li>
                                        <li><a href="join_institution.php?type=5">组委会</a></li>
                                        <li><a href="join_institution.php?type=6">合作媒体</a></li>
                                        <li><a href="join_institution.php?type=7">志愿者</a></li>
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
                                    <li class="p_news_title" style="text-align: center">
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title']?></span>
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