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

if(!empty($_POST['type']) && !empty($_POST['content'])) {

    $id = time();
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
        't_type' => $_POST['type'],
        't_content' => $content,
        't_video_name' => $_FILES["video"]["name"],
        't_video_path' => 'admin/'.$videoPath
    );
    $state =  MySqlOperate::getInstance()->insert('T_SMX_INFO', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: online_smx.php");
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
                        <h3>新增石墨烯基础知识</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_smx_add.php" method="post" enctype="multipart/form-data">

                            <div class="field-box">
                                石墨烯类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value ="1">发展历程</option>
                                    <option value ="2">物理化学性质</option>
                                    <option value="3">应用领域</option>
                                    <option value="4">行业动态</option>
                                </select>
                            </div>
                            <br>

                            <div class="field-box">
                                <span>上传视频：&nbsp;&nbsp;&nbsp;</span>
                                <input type="file" name="video" id="video" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <br>

                            <input id="content" name="content" type="hidden"  >
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