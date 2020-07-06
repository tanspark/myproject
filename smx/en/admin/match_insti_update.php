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
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_content')
        ->where('t_id='.$_GET['id'])
        ->select('T_INSTITUTION');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_title' => $_POST['title'],
        't_type' => $_POST['type'],
        't_content' => $content
    );

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_INSTITUTION', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: match_insti.php");
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
                        <h3>更改组织机构</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="match_insti_update.php" method="post" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']; ?>" />
                            </div>
                            <br>

                            <div class="field-box">
                                机构类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value = "1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>主办单位</option>
                                    <option value = "2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>协办单位</option>
                                    <option value = "3" <?php if($res[0]['t_type'] == 3) {?>selected = "selected" <?php } ?>>承办单位</option>
                                    <option value = "4" <?php if($res[0]['t_type'] == 4) {?>selected = "selected" <?php } ?>>支持单位</option>
                                    <option value = "1" <?php if($res[0]['t_type'] == 5) {?>selected = "selected" <?php } ?>>组委会</option>
                                    <option value = "2" <?php if($res[0]['t_type'] == 6) {?>selected = "selected" <?php } ?>>合作媒体</option>
                                    <option value = "3" <?php if($res[0]['t_type'] == 7) {?>selected = "selected" <?php } ?>>志愿者</option>
                                </select>
                            </div>
                            <br>

                            组织机构：&nbsp;&nbsp;&nbsp;
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