<?php

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_file_name,t_file_path,t_link')
        ->where('t_id='.$_GET['id'])
        ->select('T_WATCH');
}

if(!empty($_POST['id'])) {

    if($_FILES["file"]["size"] > 0) {
        if ($_FILES["file"]["size"] < 2000000) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                $fileType = substr($_FILES["file"]["name"], strpos($_FILES["file"]["name"], '.'));
                $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
//                move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
                unlink("watch-img/code-wx.png");

                if($_POST['type'] == 1) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "watch-img/code-wx.png");
                } else if($_POST['type'] == 2) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "watch-img/code-bili.png");
                } else if($_POST['type'] == 3) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "watch-img/code-wb.png");
                } else if($_POST['type'] == 4) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "watch-img/code-dy.png");
                }

                $data = array(
                    't_title' => $_POST['title'],
                    't_file_name' => $_FILES["file"]["name"],
                    't_file_path' =>'admin/'. $filePath,
                    't_type' => $_POST['type'],
                    't_link' => $_POST['link']
                );
            }
        }
    } else {
        $data = array(
            't_title' => $_POST['title'],
            't_link' => $_POST['link']
        );
    }

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_WATCH', $data);

    header("Location: watch_us.php");
    if($state) {
        echo "更新成功";
    } else {
        echo "更新失败";
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
                        <h3>更改关注我们</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="watch_us_update.php" method="post" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">
                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title'];?>" />
                            </div>
                            <br />

                            <div class="field-box">
                                图片类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value="1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>微信公众号</option>
                                    <option value="2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>bilili</option>
                                    <option value="3" <?php if($res[0]['t_type'] == 3) {?>selected = "selected" <?php } ?>>微博</option>
                                    <option value="4" <?php if($res[0]['t_type'] == 4) {?>selected = "selected" <?php } ?>>抖音</option>
                                </select>
                            </div>
                            <br />

                            <div class="field-box">
                                上传图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="file" id="file" accept=".png,.gif,.jpg,.jpeg" />
                                文件名：<?php echo $res[0]['t_file_name'];?>-路径：<?php echo $res[0]['t_file_path'];?>
                            </div>
                            <br />

<!--                            <div class="field-box">-->
<!--                                链接地址：&nbsp;&nbsp;&nbsp;-->
<!--                                <input class="span8" type="text" name="link" value="--><?php //echo $res[0]['t_link'];?><!--" />-->
<!--                            </div>-->
<!--                            <br />-->

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