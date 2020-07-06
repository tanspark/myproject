<?php
$page_id = 7;
$page_base_name = "Wonderful";
$page_name = "Review of previous Competition";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$pageSize = 10;
$whereStr = 'YEAR(t_time) < '.date('Y');
$resTotal = MySqlOperate::getInstance()->field('t_id')
    ->where($whereStr)
    ->select('T_WONDER');
$total = count($resTotal);
$pageTotal = ($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1);

$whereStr = 'YEAR(t_time) < '.date('Y');
if(!empty($_GET['segment'])) {
    $whereStr = $whereStr.' and t_segment='.$_GET['segment'];
}
if(!empty($_GET['district'])) {
    $whereStr = $whereStr.' and t_district='.$_GET['district'];
}
if(!empty($_GET['theme'])) {
    $whereStr = $whereStr.' and t_theme='.$_GET['theme'];
}

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_segment,t_district,t_theme,t_filename,t_filepath,t_time')
    ->order('t_time desc')
    ->where($whereStr)
    ->limit($pageNo, $pageSize)
    ->select('T_WONDER');

$res_segment = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_SEGMENT');

$res_distict = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_DISTRICT');

$res_theme = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_THEME');

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

                <div class="col s12 m4 l12">

                    <div class="featured-posts w100dt mb-30">

                        <div class="sidebar-posts">
                            <div class="option-item">
                                <span class="tt">time：</span>
                                <ul class="option-list " id="time">
                                    <?php
                                    if(!empty($res_segment))
                                        for($i=0; $i<count($res_segment); $i++) { ?>
                                        <li id="repYear_liYear_0" title="tatal"
                                            <?php if(!empty($_GET['segment']) && $_GET['segment'] == $res_segment[$i]['t_id']) { ?> class="cur" <?php } ?>>
                                            <a id="repYear_lbtnYear_0" href="wonder_history.php?segment=<?php echo $res_segment[$i]['t_id'];
                                            if(!empty($_GET['district'])) {
                                                echo '&district='.$_GET['district'];
                                            }
                                            if(!empty($_GET['theme'])) {
                                                echo '&theme='.$_GET['theme'];
                                            }
                                            ?>">
                                                <?php echo $res_segment[$i]['t_title'] ?></a>
                                        </li>
                                    <?php } ?>

                                    <input type="hidden" name="hidYear" id="hidYear" value="total">
                                </ul>
                            </div>
                            <div class="option-item">
                                <span class="tt">area：</span>
                                <ul class="option-list " id="region">
                                    <?php
                                    if(!empty($res_distict))
                                        for($i=0; $i<count($res_distict); $i++) { ?>
                                        <li id="repYear_liYear_0" title="total"
                                            <?php if(!empty($_GET['district']) && $_GET['district'] == $res_distict[$i]['t_id']) { ?> class="cur" <?php } ?>>
                                            <a id="repYear_lbtnYear_0" href="wonder_history.php?district=<?php echo $res_distict[$i]['t_id'];
                                            if(!empty($_GET['segment'])) {
                                                echo '&segment='.$_GET['segment'];
                                            }
                                            if(!empty($_GET['theme'])) {
                                                echo '&theme='.$_GET['theme'];
                                            }
                                            ?>">
                                                <?php echo $res_distict[$i]['t_title'] ?></a>
                                        </li>
                                    <?php } ?>

                                    <input type="hidden" name="hidProvince" id="hidProvince" value="0">
                                </ul>
                                <span class="icons-plus"></span>
                            </div>
                            <div class="option-item">
                                <span class="tt">theme：</span>
                                <ul class="option-list " id="time">
                                    <?php
                                    if(!empty($res_theme))
                                        for($i=0; $i<count($res_theme); $i++) { ?>
                                        <li id="repYear_liYear_0" title="total"
                                            <?php if(!empty($_GET['theme']) && $_GET['theme'] == $res_theme[$i]['t_id']) { ?> class="cur"<?php } ?>>
                                            <a id="repYear_lbtnYear_0" href="wonder_history.php?theme=<?php echo $res_theme[$i]['t_id'];
                                            if(!empty($_GET['segment'])) {
                                                echo '&segment='.$_GET['segment'];
                                            }
                                            if(!empty($_GET['district'])) {
                                                echo '&district='.$_GET['district'];
                                            }
                                            ?>">
                                                <?php echo $res_theme[$i]['t_title'] ?></a>
                                        </li>
                                    <?php } ?>

                                    <input type="hidden" name="hidYear" id="hidYear" value="total">
                                </ul>
                            </div>
                            <div class="option-item">
                                <span class="tt">sort：</span>
                                <ul class="option-list order-list  ">
                                    <li class="cur" id="time">
                                        <a id="lbtnTime" href="#"><i class="icons-time icons-01"></i> Hits</a></li>
                                    <li id="play">
                                        <a id="lbtnPlay" href="#"><i class="icons-time icons-02"></i> recommend</a></li>
                                    <input type="hidden" name="hidOrder" id="hidOrder" value="GalleryDate">
                                </ul>
                            </div>
                            <div class="option-item no-border">

                                <ul class="video-list mt10">
                                    <?php
                                    if(!empty($res))
                                        for($i=0; $i<count($res); $i++) {?>
                                        <li class="mb-10">
                                            <div class="video-image">
                                                <a href="wonder_history_detail.php?id=<?php echo $res[$i]['t_id']; ?>">
                                                    <img src="<?php echo $res[$i]['t_filepath'];?>"
                                                         alt="<?php echo $res[$i]['t_title'];?>" style="max-width: 300px; max-height: 160px;">

                                                </a>
                                            </div>
                                            <div class="news-handle tr center">
                                                <div class="name center" style="background-color: rgba(0,255,0,0.1);">
                                                    <p><a href="wonder_history_detail.php?id=<?php echo $res[$i]['t_id'];?>">
                                                            <?php echo $res[$i]['t_title'];?></a></p>
                                                    <p><?php echo $res[$i]['t_time'];?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>

                            </div>
                        </div>
                        <!-- /.sidebar-posts -->

                    </div>
                    <!-- /.featured-posts -->
                    <ul class="pagination w100dt">
                        <?php if($pageNo > 1) { ?>
                            <li class="waves-effect"><a href="wonder_history.php?pageNo=<?php echo $pageNo-1;?>"><i class="icofont icofont-simple-left"></i></a></li>
                        <?php } ?>
                        <?php for( $i=0; $i < $pageTotal; $i++) { ?>
                            <?php if($pageNo < $pageTotal) { ?>
                                <li class="waves-effect">
                                    <a href="wonder_history.php?pageNo=<?php echo $i;
                                    if(!empty($_GET['segment'])) {
                                        echo '&segment='.$_GET['segment'];
                                    }
                                    if(!empty($_GET['district'])) {
                                        echo '&district='.$_GET['district'];
                                    }
                                    if(!empty($_GET['theme'])) {
                                        echo '&theme='.$_GET['theme'];
                                    }
                                    ?>"><?php echo $i+1; ?></a>
                                </li>
                            <?php } ?>
                        <?php }?>
                        <?php if($pageNo < $pageTotal) { ?>
                            <li class="waves-effect"><a href="wonder_history.php?pageNo=<?php echo $pageNo+1;?>"><i class="icofont icofont-simple-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- colm4 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#blog-section -->
    <!-- ==================== blog-section end ==================== -->

<?php include "_footer.php";?>