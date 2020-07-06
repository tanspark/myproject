<?php

$res_notice = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 6)
    ->select('t_notice');

$res_trends = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 6)
    ->select('t_trends');

$res_publicity = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 6)
    ->select('T_PUBLICITY');

function cut_str($str,$len,$suffix="..."){
    if(strlen($str) > $len){
        $str= mb_substr($str,0, $len,'utf-8').$suffix;
    } else {
        $str = $str;
    }
    return $str;
}

function substr_text($str, $start=0, $length, $charset="utf-8", $suffix="...")
{
    if(function_exists("mb_substr")){
        return mb_substr($str, $start, $length, $charset).$suffix;
    }
    elseif(function_exists('iconv_substr')){
        return iconv_substr($str,$start,$length,$charset).$suffix;
    }
    $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    return $slice.$suffix;
}

?>

<div class="col s12 m4 l4">
    <div class="top-post mb-10">
        <div class="Comments-post" style="min-height: 300px;">

            <span class="title-left" style="font-size: 16px;">通知公告</span>

            <span class="title-right">
                <a href="info_notice.php">更多+</a>
            </span>
            <hr>

            <?php if(!empty($res_notice)) for ($i = 0; $i < count($res_notice); $i++) { ?>
                <div class="row valign-wrapper" style="height: 25px; margin-top: 10px;">
                    <div class="col s12">
                        <span class="black-text">
                            <a href="info_notice_detail.php?id=<?php echo $res_notice[$i]['t_id']; ?>">
                                    <?php echo substr_text($res_notice[$i]['t_title'], 0,20); ?>
                            </a>
                        </span>
                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_notice[$i]['t_time'])); ?>]</span>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- /.tab-contant -->
    </div>
    <!-- /.top-post -->
</div>
<!-- colm4 -->

<div class="col s12 m4 l4">
    <div class="top-post w100dt mb-10">
        <div class="Comments-post" style="min-height: 300px;">
            <span class="title-left" style="font-size: 16px;">活动动态</span>

            <span class="title-right">
                <a href="info_trends.php">更多+</a>
            </span>
            <hr>
            <?php if(!empty($res_trends)) for ($i = 0; $i < count($res_trends); $i++) { ?>
                <div class="row valign-wrapper" style="height: 25px; margin-top: 10px;">
                    <div class="col s12">
                            <span class="black-text">
                                <a href="info_trends_detail.php?id=<?php echo $res_trends[$i]['t_id']; ?>">
                                    <?php echo substr_text($res_trends[$i]['t_title'],0,15); ?>
                                </a>
                            </span>
                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_trends[$i]['t_time'])); ?>]</span>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- /.tab-contant -->
    </div>
    <!-- /.top-post -->
</div>
<!-- colm4 -->

<div class="col s12 m4 l4">
    <div class="top-post w100dt mb-10">
        <div class="Comments-post" style="min-height: 300px;">
            <span class="title-left" style="font-size: 16px;">名单公示</span>
            <span class="title-right">
                <a href="info_publicity.php">更多+</a>
            </span>
            <hr>

            <?php if(!empty($res_publicity)) for ($i = 0; $i < count($res_publicity); $i++) { ?>
                <div class="row valign-wrapper" style="height: 25px; margin-top: 10px;">
                    <div class="col s12">
                        <span class="black-text">
                            <a href="info_publicity_detail.php?id=<?php echo $res_publicity[$i]['t_id']; ?>">
                                <?php echo substr_text($res_publicity[$i]['t_title'], 0,24); ?>
                            </a>
                        </span>
                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_publicity[$i]['t_time'])); ?>]</span>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /.tab-contant -->
    </div>
    <!-- /.top-post -->
</div>
<!-- colm4 -->
