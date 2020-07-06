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
                        <a href="en/index.php">EN</a>
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
                                <a href="index.php">首页</a>
                            </li>
                            <li class="<?php if($page_id==2) {?>active<?php }?> dropdown ">
                                <a href="match_introduction.php">关于活动 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="match_introduction.php">活动信息</a></li>
                                    <li><a href="match_charter.php">活动章程</a></li>
                                    <li><a href="match_rules.php">活动规则</a></li>
                                    <li><a href="match_process.php">活动流程</a></li>
                                    <li><a href="match_history.php">历史沿革</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==3) {?>active<?php }?> dropdown">
                                <a href="join_institution.php?type=1">参与活动 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="join_institution.php?type=1">组织机构</a></li>
                                    <li><a href="join_guide.php">参与指南</a></li>
                                    <li><a href="join_award_grade.php?type=1">奖励设置</a></li>
                                    <li><a href="join_consult.php">咨询答疑</a></li>
                                </ul>
                                <!-- /.dropdown-container -->
                            </li>
                            <li class="<?php if($page_id==4) {?>active<?php }?> dropdown">
                                <a href="info_notice.php">活动资讯 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="info_notice.php">通知公告</a></li>
                                    <li><a href="info_trends.php">活动动态</a></li>
                                    <li><a href="info_publicity.php">名单公示</a></li>
                                    <li><a href="info_activity.php">活动掠影</a></li>
                                    <li><a href="info_video.php">视频播报</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==5) {?>active<?php }?> dropdown">
                                <a href="online_team.php">线上展厅 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="online_team.php">参与团队</a></li>
                                    <li><a href="online_stories.php">活动作品</a></li>
                                    <li><a href="online_expert.php">专家风采</a></li>
                                    <li><a href="online_sicence.php?type=1">石墨烯基础知识</a></li>
                                    <li><a href="online_internet.php">网上展厅</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==6) {?>active<?php }?> dropdown">
                                <a href="<?php if(!empty($res_key_type)) echo "key_activity.php?type=".$res_key_type[0]['t_id']; ?>">重点活动 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <?php if(!empty($res_key_type)) for($i=0; $i<count($res_key_type); $i++) { ?>
                                        <li><a href="key_activity.php?type=<?php echo $res_key_type[$i]['t_id'] ?>">
                                                <?php echo $res_key_type[$i]['t_title'] ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==7) {?>active<?php }?> dropdown">
                                <a href="wonder_current.php">精彩回顾 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="wonder_current.php">本届活动精彩回顾</a></li>
                                    <li><a href="wonder_history.php">往届活动精彩回顾</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==8) {?>active<?php }?> dropdown">
                                <a href="about_who.php">关于我们 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="about_who.php">我们是谁</a></li>
                                    <li><a href="about_case.php">成功案例</a></li>
                                    <li><a href="about_contact.php">联系我们</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- /.main-menu -->

                        <!-- ******************** sidebar-menu ******************** -->
                        <ul class="side-nav" id="mobile-demo">
                            <li class="snavlogo center-align"><img src="img/logo.png" alt="logo"></li>
                            <li class="<?php if($page_id==1) {?>active<?php }?>">
                                <a href="index.php">首页</a>
                            </li>
                            <li class="<?php if($page_id==2) {?>active<?php }?> dropdown ">
                                <a href="match_introduction.php">活动设置 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="match_introduction.php">活动信息</a></li>
                                    <li><a href="match_charter.php">活动章程</a></li>
                                    <li><a href="match_rules.php">活动规则</a></li>
                                    <li><a href="match_process.php">活动流程</a></li>
                                    <li><a href="match_history.php">历史沿革</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==3) {?>active<?php }?> dropdown">
                                <a href="join_institution.php?type=1">参与大赛 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="join_institution.php?type=1">组织机构</a></li>
                                    <li><a href="join_guide.php">参赛指南</a></li>
                                    <li><a href="join_award_grade.php?type=1">奖励设置</a></li>
                                    <li><a href="join_consult.php">咨询答疑</a></li>
                                </ul>
                                <!-- /.dropdown-container -->
                            </li>
                            <li class="<?php if($page_id==4) {?>active<?php }?> dropdown">
                                <a href="info_notice.php">活动资讯 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="info_notice.php">通知公告</a></li>
                                    <li><a href="info_trends.php">活动动态</a></li>
                                    <li><a href="info_publicity.php">名单公示</a></li>
                                    <li><a href="info_activity.php">活动掠影</a></li>
                                    <li><a href="info_video.php">视频播报</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==5) {?>active<?php }?> dropdown">
                                <a href="online_team.php">线上展厅 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="online_team.php">参与团队</a></li>
                                    <li><a href="online_stories.php">活动作品</a></li>
                                    <li><a href="online_expert.php">专家风采</a></li>
                                    <li><a href="online_sicence.php?type=1">石墨烯基础知识</a></li>
                                    <li><a href="online_internet.php">网上展厅</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==6) {?>active<?php }?> dropdown">
                                <a href="key_activity.php">重点活动 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <?php if(!empty($res_key_type)) for($i=0; $i<count($res_key_type); $i++) { ?>
                                        <li><a href="key_activity.php?type=<?php echo $res_key_type[$i]['t_id'] ?>">
                                                <?php echo $res_key_type[$i]['t_title'] ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==7) {?>active<?php }?> dropdown">
                                <a href="wonder_current.php">精彩回顾 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="wonder_current.php">本届活动精彩回顾</a></li>
                                    <li><a href="wonder_history.php">往届活动精彩回顾</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($page_id==8) {?>active<?php }?> dropdown">
                                <a href="about_who.php">关于我们 <i class="icofont icofont-simple-down"></i></a>
                                <ul class="dropdown-container">
                                    <li><a href="about_who.php">我们是谁</a></li>
                                    <li><a href="about_case.php">成功案例</a></li>
                                    <li><a href="about_contact.php">联系我们</a></li>
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