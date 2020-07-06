<?php

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_username,t_password,t_desc')
        ->where('t_id='.$_GET['id'])
        ->select('T_USER');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_username' => $_POST['username'],
        't_password' => $_POST['password'],
        't_desc' => $_POST['desc']
    );

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_USER', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: manage_admin.php");
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
                        <h3>更改用户</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="manage_admin_update.php" method="post">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                <span>用&nbsp;户&nbsp;&nbsp;名：</span>
                                <input class="span8" type="text" name="username" value="<?php echo $res[0]['t_username']; ?>" />
                            </div>
                            <br />

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
                                <input id="desc" name="desc" type="text" value="<?php echo $res[0]['t_desc']; ?>" >
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