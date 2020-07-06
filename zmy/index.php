<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php $page_id = 1; ?>

<?php include "admin/com/mysqloperate.php"?>

<?php
//导航栏
$res_banner = MySqlOperate::getInstance()->field('t_id,t_title,t_filepath,t_link')
    ->order('t_time desc')
    ->limit(1, 5)
    ->select('T_BANNER');

//新闻
$res_news = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 5)
    ->where('t_type=1')
    ->select('T_NEWS_TRENDS');

//动态
$res_trends = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 5)
    ->where('t_type=2')
    ->select('T_NEWS_TRENDS');

//故事
$res_story = MySqlOperate::getInstance()->field('t_id,t_title,t_time')
    ->order('t_time desc')
    ->limit(1, 5)
    ->where('t_type=3')
    ->select('T_NEWS_TRENDS');

//爱心捐赠
$res_cooperate = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_file_path,t_file_name')
    ->order('t_time desc')
    ->select('T_DONATE');

//特色项目
$res_special = MySqlOperate::getInstance()->field('t_id,t_title,t_file_path,t_file_name,t_link')
    ->order('t_time desc')
    ->select('T_SPECIAL_PROJECT');

//大事记
$res_event = MySqlOperate::getInstance()->field('t_id,t_title,t_file_path,t_file_name')
    ->order('t_time desc')
    ->select('T_CHRONICAL_EVENT');

function cut_str($str,$len,$suffix="...") {
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


<?php include "_head.php"; ?>

<body>

<!--top menu-->
<?php include "_top.php"?>

<!--header-->
<?php include "_header.php"; ?>

<!--slider-->
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="mainslider" class="flexslider">
                    <ul class="slides" >
                        <?php for($i=0; $i<count($res_banner); $i++) { ?>
                            <li>
                                <a href="<?php echo $res_banner[$i]['t_link'] ?>">
                                    <img src="<?php echo $res_banner[$i]['t_filepath'] ?>" alt="" style="max-height: 400px;"/></a>
<!--                                <div class="slide-caption">-->
<!--                                    <p class="slide-subtitle">-->
<!--                                        --><?php //echo $res_banner[$i]['t_title'] ?>
<!--                                    </p>-->
<!--                                </div>-->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        var sWidth = $("#mainslider").width(); //获取焦点图的宽度（显示面积）

        var len = $("#mainslider ul li").length; //获取焦点图个数
        var index = 0;
        var picTimer;

        // $("#slides ul").css("width",sWidth * (len));

        //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
        $("#mainslider").hover(function() {
            clearInterval(picTimer);
        }, function() {
            picTimer = setInterval(function() {
                showPics(index);
                index ++;

                if (index == len) {
                    index = 0;
                }
            }, 3000); //此1000代表自动播放的间隔，单位：毫秒

        }).trigger("mouseleave");

        //显示图片函数，根据接收的index值显示相应的内容
        function showPics(index) { //普通切换
            var nowLeft = -index * sWidth; //根据index值计算ul元素的left值
            $("#mainslider ul li").stop(true, false).animate({
                "left" : nowLeft
            }, 1000,"linear"); //通过animate()调整ul元素滚动到计算出的position
        }
    });
</script>

