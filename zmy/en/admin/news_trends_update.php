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
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_content,t_from,t_from_time,t_link')
        ->where('t_id='.$_GET['id'])
        ->select('T_NEWS_TRENDS');
}

if(!empty($_POST['id'])) {
    $data = array(
        't_title' => $_POST['title'],
        't_type'=> $_POST['type'],
        't_from' => $_POST['from'],
        't_from_time' => $_POST['from_time'],
        't_link' => $_POST['link'],
        't_content' => $content
    );
    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_NEWS_TRENDS', $data);

    header("Location: news_trends.php");
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
                        <h3>更新机构动态</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="news_trends_update.php" method="post">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">
                            <div class="field-box">
                                标题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']?>" />
                            </div>
                            <br />

                            <div class="field-box">
                                类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value = "1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>基金会新闻</option>
                                    <option value = "2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>行业动态</option>
                                    <option value = "3" <?php if($res[0]['t_type'] == 3) {?>selected = "selected" <?php } ?>>故事</option>
                                </select>
                            </div>
                            <br>
                            发布来源：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="from" value="<?php echo $res[0]['t_from']?>" />
                            <br>
                            发布时间：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="from_time"  value="<?php echo $res[0]['t_from_time']?>"/>
                            <br>
                            外&nbsp;&nbsp;链&nbsp;&nbsp;接：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="link" value="<?php echo $res[0]['t_link']?>" />

                            <br />
                            内容：&nbsp;&nbsp;&nbsp;
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