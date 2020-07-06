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
$res_segment = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_SEGMENT');

$res_distict = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_DISTRICT');

$res_theme = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_M_THEME');

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_segment,t_district,t_theme,t_content,t_filename,t_filepath')
        ->where('t_id='.$_GET['id'])
        ->select('T_WONDER');

    $res_doc = MySqlOperate::getInstance()->field('t_filename,t_filepath')
        ->where('t_pid='.$_GET['id'])
        ->select('t_doc');
}

if(!empty($_POST['id'])) {
    // 赋值显示的图片
    if ($_FILES["pre_pic"]["size"] > 0 && $_FILES["pre_pic"]["size"] < 2000000) {
        if ($_FILES["pre_pic"]["error"] > 0) {
            echo "Return Code: " . $_FILES["pre_pic"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["pre_pic"]["name"], strpos($_FILES["pre_pic"]["name"], '.'));
            $filePath = "../upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["pre_pic"]["tmp_name"], $filePath);
        }
    }
    $data = array(
        't_title' => $_POST['title'],
        't_segment' => $_POST['segment'],
        't_district' => $_POST['district'],
        't_theme' => $_POST['theme'],
        't_filename' => $_FILES["pre_pic"]["name"],
        't_filepath' => 'admin/'.$filePath,
        't_content' => $content
    );
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_WONDER', $data);

    if($state != 0) {
        for ($i=0, $len = count($_FILES['file']["size"]); $i<$len; $i++) {

            if ($_FILES["file"]["size"][$i] > 0 && $_FILES["file"]["size"][$i] < 2000000) {
                if ($_FILES["file"]["error"][$i] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br />";
                } else {
                    $fileType = substr($_FILES["file"]["name"][$i], strpos($_FILES["file"]["name"][$i], '.'));
                    $filePath = "../upload/" . date('Y_m_d_H_i_s')  ."_".$i . $fileType;
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i], $filePath);
                }

                $data = array(
                    't_filename' => $_FILES["file"]["name"][$i],
                    't_filepath' => 'admin/'.$filePath,
                    't_pid' => $_POST['id']
                );

                $state =  MySqlOperate::getInstance()->insert('T_DOC', $data);
                if($state != 0) {
                    echo "存储成功";
                    header("Location: wonder_retro.php");
                } else {
                    echo "存储失败";
                }
            } else {
                echo "存储成功";
                header("Location: wonder_retro.php");
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
                    <h3>更改精彩回顾</h3>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span12">

                    <form action="wonder_retro_update.php" method="post" enctype="multipart/form-data">
                        <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">
                        <div class="field-box">
                            大赛名称：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']?>" />
                        </div>
                        <br />

                        <div class="field-box">
                            大赛时段：&nbsp;&nbsp;&nbsp;
                            <select name="segment" style="height: 30px;">
                                <?php for($i=0; $i<count($res_segment); $i++) { ?>
                                    <option value="<?php echo $res_segment[$i]['t_id'] ?>">
                                        <?php echo $res_segment[$i]['t_title'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <br />

                        <div class="field-box">
                            大赛区域：&nbsp;&nbsp;&nbsp;
                            <select name="district" style="height: 30px;">
                                <?php for($i=0; $i<count($res_distict); $i++) { ?>
                                    <option value="<?php echo $res_distict[$i]['t_id'] ?>"><?php echo $res_distict[$i]['t_title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br />

                        <div class="field-box">
                            大赛主题：&nbsp;&nbsp;&nbsp;
                            <select name="theme" style="height: 30px;">
                                <?php for($i=0; $i<count($res_theme); $i++) { ?>
                                    <option value="<?php echo $res_theme[$i]['t_id'] ?>"><?php echo $res_theme[$i]['t_title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br />

                        <div class="field-box">
                            首页图片：&nbsp;&nbsp;&nbsp;
                            <input type="file" name="pre_pic" id="per_pic" accept=".png,.gif,.jpg,.jpeg" />    <?php echo $res[0]['t_filename']?>
                        </div>
                        <br />
                        <br />
                        <div class="field-box">
                            <span>已&nbsp;&nbsp;上&nbsp;&nbsp;传：</span>
                            <?php
                            for($i=0; $i<count($res_doc); $i++) {
                                for ($i=0; $i < count($res_doc) ; $i++) {
                                    echo $res_doc[$i]['t_filename'].",";
                                }
                            }
                            ?>
                            <input type="button" name="btnCreateText" value="新增文件" onclick="Dom();" />
                            <br>

                            <br>
                            <br />
                            <span>上传附件：</span>
                            <input type="file" name="file[]" id="file" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <hr>
                            <div id="Show"></div>
                        </div>
                        <br>
                        精彩回顾&nbsp;&nbsp;&nbsp;
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