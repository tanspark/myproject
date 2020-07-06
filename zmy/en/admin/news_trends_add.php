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

if(!empty($_POST['title']) && $_POST['content']) {

    $data = array(
        't_title' => $_POST['title'],
        't_type' => $_POST['type'],
        't_from' => $_POST['from'],
        't_from_time' => $_POST['from_time'],
        't_link' => $_POST['link'],
        't_content' => $content
    );
    $state =  MySqlOperate::getInstance()->insert('T_NEWS_TRENDS', $data);

    if($state) {
        echo "存储成功";
        header("Location: news_trends.php");
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
                        <h3>新增机构动态</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="news_trends_add.php" method="post">
                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value="1">基金会新闻</option>
                                    <option value="2">行业动态</option>
                                    <option value="3">故事</option>
                                </select>
                            </div>
                            <br>
                            发布来源：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="from" />
                            <br>
                            发布时间：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="from_time" />
                            <br>
                            外&nbsp;&nbsp;链&nbsp;&nbsp;接：&nbsp;&nbsp;&nbsp;
                            <input class="span8" type="text" name="link" />

                            <br>
                            简&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;介：&nbsp;&nbsp;&nbsp;
                            <input id="content" name="content" type="hidden"  >
                            <script id="editor" type="text/plain" style="width:1024px; height:500px;"></script>
                            <br>

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