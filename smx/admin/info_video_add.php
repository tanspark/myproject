<?php

include "../com/mysqloperate.php";

$content = '';
if (!empty($_POST['content'])) {
    if (get_magic_quotes_gpc()) {
        $content = stripslashes($_POST['content']);
    } else {
        $content = $_POST['content'];
    }
}

if(!empty($_POST['title']) && $_POST['content']) {

    $id = time();
    // 赋值显示的图片
    if ($_FILES["pre_pic"]["size"] > 0 && $_FILES["pre_pic"]["size"] < 2000000) {
        if ($_FILES["pre_pic"]["error"] > 0) {
            echo "Return Code: " . $_FILES["pre_pic"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["pre_pic"]["name"], strpos($_FILES["pre_pic"]["name"], '.'));
            $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["pre_pic"]["tmp_name"], $filePath);
        }
    }
    // 复制视频文件
    if ($_FILES["video"]["size"] > 0 && $_FILES["video"]["size"] < 2000000) {
        if ($_FILES["video"]["error"] > 0) {
            echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
        } else {
            $videoType = substr($_FILES["video"]["name"], strpos($_FILES["video"]["name"], '.'));
            $videoPath = "upload/" . date('Y_m_d_H_i_s') . $videoType;
            move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath);
        }
    }
    $data = array(
        't_id' => $id,
        't_title' => $_POST['title'],
        't_filename' => $_FILES["pre_pic"]["name"],
        't_filepath' => 'admin/'.$filePath,
        't_content' => $content,
        't_video_name' => $_FILES["video"]["name"],
        't_video_path' => 'admin/'.$videoPath,
        't_author' => 1
    );
    $state =  MySqlOperate::getInstance()->insert('T_VIDEO', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: info_video.php");
    } else {
        echo "存储失败";
    }
}

?>

<?php include "_head.php";?>

<body>

    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div class="container-fluid">
            <div id="pad-wrapper">
                 <div class="row-fluid head">
                    <div class="span12">
                        <h3>新增视频播报</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="info_video_add.php" method="post" enctype="multipart/form-data">

                            <div class="field-box">
                                视频标题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                首页图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="pre_pic" id="per_pic" accept=".png,.gif,.jpg,.jpeg" />
                            </div>
                            <br>

                            视频简介&nbsp;&nbsp;&nbsp;
                            <input id="content" name="content" type="text"  >
                            <script id="editor" type="text/plain" style="width:1024px; height:500px;"></script>

                            <br />
                            <input type="button" value="填充数据" class="btn-glow primary " onclick="onWriteForm();" />

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="button" class="btn-glow primary " value="提交内容" />

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

</body>
</html>