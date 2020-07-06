<?php

include "../com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_filename')
        ->where('t_id='.$_GET['id'])
        ->select('T_ACTIVITY');

    $res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath,t_desc')
        ->where('t_pid='.$_GET['id'])
        ->select('t_doc');
}

if(!empty($_POST['id'])) {

    if($_FILES["pre_pic"]["size"] == 0) {
        $data = array(
            't_title' => $_POST['title'],
        );
    } else {
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
            't_title' => $_POST['title'],
            't_filename' => $_FILES["pre_pic"]["name"],
            't_filepath' => 'admin/'.$filePath,
        );
    }
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_ACTIVITY', $data);

    if($state != 0) {
        for ($i=0, $len = count($_FILES['file']["size"]); $i<$len; $i++) {
            if ($_FILES["file"]["size"][$i] > 0 && $_FILES["file"]["size"][$i] < 2000000) {
                if ($_FILES["file"]["error"][$i] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br />";
                } else {
                    $fileType = substr($_FILES["file"]["name"][$i], strpos($_FILES["file"]["name"][$i], '.'));
                    $filePath = "upload/" . date('Y_m_d_H_i_s')  ."_".$i . $fileType;
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i], $filePath);
                }

                $data = array(
                    't_filename' => $_FILES["file"]["name"][$i],
                    't_filepath' => 'admin/'.$filePath,
                    't_desc' => $_POST["desc"][$i],
                    't_pid' => $_POST['id']
                );

                $state =  MySqlOperate::getInstance()->insert('T_DOC', $data);
                if($state != 0) {
                    echo "存储成功";
                    header("Location: info_activity.php");
                } else {
                    echo "存储失败";
                }
            } else {
                echo "存储成功";
                header("Location: info_activity.php");
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
                        <h3>更改活动掠影</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="info_activity_update.php" method="post" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">
                            <div class="field-box">
                                活动标题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title'];?>" />
                            </div>
                            <br>

                            <div class="field-box">
                                首页图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="pre_pic" id="per_pic" accept=".png,.gif,.jpg,.jpeg" />
                                <?php echo $res[0]['t_filename'];?>
                                <input type="button" name="btnCreateText" value="新增文件" onclick="uploadPic();" />
                            </div>
                            <br>

                            <div class="field-box">
                                <span>已&nbsp;&nbsp;上&nbsp;&nbsp;传：</span>
                                <?php
                                for($i=0; $i<count($res_doc); $i++) {
                                    for ($i=0; $i < count($res_doc) ; $i++) {
                                        echo $res_doc[$i]['t_filename'].",";
                                    }
                                }
                                ?>
                                <br>
                                <br>
                                <span>上传文件：</span>
                                <input type="file" name="file[]" id="file" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
                                <span>活动简介：</span>
                                <input class="span8" type="text" name="desc[]" id="desc" />

                                <hr>
                                <div id="Show"></div>
                            </div>
                            <br>

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