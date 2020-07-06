<?php
//已登录页面，显示登录用户名
if(!isset($_COOKIE['username'])){
    $home_url = 'login.php';
    header('Location:'.$home_url);
}

?>