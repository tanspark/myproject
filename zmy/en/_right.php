
<?php
$res_news = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 5)
    ->where('t_type=1')
    ->select('T_NEWS_TRENDS');

$res_trends = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 5)
    ->where('t_type=2')
    ->select('T_NEWS_TRENDS');

$res_story = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1,5)
    ->where('t_type=3')
    ->select('T_NEWS_TRENDS');


function cut_str($str,$len,$suffix="..."){
    if(function_exists('mb_substr')){
        if(strlen($str) > $len){
            $str= mb_substr($str,0,$len).$suffix;
        }
        return $str;
    } else {
        if(strlen($str) > $len){
            $str= substr($str,0,$len).$suffix;
        }
        return $str;
    }
}
?>


<ul class="thumbnails">
    <!--新闻模块-->
    <li class="span4">
        <div class="news-text">
            <h4>Foundation News<a href="news_list.php"><span style="float: right;">+</span></a></h4>
            <div>
                <ul>
                    <?php for($i=0; $i<count($res_news); $i++) { ?>
                    <li style="border-bottom:1px solid #00a2d4; ">
                        <span style="float: left;"><a href="news_list_detail.php?id=<?php echo $res_news[$i]['t_id'] ?>">
                                    <?php echo cut_str($res_news[$i]['t_title'],20) ?></a></span>
                        <span style="float: right;"><?php echo $res_news[$i]['t_time'] ?></span>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </li>
    <!--动态模块-->
    <li class="span4">
        <div class="trends-text">
            <h4>Industry Trends<a href="news_trends.php"><span style="float: right;">+</span></a></h4>
            <div>
                <ul>
                    <?php for($i=0; $i<count($res_trends); $i++) { ?>
                        <li style="border-bottom:1px solid #00a2d4; ">
                            <span style="float: left;"><a href="news_trends_detail.php?id=<?php echo $res_trends[$i]['t_id'] ?>">
                                    <?php echo cut_str($res_trends[$i]['t_title'],20) ?></a></span>
                            <span style="float: right;"><?php echo $res_trends[$i]['t_time'] ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </li>
    <!--故事模块-->
    <li class="span4">
        <div class="story-text">
            <h4>Foundation Story<a href="news_story.php"><span style="float: right;">+</span></a></h4>
            <div>
                <ul>
                    <?php for($i=0; $i<count($res_story); $i++) { ?>
                        <li style="border-bottom:1px solid #00a2d4; ">
                            <a href="news_story_detail.php?id=<?php echo $res_story[$i]['t_id']; ?>">
                                <span style="float: left;"><?php echo cut_str($res_story[$i]['t_title'],20) ?></span>
                                <span style="float: right;"><?php echo $res_story[$i]['t_time']; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </li>
</ul>