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

if(!empty($_POST['title']) && !empty($_POST['type']) && $_POST['content']) {

    $id = time();
    $data = array(
        't_id' => $id,
        't_title' => $_POST['title'],
        't_type' => $_POST['type'],
        't_selected' => $_POST['selected'],
        't_content' => $content
    );
    $state =  MySqlOperate::getInstance()->insert('T_AWARD_OTHER', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: award_other.php");
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
                        <h3>新增其他奖项</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="award_other_add.php" method="post">

                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>

                            <div class="field-box">
                                奖项类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value="1">专项奖</option>
                                    <option value="2">十佳创新成果奖</option>
                                    <option value="3">青年社会责任奖</option>
                                    <option value="4">分赛区奖项</option>
                                </select>
                            </div>
                            <br>

                            <div class="field-box">
                                是否选中：&nbsp;&nbsp;&nbsp;
                                <select name="selected" style="height: 30px;">
                                    <option value="1">选中</option>
                                    <option value="2">未选中</option>
                                </select>
                            </div>
                            <br>

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