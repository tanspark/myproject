<?php

include "../com/mysqloperate.php";

if(!empty($_POST['title'])) {

    $data = array(
        't_title' => $_POST['title']
    );
    $state =  MySqlOperate::getInstance()->insert('T_K_TYPE', $data);

    if($state) {
        echo "存储成功";
        header("Location: key_a_type.php");
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
                        <h3>新增活动类型</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="key_a_type_add.php" method="post">
                            <div class="field-box">
                                活动类型：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
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