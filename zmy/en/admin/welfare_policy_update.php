<?php

include "com/mysqloperate.php";

$content = '';
if (!empty($_POST['content'])) {
    if (get_magic_quotes_gpc()) {
        $content = stripslashes($_POST['content']);
    } else {
        $content = $_POST['content'];
    }
}

if(!empty($_GET['id'])) {

    $res_project = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
        ->select('T_WELFARE_PROJECT');

    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_pid,t_content')
        ->where('t_id='.$_GET['id'])
        ->select('T_WELFARE_POLICY');
}

if(!empty($_POST['id'])) {
    $data = array(
        't_title' => $_POST['title'],
        't_pid' => $_POST['pid'],
        't_content' => $content
    );
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_WELFARE_POLICY', $data);

    header("Location: welfare_policy.php");
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
                        <h3>更新项目政策</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="welfare_policy_update.php" method="post">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">
                            <div class="field-box">
                                动态标题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']?>" />
                            </div>
                            <br />

                            <div class="field-box">
                                所属项目：&nbsp;&nbsp;&nbsp;
                                <select name="pid" style="height: 30px;">
                                    <?php for($i=0; $i<count($res_project); $i++) { ?>
                                        <option value="<?php echo $res_project[$i]['t_id']; ?>" <?php if($res[0]['t_pid'] == $res_project[$i]['t_id']) {?>selected = "selected" <?php } ?>><?php echo $res_project[$i]['t_title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br />

                            案例内容：&nbsp;&nbsp;&nbsp;
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