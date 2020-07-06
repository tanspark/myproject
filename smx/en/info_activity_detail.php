<?php
$page_id = 4;
$page_base_name = "News";
$page_name = "Activity Snapshot";
$page_link = "info_activity.php";
$page_sub_name = "Detail";


include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title')
        ->where('t_id='.$_GET['id'])
        ->select('T_ACTIVITY');

    $res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath,t_desc')
        ->where('t_pid='.$_GET['id'])
        ->select('t_doc');
}
?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 填充空间，向上的空间覆盖 ==================== -->
    <section class="padding-room"> </section>

    <!-- ==================== 导航栏 ==================== -->
<?php include "_nav.php";?>

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
                                        <strong>News</strong>
                                        <li><a href="info_notice.php">Notice</a></li>
                                        <li><a href="info_trends.php">Trend</a></li>
                                        <li><a href="info_publicity.php">List Publicity</a></li>
                                        <li><a href="info_activity.php">Activity Snapshot</a></li>
                                        <li><a href="info_video.php">Video Broadcast</a></li>
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
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title']; ?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <div class="outer">
                                        <img src="<?php if(!empty($res_doc)) echo $res_doc[0]['t_filepath']; ?>"  id="img1" style="max-width: 80%; max-height: 80%;" />
                                        <div id="txt-cont" style="color: #0D47A1; font-weight: 700; font-size: 20px;"><?php if(!empty($res_doc)) echo $res_doc[0]['t_desc']; ?></div>
                                    </div>
                                    <br>
                                    <div style="text-align: center;">
                                        <button id="pre">up</button>
                                        <span id="pd"></span>
                                        <button id="next">down</button>
                                    </div>

                                    <style type="text/css">
                                        .outer{
                                            width: 100%;
                                            height: 400px;
                                            text-align: center;
                                            vertical-align: center;
                                        }
                                    </style>
                                    <script type="text/javascript">
                                        window.onload=function(){
                                            var btn1=document.getElementById("pre");
                                            var btn2=document.getElementById("next");
                                            var img=document.getElementById("img1");
                                            var cont = document.getElementById("txt-cont");
                                            var imgarr = [];
                                            var contarr = [];
                                            <?php if(!empty($res_doc)) for ($i=0; $i<count($res_doc); $i++) { ?>
                                            imgarr.push("<?php echo $res_doc[$i]['t_filepath']; ?>");
                                            contarr.push("<?php echo $res_doc[$i]['t_desc']; ?>");
                                            <?php } ?>
                                            var index=0;
                                            var info=document.getElementById("pd");
                                            info.innerHTML="&nbsp;&nbsp;"+(index+1)+"&nbsp;/&nbsp;"+imgarr.length+"&nbsp;&nbsp;";
                                            btn1.onclick=function(){
                                                index--;
                                                if(index<0){
                                                    index=imgarr.length-1;
                                                }
                                                img.src=imgarr[index];
                                                cont.innerHTML=contarr[index];
                                                info.innerHTML="&nbsp;&nbsp;"+(index+1)+"&nbsp;/&nbsp;"+imgarr.length+"&nbsp;&nbsp;";
                                            };
                                            btn2.onclick=function(){
                                                index++;
                                                if(index>imgarr.length-1){
                                                    index=0;
                                                }
                                                img.src=imgarr[index];
                                                cont.innerHTML=contarr[index];
                                                info.innerHTML="&nbsp;&nbsp;"+(index+1)+"&nbsp;/&nbsp;"+imgarr.length+"&nbsp;&nbsp;";
                                            };
                                        };
                                    </script>
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