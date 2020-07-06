<?php

include "com/mysqloperate.php";

if(!empty($_POST['username']) && !empty($_POST['password'])) {

    if($_POST['password'] == $_POST['password2']) {
        $data = array(
            't_username' => $_POST['username'],
            't_password' => $_POST['password'],
            't_desc' => $_POST['desc']
        );
        $state =  MySqlOperate::getInstance()->insert('T_USER', $data);

        if($state != 0) {
            echo "存储成功";
            header("Location: manage_admin.php");
        } else {
            echo "存储失败";
        }

    } else {
        echo "密码不一致";
        header("Location: manage_admin.php");
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
                        <h3>新增用户管理</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="manage_admin_add.php" method="post">

                            <div class="field-box">
                                用&nbsp;户&nbsp;&nbsp;名：
                                <input class="span8" type="text" name="username" />
                            </div>
                            <br>

                            <div class="field-box">
                                密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="password" name="password" />
                            </div>
                            <br>

                            <div class="field-box">
                                确认密码：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="password" name="password2" />
                            </div>
                            <br>

                            <div class="field-box">
                                备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注：&nbsp;&nbsp;&nbsp;
                                <input id="desc" name="desc" type="text" >
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