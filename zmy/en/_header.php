<?php
$res_project = MySqlOperate::getInstance()->field('t_id,t_title,t_content')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_WELFARE_PROJECT');

$res_contact_type = MySqlOperate::getInstance()->field('t_id,t_title')
    ->select('T_CONTACT_TYPE');
?>

<!--header-->
<header id="header">
    <div class="container">
        <div class="row header-top">
            <div class="span6 logo" >
                <a class="logo-img" href="index.php" title="responsive template">
                    <img src="images/logo.jpg" alt="Tabulate" style="max-height: 80px;" /></a>
            </div>
            <div class="span6 social-container" style="margin-top: 30px;" >

                <div class="banner-english">
                    <a href="../index.php">中文</a>
                </div>

                <div id="box">
                    <!-- 用于显示微信公众号图标 -->
                    <div id="wechat">
                        <div id="code-wechat"></div>
                    </div>
                    <!-- 用于显示bilibili -->
                    <div id="bili">
                        <div id="code-bili"></div>
                    </div>
                    <!-- 用于显示微博图标 -->
                    <div id="weibo">
                        <div id="code-weibo"></div>
                    </div>
                    <!-- 用于显示抖音图标 -->
                    <div id="douyin">
                        <div id="code-douyin"></div>
                    </div>
                </div>

<!--                <div class="top-social">-->
<!--                    <a data-original-title="Facebook" rel="tooltip" data-placement="top" class="top-facebook" href="https://wwww.facebook.com" target="_blank"></a>-->
<!---->
<!--                    <a data-original-title="推特" rel="tooltip" data-placement="top" class="top-twitter" href="https://wwww.twitter.com" target="_blank"></a>-->
<!---->
<!--                    <a data-original-title="微信" rel="tooltip" data-placement="top" class="top-wx" href="https://weixin.qq.com" target="_blank"></a>-->
<!---->
<!--                    <a data-original-title="bilibil" rel="tooltip" data-placement="top" class="top-bili" href="https://www.bilibili.com" target="_blank"></a>-->
<!---->
<!--                    <a data-original-title="微博" rel="tooltip" data-placement="top" class="top-wb" href="https://weibo.com" target="_blank"></a>-->
<!---->
<!--                    <a data-original-title="抖音" rel="tooltip" data-placement="top" class="top-dy" href="https://www.douyin.com" target="_blank"></a>-->
<!--                </div>-->


            </div>
        </div>
        <div class="row header-nav">
            <div class="span12">
                <nav id="menu" class="clearfix">
                    <ul>
                        <li class="<?php if($page_id==1) echo "current"; ?>">
                            <a href="index.php"><span class="name">Home</span></a>
                        </li>
                        <li class="<?php if($page_id==2) echo "current"; ?>">
                            <a href="found_about.php"><span class="name">Foundation Overview</span></a>
                            <ul>
                                <li><a href="found_about.php">About Us</a></li>
                                <li><a href="found_idea.php?type=1">Idea</a>
                                    <ul>
                                        <li><a href="found_idea.php?type=1">Vision</a></li>
                                        <li><a href="found_idea.php?type=2">Mission</a></li>
                                        <li><a href="found_idea.php?type=3">Values</a></li>
                                    </ul>
                                </li>
                                <li><a href="found_word.php">Promoter Message</a></li>
                                <li><a href="found_organ.php?type=1">Organization</a>
                                    <ul>
                                        <li><a href="found_organ.php?type=1">Council</a></li>
                                        <li><a href="found_organ.php?type=2">Supervisors</a></li>
                                        <li><a href="found_organ.php?type=3">Secretariat</a></li>
                                    </ul>
                                </li>
                                <li><a href="found_charter.php">Bylaws</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==3) echo "current"; ?>">
                            <a href="welfare_project_intro.php""><span class="name">Charitable Projects</span></a>
                            <ul>
                                <li><a href="welfare_project_intro.php"">
                                        Amazing Graphene Changes The World
                                    </a>
                                    <ul>
                                        <li><a href="welfare_project_intro.php">Project Description</a></li>
                                        <li><a href="welfare_flow.php">Flow chart</a></li>
                                        <li><a href="welfare_trends.php">Dynamic</a></li>
                                        <li><a href="welfare_operate.php?type=1">Cooperative School</a></li>
                                        <li><a href="welfare_policy.php">Related Policy</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Stay Tuned</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==4) echo "current"; ?>">
                            <a href="news_list.php"><span class="name">News</span></a>
                            <ul>
                                <li><a href="news_list.php">Agency Dynamics</a>
                                    <ul>
                                        <li><a href="news_list.php">Foundation News</a></li>
                                        <li><a href="news_trends.php">Industry News</a></li>
                                        <li><a href="news_story.php">Foundation Story</a></li>
                                    </ul>
                                </li>
                                <li><a href="news_honour.php">Honor</a></li>
                                <li><a href="news_media.php">Media Focus</a></li>
                                <li><a href="news_video.php">Video Material</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==5) echo "current"; ?>">
                            <a href="info_annual.php"><span class="name">Information Disclosure</span></a>
                            <ul>
                                <li><a href="info_annual.php">Work Report</a></li>
                                <li><a href="info_audit.php">Audit Report</a></li>
                                <li><a href="info_rule.php">Rules and Regulations</a></li>
                                <li><a href="info_revenue.php">Charity</a></li>
                                <li><a href="info_report.php">Evaluation Report</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==6) echo "current"; ?>">
                            <a href="donate_person.php"><span class="name">Love Donate</span></a>
                            <ul>
                                <li><a href="donate_person.php">Donors</a></li>
                                <li><a href="donate_enterprise.php">Caring Enterprise</a></li>
                                <li><a href="donate_check.php">Donation Inquiry</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==7) echo "current"; ?>">
                            <a href="contact_us.php"><span class="name">Contact Us</span></a>
                            <ul>
                                <?php for($i=0; $i<count($res_contact_type); $i++) {?>
                                <li>
                                    <a href="contact_list.php?id=<?php echo $res_contact_type[$i]['t_id'] ?>">
                                        <?php echo $res_contact_type[$i]['t_title'] ?></a>
                                </li>
                                <?php } ?>
                                <li><a href="contact_us.php">Contact Details</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!--<form class="top-search pull-right">-->
                <!--<input type="text" placeholder="text here..." class="span3">-->
                <!--<button type="button" class="btn"><i class="icon-search-form"></i></button>-->
                <!--</form>-->
            </div>
        </div>
    </div>
</header>
