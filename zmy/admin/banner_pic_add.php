<?php

include "com/mysqloperate.php";

if(!empty($_POST['title']) && $_POST['link']) {

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
        't_filename' => $_FILES["file"]["name"],
        't_filepath' => 'admin/'.$filePath,
        't_link' => $_POST['link'],
        't_author' => 1
    );
    $state =  MySqlOperate::getInstance()->insert('T_BANNER', $data);

    if($state) {
        echo "存储成功";
        header("Location: banner_pic.php");
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
                        <h3>新增导航图片</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="banner_pic_add.php" method="post" enctype="multipart/form-data">

                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                链接地址：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="link" />
                            </div>
                            <br>

                            <div class="field-box">
                                上传图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="file" id="file" accept=".png,.gif,.jpg,.jpeg"/>
                                （大小比例：1170px*550px）
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