<?php include "_head.php";?>

<body>
    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar" ></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="brand" href="#"><img src="../img/logo.png" /></a>

            <div style="float: left; color: #fff; font-size: 18px; margin-top: 30px;">
                【神奇的石墨烯改变世界——青少年科普公益活动】网站后台
            </div>

            <ul class="nav pull-right">
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">1</span>
                    </a>
                </li>
                <div class="copyrights"></div>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-envelope-alt"></i>
                    </a>
                </li>
                <li class="settings hidden-phone">
                    <a href="manage_admin.php" target="mainFrame" role="button">
                        <i class="icon-cog"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        用户：<?php echo $_COOKIE['username']; ?>
                    </a>
                </li>
                <li class="settings hidden-phone">
                    <a onclick="parent.location.href='logout.php'">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end navbar -->


</body>
</html>