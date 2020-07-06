<?php

$res_key_type = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_K_TYPE');
?>

<body>

<div class="thetop"></div>

<!-- for back to top -->
<div class="backToTop">
    <a href="#" class='scroll'>
        <span class="go-up">
            <i class="icofont icofont-long-arrow-up"></i>
        </span>
    </a>
</div>
<!-- backToTop -->

<!-- ==================== header-section Start ==================== -->
<header id="header-section" class="header-section w100dt">

    <nav class="nav-extended main-nav">
        <div class="container">

            <div class="banner-text mb-30" style="max-width: 100%">
                <div style="font-size: 16px; float: left;">
                    【神奇的石墨烯改变世界——青少年科普公益活动】[Youth Graphene Public Science Popularization Actions]
                </div>
                <div style="color: red; float: left;">
                    【少年追梦路，“烯”望探索行】[Young dreamer, Graphope explorer ]
                </div>
                <div>

                    <div class="banner-english">
                        <a href="../index.php">中文</a>
                    </div>

                    <?php include "_float.php"; ?>

                </div>
            </div>

            <div class="row">
                <div class="nav-wrapper w100dt">

                    <div class="logo left" style="margin-left: 15px;">
                        <a href="index.html" class="brand-logo">
                            <img src="img/logo.png" alt="brand-logo">
                        </a>
                    </div>
                    <!-- logo -->

                    <div>
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="icofont icofont-navigation-menu"></i>
                        </a>
                        <ul id="nav-mobile" class="main-menu center-align hide-on-med-and-down">
                            <li class="<?php if($page_id==1) {?>active<?php }?>">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if($page_id==2) {?>active<?php }?> dropdown ">
                                <a href="match_introduction.php">About <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="match_introduction.php">Introduction</a></li>
                                    <li><a href="match_charter.php">Constitution</a></li>
                                    <li><a href="match_rules.php">Rule</a></li>
                                    <li><a href="match_process.php">Flow</a></li>
                                    <li><a href="match_history.php">Historical Evolution</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==3) {?>active<?php }?> dropdown">
                                <a href="join_institution.php?type=1">Join <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="join_institution.php?type=1">Organization</a></li>
                                    <li><a href="join_guide.php">Entry Guide</a></li>
                                    <li><a href="join_award_grade.php?type=1">Award Settings</a></li>
                                    <li><a href="join_consult.php">Consultation and Answer</a></li>
                                </ul>
                                <!-- /.dropdown-container -->
                            </li>
                            <li class="<?php if($page_id==4) {?>active<?php }?> dropdown">
                                <a href="info_notice.php">News <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="info_notice.php">Notice</a></li>
                                    <li><a href="info_trends.php">Trend</a></li>
                                    <li><a href="info_publicity.php">List Publicity</a></li>
                                    <li><a href="info_activity.php">Activity Snapshot</a></li>
                                    <li><a href="info_video.php">Video Broadcast</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==5) {?>active<?php }?> dropdown">
                                <a href="online_team.php">Online Hall <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="online_team.php">Team</a></li>
                                    <li><a href="online_stories.php">Entries</a></li>
                                    <li><a href="online_expert.php">Expert Style</a></li>
                                    <li><a href="online_sicence.php?type=1">Basic Knowledge</a></li>
                                    <li><a href="online_internet.php">Online Exhibition</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==6) {?>active<?php }?> dropdown">
                                <a href="<?php if(!empty($res_key_type)) echo "key_activity.php?type=".$res_key_type[0]['t_id']; ?>">Key Activities <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <?php if(!empty($res_key_type)) for($i=0; $i<count($res_key_type); $i++) { ?>
                                        <li><a href="key_activity.php?type=<?php echo $res_key_type[$i]['t_id'] ?>">
                                                <?php echo $res_key_type[$i]['t_title'] ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==7) {?>active<?php }?> dropdown">
                                <a href="wonder_current.php">Wonderful <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="wonder_current.php">Review of the Competition</a></li>
                                    <li><a href="wonder_history.php">Review of Previous Competitions</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==8) {?>active<?php }?> dropdown">
                                <a href="about_who.php">About Us <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="about_who.php">Who am I</a></li>
                                    <li><a href="about_case.php">Success Stories</a></li>
                                    <li><a href="about_contact.php">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- /.main-menu -->

                        <!-- ******************** sidebar-menu ******************** -->
                        <ul class="side-nav" id="mobile-demo">
                            <li class="snavlogo center-align"><img src="img/logo.png" alt="logo"></li>
                            <li class="<?php if($page_id==1) {?>active<?php }?>">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if($page_id==2) {?>active<?php }?> dropdown ">
                                <a href="match_introduction.php">About Competition <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="match_introduction.php">Introduction</a></li>
                                    <li><a href="match_charter.php">Constitution</a></li>
                                    <li><a href="match_rules.php">Rule</a></li>
                                    <li><a href="match_process.php">Flow</a></li>
                                    <li><a href="match_history.php">Historical Evolution</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==3) {?>active<?php }?> dropdown">
                                <a href="join_institution.php?type=1">Join Competition <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="join_institution.php?type=1">Organization</a></li>
                                    <li><a href="join_guide.php">Entry Guide</a></li>
                                    <li><a href="join_award_grade.php?type=1">Award Settings</a></li>
                                    <li><a href="join_consult.php">Consultation and Answer</a></li>
                                </ul>
                                <!-- /.dropdown-container -->
                            </li>
                            <li class="<?php if($page_id==4) {?>active<?php }?> dropdown">
                                <a href="info_notice.php">Competition News <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="info_notice.php">Notice</a></li>
                                    <li><a href="info_trends.php">Trend</a></li>
                                    <li><a href="info_publicity.php">List Publicity</a></li>
                                    <li><a href="info_activity.php">Activity Snapshot</a></li>
                                    <li><a href="info_video.php">Video Broadcast</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==5) {?>active<?php }?> dropdown">
                                <a href="online_team.php">Online Exhibition Hall <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="online_team.php">Team</a></li>
                                    <li><a href="online_stories.php">Entries</a></li>
                                    <li><a href="online_expert.php">Expert Style</a></li>
                                    <li><a href="online_sicence.php?type=1">Basic Knowledge</a></li>
                                    <li><a href="online_internet.php">Online Exhibition</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==6) {?>active<?php }?> dropdown">
                                <a href="key_activity.php">Key Activities <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <?php if(!empty($res_key_type)) for($i=0; $i<count($res_key_type); $i++) { ?>
                                        <li><a href="key_activity.php?type=<?php echo $res_key_type[$i]['t_id'] ?>">
                                                <?php echo $res_key_type[$i]['t_title'] ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==7) {?>active<?php }?> dropdown">
                                <a href="wonder_current.php">Wonderful Review <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="wonder_current.php">Review of the Competition</a></li>
                                    <li><a href="wonder_history.php">Review of Previous Competitions</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==8) {?>active<?php }?> dropdown">
                                <a href="about_who.php">About Us <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="about_who.php">Who am I</a></li>
                                    <li><a href="about_case.php">Success Stories</a></li>
                                    <li><a href="about_contact.php">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- main-menu -->
                </div>
                <!-- /.nav-wrapper -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </nav>

</header>
<!-- /#header-section -->
<!-- ==================== header-section End ==================== -->