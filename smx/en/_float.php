
<?php

$res_watch_1 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_filepath,t_link')
    ->order('t_time desc')
    ->where('t_type=1')
    ->select('T_WATCH');

$res_watch_2 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_filepath,t_link')
    ->order('t_time desc')
    ->where('t_type=2')
    ->select('T_WATCH');

$res_watch_3 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_filepath,t_link')
    ->order('t_time desc')
    ->where('t_type=3')
    ->select('T_WATCH');

$res_watch_4 = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_filepath,t_link')
    ->order('t_time desc')
    ->where('t_type=4')
    ->select('T_WATCH');
?>

<div class="side-bar">

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

    <!--  注释
    <a href="#" class="icon-qq">微信公众号
        <div class="qq-tips">
            <i>微信公众号</i>
            <img style="width:138px;height:138px;"
                 src="<?php if(!empty($res_watch_1) && count($res_watch_1) >0) echo $res_watch_1[0]['t_filepath']?>"
                 href="<?php if(!empty($res_watch_1) && count($res_watch_1) >0) echo $res_watch_1[0]['t_link']?>"
                 alt="<?php if(!empty($res_watch_1) && count($res_watch_1) >0) echo $res_watch_1[0]['t_title']?>'">
        </div>
    </a>
    <a href="#" class="icon-chat">bilibili
        <div class="chat-tips">
            <i>bilibili</i>
            <img style="width:138px;height:138px;"
                 src="<?php if(!empty($res_watch_2) && count($res_watch_2) >0) echo $res_watch_2[0]['t_filepath']?>"
                 href="<?php if(!empty($res_watch_2) && count($res_watch_2) >0) echo $res_watch_2[0]['t_link']?>"
                 alt="<?php if(!empty($res_watch_2) && count($res_watch_2) >0) echo $res_watch_2[0]['t_title']?>'">
        </div>
    </a>
    <a href="#" class="icon-blog">微博
        <div class="blog-tips">
            <i>微博</i>
            <img style="width:138px;height:138px;"
                 src="<?php if(!empty($res_watch_3) && count($res_watch_3) >0) echo $res_watch_3[0]['t_filepath']?>"
                 href="<?php if(!empty($res_watch_3) && count($res_watch_3) >0) echo $res_watch_3[0]['t_link']?>"
                 alt="<?php if(!empty($res_watch_3) && count($res_watch_3) >0) echo $res_watch_3[0]['t_title']?>'">
        </div>
    </a>
    <a href="" class="icon-mail">抖音
        <div class="mail-tips">
            <i>抖音</i>
            <img style="width:138px;height:138px;"
                 src="<?php if(!empty($res_watch_4) && count($res_watch_4) >0) echo $res_watch_4[0]['t_filepath']?>"
                 href="<?php if(!empty($res_watch_4) && count($res_watch_4) >0) echo $res_watch_4[0]['t_link']?>"
                 alt="<?php if(!empty($res_watch_4) && count($res_watch_4) >0) echo $res_watch_4[0]['t_title']?>'">
        </div>
    </a>
    -->
</div>