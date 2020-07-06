<?php
$page_id = 6;
$page_base_name = "重点活动";
$page_name = "科普进校园活动";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

if(!empty($_GET['type'])) {
    $whereStr = 't_type='.$_GET['type'].' and t_selected=1';
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_selected,t_content,t_time')
        ->order('t_time desc')
        ->where($whereStr)
        ->select('T_KEY_ACTIVITY');

    if(!empty($res) && count($res) > 0) {
        $res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath')
            ->where('t_pid='.$res[0]['t_id'])
            ->select('t_doc');
    }
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
                                        <strong>重点活动</strong>
                                        <?php if(!empty($res_key_type)) for($i=0; $i<count($res_key_type); $i++) { ?>
                                            <li><a href="key_activity.php?type=<?php echo $res_key_type[$i]['t_id'] ?>">
                                                    <?php echo $res_key_type[$i]['t_title'] ?>
                                                </a></li>
                                        <?php } ?>
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
                                            <?php if(!empty($res) && count($res)>0) echo $res[0]['t_title']; ?>
                                        </span>
                                    </li>
                                </ul>
                                <div class="text-content">
                                    <?php if(!empty($res) && count($res)>0) echo $res[0]['t_content']; ?>
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

<?php include "_footer.php"; ?>