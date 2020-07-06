<?php

include "../com/mysqloperate.php";


if(!empty($_POST['title']) && !empty($_POST['link']) ) {

    $id = time();
    $data = array(
        't_id' => $id,
        't_title' => $_POST['title'],
        't_link' => $_POST['link'],
        't_intro' => $_POST['intro']
    );
    $state =  MySqlOperate::getInstance()->insert('T_INTERLINK', $data);

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
                        <h3>新增网上展厅</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="online_internet_add.php" method="post">

                            <div class="field-box">
                                展厅名称：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                展厅链接：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="link" />
                            </div>
                            <br>

                            展厅简介：&nbsp;&nbsp;&nbsp;
                            <textarea name="intro" style="width:1000px; height:200px;"></textarea>
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