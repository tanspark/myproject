<?php
$page_id = 1;
$page_base_name = "Home";
$page_name = "";
$page_link = "";
$page_sub_name = "";

include "com/mysqloperate.php";

$res_banner = MySqlOperate::getInstance()->field('t_id,t_title,t_filepath,t_link')
    ->order('t_time desc, t_id asc')
    ->limit(1, 5)
    ->select('T_BANNER');

?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

<!-- ==================== blog-slider-section start ==================== -->
<div id="blog-slider-section" class="blog-slider-section w100dt mb-10" >
    <div class="container">
        <div class="slider">
            <ul class="slides">
                <?php for ($i=0; $i < count($res_banner) ; $i++) { ?>
                <li class="slider-item">
                    <img src="<?php echo $res_banner[$i]['t_filepath']; ?>" alt="<?php echo $res_banner[$i]['t_title'];?>"
                         onclick="window.open('<?php echo $res_banner[$i]['t_link'];?>')">
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- container -->
</div>
<!-- /#blog-slider-section -->
<!-- ==================== blog-slider-section end ==================== -->

    <div id="blog-section" class="blog-section w100dt mb-10">
        <div class="container">
            <div class="row">
                <?php include "_right.php";?>
            </div>
        </div>
    </div>

<?php include "_footer.php";?>