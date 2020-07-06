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
                    <a href="en/index.php">EN</a>
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
                            <a href="index.php"><span class="name">首页</span></a>
                        </li>
                        <li class="<?php if($page_id==2) echo "current"; ?>">
                            <a href="found_about.php"><span class="name">基金会概况</span></a>
                            <ul>
                                <li><a href="found_about.php">关于我们</a></li>
                                <li><a href="found_idea.php?type=1">理念</a>
                                    <ul>
                                        <li><a href="found_idea.php?type=1">愿景</a></li>
                                        <li><a href="found_idea.php?type=2">使命</a></li>
                                        <li><a href="found_idea.php?type=3">价值观</a></li>
                                    </ul>
                                </li>
                                <li><a href="found_word.php">发起人寄语</a></li>
                                <li><a href="found_organ.php?type=1">组织架构</a>
                                    <ul>
                                        <li><a href="found_organ.php?type=1">理事会</a></li>
                                        <li><a href="found_organ.php?type=2">监事会</a></li>
                                        <li><a href="found_organ.php?type=3">秘书处</a></li>
                                    </ul>
                                </li>
                                <li><a href="found_charter.php">章程</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==3) echo "current"; ?>">
                            <a href="welfare_project_intro.php"><span class="name">公益项目</span></a>
                            <ul>
                                <li><a href="welfare_project_intro.php">
                                        神奇的石墨烯改变世界
                                    </a>
                                    <ul>
                                        <li><a href="welfare_project_intro.php">项目简介</a></li>
                                        <li><a href="welfare_flow.php">流程图</a></li>
                                        <li><a href="welfare_trends.php">动态</a></li>
                                        <li><a href="welfare_operate.php?type=1">合作学校</a></li>
                                        <li><a href="welfare_policy.php">相关政策</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">敬请期待</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==4) echo "current"; ?>">
                            <a href="news_list.php"><span class="name">新闻资讯</span></a>
                            <ul>
                                <li><a href="news_list.php">机构动态</a>
                                    <ul>
                                        <li><a href="news_list.php">基金会新闻</a></li>
                                        <li><a href="news_trends.php">行业动态</a></li>
                                        <li><a href="news_story.php">基金会故事</a></li>
                                    </ul>
                                </li>
                                <li><a href="news_honour.php">荣誉</a></li>
                                <li><a href="news_media.php">媒体关注</a></li>
                                <li><a href="news_video.php">视频资料</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==5) echo "current"; ?>">
                            <a href="info_annual.php"><span class="name">信息公开</span></a>
                            <ul>
                                <li><a href="info_annual.php">工作年报</a></li>
                                <li><a href="info_audit.php">审计报告</a></li>
                                <li><a href="info_rule.php">基金会规章制度</a></li>
                                <li><a href="info_revenue.php">善款收支</a></li>
                                <li><a href="info_report.php">评估报告</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==6) echo "current"; ?>">
                            <a href="donate_person.php"><span class="name">爱心捐赠</span></a>
                            <ul>
                                <li><a href="donate_person.php">捐赠人</a></li>
                                <li><a href="donate_enterprise.php">爱心企业</a></li>
                                <li><a href="donate_check.php">捐赠查询</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($page_id==7) echo "current"; ?>">
                            <a href="contact_us.php"><span class="name">联系我们</span></a>
                            <ul>
                                <?php for($i=0; $i<count($res_contact_type); $i++) {?>
                                <li>
                                    <a href="contact_list_detail.php?id=<?php echo $res_contact_type[$i]['t_id'] ?>">
                                        <?php echo $res_contact_type[$i]['t_title'] ?></a>
                                </li>
                                <?php } ?>
                                <li><a href="contact_us.php">联系方式</a></li>
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
