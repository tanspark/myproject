<?php include "loged.php"?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
    <base href="<%=basePath%>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统管理系统</title>
</head>

<frameset rows="95,*" frameborder="no" border="0" framespacing="0">
    <frame src="_top.php" name="topFrame"  noresize scrolling="no">
    <frameset cols="185,*" frameborder="no" border="0" framespacing="0">
        <frame src="_left.php" name="leftFrame" noresize scrolling="yes">
        <frame src="home.php" name="mainFrame" noresize scrolling="yes">
    </frameset>
</frameset>
</html>
