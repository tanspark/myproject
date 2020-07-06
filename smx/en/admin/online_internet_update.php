<?php

include "../com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_link,t_intro')
        ->where('t_id='.$_GET['id'])
        ->select('T_INTERLINK');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_title' => $_POST['title'],
        't_link' => $_POST['link'],
        't_intro' => $_POST['intro']
    );

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_INTERLINK', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: online_internet.php");
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
                        <h3>更改网上展厅</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_internet_update.php" method="post">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                展厅名称：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']; ?>" />
                            </div>
                            <br>

                            <div class="field-box">
                                展厅链接：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="link" value="<?php echo $res[0]['t_link']; ?>" />
                            </div>
                            <br>

                            展厅简介：
                            <textarea name="intro" style="width:1000px; height:200px;">
                                <?php echo $res[0]['t_intro']; ?>
                            </textarea>

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