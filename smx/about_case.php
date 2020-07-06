<?php
$page_id = 8;
$page_base_name = "关于我们";
$page_name = "成功案例";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 5;
$total = MySqlOperate::getInstance()->totals('T_ABOUT_CASE');
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content,t_time')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_ABOUT_CASE');
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 填充空间，向上的空间覆盖 ==================== -->
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
                                        <strong>关于我们</strong>
                                        <li><a href="about_who.php">我们是谁</a></li>
                                        <li><a href="about_case.php">成功案例</a></li>
                                        <li><a href="about_contact.php">联系我们</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 m9 l9">
                    <div class="fav_list">
                        <div data-v-357a65ed="" class="fav_list_box">
                            <div class="p_news_title">
                                <span class="title-left">成功案例</span>
                            </div>

                            <div class="my_fav_con">
                                <ul  class="my_fav_list">
                                    <?php if(!empty($res)) for ($i=0; $i < count($res) ; $i++) { ?>
                                        <li class="my_fav_list_li" style="width: 100%;">
                                            <p style="float: left; width: 70%;"><a class="my_fav_list_a" href="about_case_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
                                                    <?php echo $res[$i]['t_title'];?>
                                                </a></p>
                                            <label class="my_fav_list_label" style="float: right;">
                                                <span ><?php echo $res[$i]['t_time'];?></span>
                                            </label>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <ul class="pagination w100dt">
                        <?php if($pageNo > 1) { ?>
                            <li class="waves-effect"><a href="about_case_detail.php?pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                        <?php } ?>
                        <?php
                        for( $i=0; $i < $pageTotal; $i++) {
                            ?>
                            <li <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> >
                                <a href="about_case_detail.php?pageNo=<?php echo $i+1;?>"><?php echo $i+1; ?></a>
                            </li>
                        <?php }?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li class="waves-effect"><a href="about_case_detail.php?pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
                        <?php } ?>
                    </ul>

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