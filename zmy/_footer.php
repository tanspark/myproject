
<?php
$res_contact_gy = MySqlOperate::getInstance()->field('t_id,t_addr,t_tel,t_phone,t_email')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_CONTACT_INFO');
?>


<!--footer menu-->
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <div class="span12" style="text-align: center; margin-top: 10px;">
                <a href="index.php">首页</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="found_about.php">基金会概况</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="welfare_project_intro.php">公益项目</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="news_list.php">新闻资讯</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="info_annual.php">信息公开</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="donate_person.php">爱心捐赠</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="contact_us.php">联系我们</a>
            </div>
        </div>

        <div class="row">
            <div class="span12" style="text-align: center; margin-top: 10px;">
                <address>
                    <?php if(!empty($res_contact_gy)) {?>
                    <i class="icon-map-marker"></i><?php echo $res_contact_gy[0]['t_addr'] ?>  &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                    <i class="icon-phone"></i> <?php echo $res_contact_gy[0]['t_tel'] ?> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                    <i class="icon-mobile-2"></i> <?php echo $res_contact_gy[0]['t_phone'] ?> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                    <i class="icon-mail-3"></i> <a href="mailto:#"><?php echo $res_contact_gy[0]['t_email'] ?></a>
                    <?php } ?>
                </address>
            </div>
        </div>
        <div class="row">
            <div style="margin:0 auto; padding:10px 0; text-align: center; color: black;">
                <a target="_blank" href="http://beian.miit.gov.cn/">
                    陕ICP备20006561号
                </a>
            </div>
            <div style="margin:0 auto; padding:10px 0; text-align: center;">
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802031772"
                   style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
                    <img src="images/beian_icon.png" style="float:left;"/>
                    <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">京公网安备 11010802031772号</p>
                </a>
            </div>
        </div>
    </div>
</section>
