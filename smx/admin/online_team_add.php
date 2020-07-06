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

if(!empty($_POST['name'])) {

    $id = time();
    if ($_FILES["pre_pic"]["size"] < 2000000) {
        if ($_FILES["pre_pic"]["error"] > 0) {
            echo "Return Code: " . $_FILES["pre_pic"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["pre_pic"]["name"], strpos($_FILES["pre_pic"]["name"], '.'));
            $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["pre_pic"]["tmp_name"], $filePath);
        }
    }
    $data = array(
        't_id' => $id,
        't_name' => $_POST['name'],
        't_contestant' => $_POST['contestant'],
        't_teacher' => $_POST['teacher'],
        't_school' => $_POST['school'],
        't_content' => $content,
        't_filename' => $_FILES["pre_pic"]["name"],
        't_filepath' => 'admin/'.$filePath
    );
    $state =  MySqlOperate::getInstance()->insert('T_TEAM', $data);

    if($state != 0) {
        for ($i=0, $len = count($_FILES['file']["size"]); $i<$len; $i++) {

            if ($_FILES["file"]["size"][$i] > 0 && $_FILES["file"]["size"][$i] < 2000000) {
                if ($_FILES["file"]["error"][$i] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br />";
                } else {
                    $fileType = substr($_FILES["file"]["name"][$i], strpos($_FILES["file"]["name"][$i], '.'));
                    $filePath = "upload/" . date('Y_m_d_H_i_s') ."_".$i . $fileType;
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i], $filePath);
                }

                $data = array(
                    't_filename' => $_FILES["file"]["name"][$i],
                    't_filepath' => 'admin/'.$filePath,
                    't_desc' => $_POST["desc"][$i],
                    't_pid' =>$id
                );

                $state =  MySqlOperate::getInstance()->insert('T_DOC', $data);
                if($state != 0) {
                    echo "存储成功";
                    header("Location: online_team.php");
                } else {
                    echo "存储失败";
                }
            } else {
                echo "存储成功";
                header("Location: online_team.php");
            }
        }
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
                        <h3>新增参赛团队</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_team_add.php" method="post" enctype="multipart/form-data">

                            <div class="field-box">
                                团队名称：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="name" />
                            </div>
                            <div class="field-box">
                                参赛选手：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="contestant" />
                            </div>
                            <div class="field-box">
                                指导老师：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="teacher" />
                            </div>
                            <div class="field-box">
                                团队学校：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="school" />
                            </div>

                            <div class="field-box">
                                首页图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="pre_pic" id="per_pic" accept=".png,.gif,.jpg,.jpeg" />
                                <input type="button" name="btnCreateText" value="新增文件" onclick="uploadTeam();" />
                            </div>
                            <hr>

                            <div class="field-box">
                                <span>上传文件：&nbsp;&nbsp;&nbsp;</span>
                                <input type="file" name="file[]" id="file" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
                                <br>
                                <span>团队简介：&nbsp;&nbsp;&nbsp;</span>
                                <input class="span8" type="text" name="desc[]" id="desc" />

                                <hr>
                                <div id="Show"></div>
                            </div>

                            团队简介：&nbsp;&nbsp;&nbsp;
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