<section id="container">
    <!--container-->
    <div class="container">

        <!--特色项目-->
        <div class="row">
            <div class="span12 our-works"><h4>特色项目</h4></div>
            <div class="span12">
                <div id="our-projects" class="carousel bttop">
                    <div class="carousel-wrapper">
                        <ul class="portfolio">
                            <?php for($i=0; $i<count($res_special); $i++) { ?>
                                <li>
                                    <article>
                                        <div class="inner-image">
                                            <a href="<?php echo $res_special[$i]['t_link'] ?>">
                                                <img src="<?php echo $res_special[$i]['t_file_path'] ?>"
                                                     alt="<?php echo $res_special[$i]['t_file_name'] ?>"
                                                     style="width: 400px; height: 200px;" />
                                                <span class="frame-overlay"></span>
                                            </a>
                                        </div>
                                        <div class="sliding">
                                            <div class="inner-text">
                                                <a href="#"><?php echo $res_special[$i]['t_title'] ?></a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#our-projects').elastislide({
                            imageW : 270,
                            border : 0,
                            minItems : 1,
                            margin : 30
                        });
                    });
                </script>
            </div>
        </div>

        <!-- 滚动新闻-->
        <div class="row">
            <div class="span12">
                <ul class="thumbnails">
                    <!--新闻模块-->
                    <li class="span4">
                        <div class="news-text">
                            <h4>基金会新闻<a href="news_list.php"><span style="float: right;">+</span></a></h4>
                            <hr>
                            <ul style="margin-left: -10px;">
                                <?php for($i=0; $i<count($res_news); $i++) { ?>
                                    <li style="height: 35px; ">
                                            <span style="float: left;">
                                                <a href="news_list_detail.php?id=<?php echo $res_news[$i]['t_id'] ?>">
                                                    <?php echo substr_text($res_news[$i]['t_title'], 0,20) ?></a>
                                            </span>
                                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_news[$i]['t_time'])); ?>]</span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <!--动态模块-->
                    <li class="span4">
                        <div class="trends-text">
                            <h4>行业动态<a href="news_trends.php"><span style="float: right;">+</span></a></h4>
                            <hr>
                            <ul style="margin-left: -10px;">
                                <?php for($i=0; $i<count($res_trends); $i++) { ?>
                                    <li style="height: 35px; ">
                                            <span style="float: left;">
                                                <a href="news_trends_detail.php?id=<?php echo $res_trends[$i]['t_id'] ?>">
                                                    <?php echo substr_text($res_trends[$i]['t_title'], 0, 20) ?></a>
                                            </span>
                                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_news[$i]['t_time'])); ?>]</span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <!--故事模块-->
                    <li class="span4">
                        <div class="story-text">
                            <h4>基金会故事<a href="news_story.php"><span style="float: right;">+</span></a></h4>
                            <hr>
                            <ul style="margin-left: -10px;">
                                <?php for($i=0; $i<count($res_story); $i++) { ?>
                                    <li style="height: 35px; ">
                                            <span style="float: left;">
                                                <a href="news_story_detail.php?id=<?php echo $res_story[$i]['t_id'] ?>">
                                                    <?php echo substr_text($res_story[$i]['t_title'], 0,20) ?></a>
                                            </span>
                                        <span style="float: right;">[<?php echo date('m-d', strtotime($res_news[$i]['t_time'])); ?>]</span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!--大事记-->
        <div class="row">
            <div class="span12">
                <h4 style="font-weight: 600; padding-top: 10px;">大事记</h4>
            </div>
            <div class="span12">
                <!--testimonals-->
                <div id="testimonial-dsj" class="carousel bttop">
                    <div class="carousel-wrapper">
                        <ul class="testimonials">
                            <?php for($i=0; $i<count($res_event); $i++) { ?>
                                <li>
                                    <a href="chronic_event.php?id=<?php echo $res_event[$i]['t_id'] ?>" >
                                        <img src="<?php echo $res_event[$i]['t_file_path'] ?>" alt=""
                                        style="width: 200px; height: 150px;" />
                                        <div style="text-align: center;">
                                            <?php echo substr_text($res_event[$i]['t_title'], 0,18) ?>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#testimonial-dsj').elastislide({
                            margin  : 30
                        });
                    });
                </script>
            </div>
        </div>

        <!--合作伙伴-->
        <div class="row">
            <div class="span12 testimonials">
                <h4>合作伙伴</h4>
            </div>
            <div class="span12">
                <div id = "noSeamScroll">
                    <ul>
                        <?php for($i=0; $i<count($res_cooperate); $i++) { ?>
                            <li><a href="<?php if($res_cooperate[$i]['t_type']==1) {
                                    echo 'donate_person_detail.php?id='.$res_cooperate[$i]['t_id'];
                                } else {
                                    echo 'donate_enterprise_detail.php?id='.$res_cooperate[$i]['t_id'];
                                } ?>">
                                    <img src="<?php echo $res_cooperate[$i]['t_file_path'] ?>"
                                         alt="<?php echo $res_cooperate[$i]['t_file_name'] ?>"
                                         style="width: 200px; height: 150px;"/>

                                </a></li>
                        <?php } ?>
                    </ul>
                </div>
                <a href="javascript:;" id="leftArr" class="move-left"> <<< &nbsp; 向左移动</a>
                <a href="javascript:;" id="rightArr" class="move-right">向右移动 &nbsp; >>></a>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    $.fn.extend({noSeamScroll:function (leftBtn,rightBtn,speed) {
                            var timeFlag = speed = speed || 4;
                            var timer = null;
                            var _this = this;//把this重新保存在一个私有变量里面，以防止setInterval误把this指向了window
                            this.oUl = $("ul",this);
                            this.oUl.html(this.oUl.html() + this.oUl.html());//把li复制一份
                            this.oLis = $("ul li",this);//之后再变量保存li的全部节点
                            this.oUl.width(this.oLis.eq(0).outerWidth(true)*this.oLis.length + "px");
                            var fnMove = function () {
                                $("ul",_this).css("left",function (){
                                    if ($(this).position().left > 0){//这里的this指的是$("ul",element)
                                        return -$(this).outerWidth(true)/2 + "px";
                                    }
                                    if ($(this).position().left < -$(this).outerWidth(true)/2 ){
                                        return "0px";
                                    }
                                    return $(this).position().left  + timeFlag + "px";
                                })
                            }

                            timer = setInterval(fnMove,30);
                            this.mouseover(function () {
                                clearInterval(timer);
                            });
                            this.mouseout(function () {
                                timer = setInterval(fnMove,30)
                            });

                            leftBtn.click(function () {
                                clearInterval(timer);
                                timeFlag = -speed;
                                timer = setInterval(fnMove,30);
                            })
                            rightBtn.click(function (){
                                clearInterval(timer);
                                timeFlag = speed;
                                timer = setInterval(fnMove,30);
                            })
                        }
                    });

                    //test
                    $("#noSeamScroll").noSeamScroll($("#leftArr"),$("#rightArr"),2);
                })

            </script>

            <style type="text/css">
                *{margin:0;padding:0;}
                #noSeamScroll {
                    width: 100%;
                    height: 150px;
                    position: relative;
                    overflow: hidden;
                }
                #noSeamScroll ul{
                    position: absolute;
                    list-style: none;
                }
                #noSeamScroll ul li {
                    float: left;
                    margin-right: 10px;
                }
                .move-left {
                    float: left;
                    color: #ff3d00;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
                .move-right {
                    float: right;
                    color: #ff3d00;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            </style>

        </div>

    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>
