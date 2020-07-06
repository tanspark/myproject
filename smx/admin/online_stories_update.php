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
    $res = MySqlOperate::getInstance()->field('t_id,t_name,t_type,t_team_id,t_content,t_filename,t_filepath,t_video_name,t_video_path')
        ->where('t_id='.$_GET['id'])
        ->select('T_COMPOSITION');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_name' => $_POST['name'],
        't_type' => $_POST['type'],
        't_team_id' => $_POST['team_id'],
        't_content' => $content
    );
    // 赋值显示的图片
    if ($_FILES["pre_pic"]["size"] > 0 &&$_FILES["pre_pic"]["size"] < 2000000) {
        if ($_FILES["pre_pic"]["error"] > 0) {
            echo "Return Code: " . $_FILES["pre_pic"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["pre_pic"]["name"], strpos($_FILES["pre_pic"]["name"], '.'));
            $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["pre_pic"]["tmp_name"], $filePath);
        }
        $data['t_filename'] = $_FILES["pre_pic"]["name"];
        $data['t_filepath'] = 'admin/'.$filePath;
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
        $data['t_video_name'] = $_FILES["video"]["name"];
        $data['t_video_path'] = 'admin/'.$videoPath;
    }
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_COMPOSITION', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: online_stories.php");
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
                        <h3>更改参赛作品</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_stories_update.php" method="post" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                参赛作品：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="name" value="<?php echo $res[0]['t_name']?>" />
                            </div>
                            <br />

                            <div class="field-box">
                                作品类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value="1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>初赛结果</option>
                                    <option value="2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>复赛结果</option>
                                    <option value="3" <?php if($res[0]['t_type'] == 3) {?>selected = "selected" <?php } ?>>决赛结果</option>
                                </select>
                            </div>
                            <br />

                            <div class="field-box">
                                团队名称：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="team_id" value="<?php echo $res[0]['t_team_id']?>"/>
                            </div>
                            <br />

                            <div class="field-box">
                                首页图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="pre_pic" id="per_pic" accept=".png,.gif,.jpg,.jpeg" /> <?php echo $res[0]['t_filename']?>
                            </div>
                            <br />

                            <div class="field-box">
                                <span>上传视频：&nbsp;&nbsp;&nbsp;</span>
                                <input type="file" name="video" id="video" /><?php echo $res[0]['t_video_name']?>
                            </div>

                            参赛作品：&nbsp;&nbsp;&nbsp;
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