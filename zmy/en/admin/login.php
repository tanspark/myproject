
<?php
//插入连接数据库的相关信息
include "com/mysqloperate.php";

$error_msg = "";
//判断用户是否已经设置cookie，如果未设置$_COOKIE['user_id']时，执行以下代码
if(!isset($_COOKIE['user_id'])){
    if(isset($_POST['submit'])){//判断用户是否提交登录表单，如果是则执行如下代码

        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            echo ' t_username="'.trim($_POST['username']).'" and t_password="'.trim($_POST['password']).'"';
            $res = MySqlOperate::getInstance()->field('t_id,t_username')
                ->where(' t_username="'.trim($_POST['username']).'" and t_password="'.trim($_POST['password']).'"')
                ->select('T_USER');

            //若查到的记录正好为一条，则设置COOKIE，同时进行页面重定向
            if(!empty($res)){
                setcookie('user_id', $res[0]['t_id']);
                setcookie('username', $res[0]['t_username']);
                $home_url = 'index.php';
                header('Location: '.$home_url);
            } else {//若查到的记录不对，则设置错误信息
                $error_msg = '用户名、密码为空';
            }
        } else {
            $error_msg = '用户名、密码错误';
        }
    }
} else {//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'index.php';
    header('Location: '.$home_url);
}

?>

<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>后台管理系统管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/signin.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


<!-- background switcher -->
<div class="bg-switch visible-desktop">
    <div class="bgs">
        <a href="#" data-img="landscape.jpg" class="bg active">
            <img src="img/bgs/landscape.jpg" />
        </a>
        <a href="#" data-img="blueish.jpg" class="bg">
            <img src="img/bgs/blueish.jpg" />
        </a>
        <a href="#" data-img="7.jpg" class="bg">
            <img src="img/bgs/7.jpg" />
        </a>
        <a href="#" data-img="8.jpg" class="bg">
            <img src="img/bgs/8.jpg" />
        </a>
        <a href="#" data-img="9.jpg" class="bg">
            <img src="img/bgs/9.jpg" />
        </a>
        <a href="#" data-img="10.jpg" class="bg">
            <img src="img/bgs/10.jpg" />
        </a>
        <a href="#" data-img="11.jpg" class="bg">
            <img src="img/bgs/11.jpg" />
        </a>
    </div>
</div>

<div class="row-fluid login-wrapper">
    <a href="index.html">
        <img class="logo" src="../images/logo.png" />
    </a>
    <?php
    if(empty($_COOKIE['user_id'])){
    echo '<p class="error" style="color: red;">'.$error_msg.'</p>';
    ?>

    <form class="span4 box" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">

        <div class="content-wrap">
            <h6>后台管理系统登录</h6>
            <input class="span12" type="text" id="username" name="username" placeholder="用户名"  />
            <input class="span12" type="password" id="password" name="password" placeholder="用户密码" />
            <a href="#" class="forgot">忘记密码?</a>
            <div class="remember">
                <input id="remember-me" type="checkbox" />
                <label for="remember-me">Remember me</label>
            </div>
            <input class="btn-glow primary login" type="submit" value="登录" name="submit"/>
        </div>

    </form>

    <?php } ?>
</div>

<!-- scripts -->
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>

<!-- pre load bg imgs -->
<script type="text/javascript">
    $(function () {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function (e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");

            $("html").css("background-image", "url('img/bgs/" + bg + "')");
        });

    });
</script>

</body>
</html>