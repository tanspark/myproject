<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 4;
$page_base_name = "News";
$page_name = "Honor";
$page_link = "";
$page_sub_name = "";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_file_name,t_file_path,t_year,t_time')
    ->order('t_year desc')
    ->select('T_NEWS_HONOUR');
?>

<?php include "_head.php"; ?>

<body>

<!--top menu-->
<?php include "_top.php"?>

<!--菜单栏-->
<?php include "_header.php"; ?>

<!--页面导航栏-->
<?php include "_nav.php"; ?>

<section id="container">
    <div class="container">

        <!--荣誉-->
        <div class="row">
            <div class="span12">
                <div id="our-projects" class="carousel bttop">
                    <div class="carousel-wrapper">
                        <ul class="portfolio">
                            <?php for($i=0; $i<count($res); $i++) { ?>
                            <li>
                                <article class="span2" style="width: 200px; height: 150px; border: solid 1px #00a2d4;">
                                    <div class="inner-image">
                                        <a href="news_honour_detail.php?id=<?php echo $res[$i]['t_id'] ?>">
                                            <img src="<?php echo $res[$i]['t_file_path'] ?>" alt="<?php echo $res[$i]['t_file_name'] ?>"
                                                 style="width: 200px; height: 150px;"/>
                                            <span class="frame-overlay"></span>
                                        </a>
                                    </div>
                                    <div class="sliding">
                                        <div class="inner-text" style="text-align: center;">
                                            <a href="#"><?php echo $res[$i]['t_title'] ?></a>
                                            <br>
                                            <?php echo $res[$i]['t_year'] ?>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#our-projects').elastislide({
                            imageW : 270,
                            border : 0,
                            minItems : 1,
                            margin : 30
                        });
                    });
                </script>
            </div>
        </div>

    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>
