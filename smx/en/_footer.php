
<?php
$res_contact_gy = MySqlOperate::getInstance()->field('t_id,t_addr,t_tel,t_phone,t_email')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_CONTACT_INFO');
?>

<!-- ==================== footer-section Start ==================== -->
<footer id="footer-section" class="footer-section w100dt">
    <div class="container clearfix">

        <div class="row">
            <div class="span12" style="text-align: center">
                <a href="index.php">Home</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="match_introduction.php">About</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="join_institution.php?type=1">Join</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="info_notice.php">News</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="online_team.php">Online  Hall</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="key_activity.php">Key Activities</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="wonder_current.php">Wonderful</a>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="about_who.php">About Us</a>
            </div>
        </div>
        <div class="footer-1" style="text-align: center;padding:10px 0; ">
            <p>
            <?php if(!empty($res_contact_gy)) {?>
                Address：<i class="icon-map-marker"></i><?php echo $res_contact_gy[0]['t_addr'] ?>  &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                Telephone：<i class="icon-phone"></i> <?php echo $res_contact_gy[0]['t_tel'] ?> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                Mobile Phone：<i class="icon-mobile-2"></i> <?php echo $res_contact_gy[0]['t_phone'] ?> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                Mailbox：<i class="icon-mail-3"></i> <a href="mailto:#"><?php echo $res_contact_gy[0]['t_email'] ?></a>
            <?php } ?>
            </p>
        </div>

        <div style="margin:0 auto; padding:10px 0; text-align: center; color: black;">
            <a target="_blank" href="http://beian.miit.gov.cn/">
                京ICP备10026874号-26
            </a>
        </div>

        <div style="margin:0 auto; padding:10px 0; text-align: center;">
            <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802031766"
               style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
                <img src="img/beian_icon.png" style="float:left;"/>
                <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">京公网安备 11010802031766号</p>
            </a>
        </div>
    </div>

</footer>

<!-- /#footer-section -->
<!-- ==================== footer-section End ==================== -->


<!-- my custom js -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>

<!-- my custom js -->
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript">
</script>

</body>

</html>
