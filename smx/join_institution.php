<?php
$page_id = 3;
$page_base_name = "参与活动";
$page_name = "组织机构";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 5;
$res_total = MySqlOperate::getInstance()->field('t_id')
    ->where('t_type='.$_GET['type'])
    ->select('T_INSTITUTION');
$total = count($res_total);
$pageTotal = (int)(($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1));
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_content,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->where('t_type='.$_GET['type'])
    ->select('T_INSTITUTION');

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
                    <div class="fav_list">
                        <div data-v-357a65ed="" class="fav_list_box">
                            <div  class="fav_list_title">
                                <h3 class="fav_list_title_h3">
                                    <?php
                                    if($_GET['type']==1) {
                                        echo "主办单位";
                                    } else if($_GET['type']==2) {
                                        echo "协办单位";
                                    } else if($_GET['type']==3) {
                                        echo "承办单位";
                                    } else if($_GET['type']==4) {
                                        echo "支持单位";
                                    } else if($_GET['type']==5) {
                                        echo "组委会";
                                    } else if($_GET['type']==6) {
                                        echo "合作媒体";
                                    } else if($_GET['type']==7) {
                                        echo "志愿者";
                                    }
                                    ?>
                                </h3>
                            </div>

                            <div class="my_fav_con">
                                <ul  class="my_fav_list">
                                    <?php if(!empty($res)) for ($i=0; $i < count($res) ; $i++) { ?>
                                        <li class="my_fav_list_li" style="width: 100%;">
                                            <p style="float: left; width: 70%;"><a class="my_fav_list_a" href="join_institution_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
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
                            <li class="waves-effect"><a href="join_institution.php?type=<?php echo $_GET['type']; ?>&pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                        <?php } ?>
                        <?php
                        for( $i=0; $i < $pageTotal; $i++) {
                            ?>
                            <li <?php if($pageNo==$i+1){ ?>class="active"<?php } ?> >
                                <a href="join_institution.php?type=<?php echo $_GET['type']; ?>&pageNo=<?php echo $i+1;?>"><?php echo $i+1; ?></a>
                            </li>
                        <?php }?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li class="waves-effect"><a href="join_institution.php?type=<?php echo $_GET['type']; ?>&pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
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
<?php include "_footer.php"; ?>