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

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_type,t_content,t_video_name,t_video_path')
        ->where('t_id='.$_GET['id'])
        ->select('T_SMX_INFO');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_type' => $_POST['type'],
        't_content' => $content
    );

    // 复制视频文件
    if ($_FILES["video"]["size"] > 0 && $_FILES["video"]["size"] < 2000000) {
        if ($_FILES["video"]["error"] > 0) {
            echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
        } else {
            $videoType = substr($_FILES["video"]["name"], strpos($_FILES["video"]["name"], '.'));
            $videoPath = "upload/" . date('Y_m_d_H_i_s') . $videoType;
            move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath);
        }
        $data['t_video_name'] = $_FILES["video"]["name"];
        $data['t_video_path'] = 'admin/'.$videoPath;
    }
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_SMX_INFO', $data);

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
                        <h3>更改石墨烯知识</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_smx_update.php" method="post" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                知识类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value = "1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>发展历程</option>
                                    <option value = "2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>物理化学性质</option>
                                    <option value = "3" <?php if($res[0]['t_type'] == 3) {?>selected = "selected" <?php } ?>>应用领域</option>
                                    <option value = "4" <?php if($res[0]['t_type'] == 4) {?>selected = "selected" <?php } ?>>行业动态</option>
                                </select>
                            </div>
                            <br>

                            <div class="field-box">
                                <span>上传视频：</span>
                                <input type="file" name="video" id="video" /><?php echo $res[0]['t_video_name']?>
                            </div>
                            <br>

                            知识简介：&nbsp;&nbsp;&nbsp;
                            <input type="button" value="读取数据" class="btn-glow primary " onclick="readContent();" />
                            <br><br>
                            <input id="content" name="content" type="hidden" value="<?php echo htmlspecialchars($res[0]['t_content']); ?>" >
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