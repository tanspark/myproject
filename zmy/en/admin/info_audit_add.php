<?php

include "com/mysqloperate.php";

if(!empty($_POST['title'])) {

    if ($_FILES["pic"]["size"] < 2000000) {
        if ($_FILES["pic"]["error"] > 0) {
            echo "Return Code: " . $_FILES["pic"]["error"] . "<br />";
        } else {
            $picType = substr($_FILES["pic"]["name"], strpos($_FILES["pic"]["name"], '.'));
            $picPath = "upload/" . date('Y_m_d_H_i_s') . $picType;
            move_uploaded_file($_FILES["pic"]["tmp_name"], $picPath);
        }
    }

    if ($_FILES["file"]["size"] < 2000000) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["file"]["name"], strpos($_FILES["file"]["name"], '.'));
            $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
        }
    }

    $data = array(
        't_title' => $_POST['title'],
        't_pic_name' => $_FILES['pic']['name'],
        't_pic_path' => 'admin/'.$picPath,
        't_file_name' => $_FILES['file']['name'],
        't_file_path' => 'admin/'.$filePath
    );
    $state =  MySqlOperate::getInstance()->insert('T_INFO_AUDIT', $data);

    if($state) {
        echo "存储成功";
        header("Location: info_audit.php");
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
                        <h3>新增审计报告</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="info_audit_add.php" method="post" enctype="multipart/form-data">

                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                上传图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="pic" id="pic" accept=".png,.gif,.jpg,.jpeg"/>
                            </div>

                            <br>
                            <div class="field-box">
                                上传文件：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="file" id="file" accept=".*"/>
                            </div>

                            <br />
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