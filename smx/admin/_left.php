<?php include "_head.php";?>

<body>

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="home.php" target="mainFrame">
                    <i class="icon-home"></i>
                    <span>主页</span>
                </a>
            </li>
            <li>
                <a href="banner_pic.php" target="mainFrame">
                    <i class="icon-picture"></i>
                    <span>导航栏图片</span>
                </a>
            </li>
            <li>
                <a href="watch_us.php" target="mainFrame">
                    <i class="icon-th-large"></i>
                    <span>关注我们</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-code-fork"></i>
                    <span>活动设置</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="match_intro.php" target="mainFrame">活动信息</a></li>
                    <li><a href="match_history.php" target="mainFrame">历史沿革</a></li>
                    <li><a href="match_insti.php" target="mainFrame">组织机构</a></li>
                    <li><a href="match_guide.php" target="mainFrame">活动指南</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-cog"></i>
                    <span>奖励设置</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="award_insti.php" target="mainFrame">设奖机构</a></li>
                    <li><a href="award_grade.php" target="mainFrame">奖项等级</a></li>
                    <li><a href="award_info.php" target="mainFrame">奖励形式</a></li>
                    <li><a href="award_other.php" target="mainFrame">其他奖励</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>活动资讯</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="info_notice.php" target="mainFrame">通知公告</a></li>
                    <li><a href="info_trends.php" target="mainFrame">活动动态</a></li>
                    <li><a href="info_publicity.php" target="mainFrame">名单公示</a></li>
                    <li><a href="info_activity.php" target="mainFrame">活动掠影</a></li>
                    <li><a href="info_video.php" target="mainFrame">视频播报</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span>线上展厅</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="online_team.php" target="mainFrame">参与团队</a></li>
                    <li><a href="online_stories.php" target="mainFrame">活动作品</a></li>
                    <li><a href="online_expert.php" target="mainFrame">专家风采</a></li>
                    <li><a href="online_smx.php" target="mainFrame">石墨烯基础知识</a></li>
                    <li><a href="online_internet.php" target="mainFrame">网上展厅</a></li>
                </ul>
            </li>
            <li>
                <a href="consult_answer.php" target="mainFrame">
                    <i class="icon-calendar-empty"></i>
                    <span>咨询答疑</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>重点活动</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="key_activity.php" target="mainFrame">重点活动</a></li>
                    <li><a href="key_a_type.php" target="mainFrame">活动类型</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span>精彩回顾</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="wonder_retro.php" target="mainFrame">项目回顾</a></li>
                    <li><a href="wonder_m_segment.php" target="mainFrame">活动时段</a></li>
                    <li><a href="wonder_m_district.php" target="mainFrame">活动地区</a></li>
                    <li><a href="wonder_m_theme.php" target="mainFrame">活动主题</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>关于我们</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="about_who.php" target="mainFrame">我们是谁</a></li>
                    <li><a href="about_case.php" target="mainFrame">成功案例</a></li>
                    <li><a href="about_contact.php" target="mainFrame">联系我们</a></li>
                    <li><a href="contact_gy.php" target="mainFrame">联系我们概要信息</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->


<!-- scripts -->
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
<!-- knob -->
<script src="js/jquery.knob.js"></script>
<!-- flot charts -->
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/theme.js"></script>

<script type="text/javascript">
    $(function () {

        // jQuery Knobs
        $(".knob").knob();



        // jQuery UI Sliders
        $(".slider-sample1").slider({
            value: 100,
            min: 1,
            max: 500
        });
        $(".slider-sample2").slider({
            range: "min",
            value: 130,
            min: 1,
            max: 500
        });
        $(".slider-sample3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 40, 170 ],
        });



        // jQuery Flot Chart
        var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
        var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

        var plot = $.plot($("#statsChart"),
            [ { data: visits, label: "Signups"},
                { data: visitors, label: "Visits" }], {
                series: {
                    lines: { show: true,
                        lineWidth: 1,
                        fill: true,
                        fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                    },
                    points: { show: true,
                        lineWidth: 2,
                        radius: 3
                    },
                    shadowSize: 0,
                    stack: true
                },
                grid: { hoverable: true,
                    clickable: true,
                    tickColor: "#f9f9f9",
                    borderWidth: 0
                },
                legend: {
                    // show: false
                    labelBoxBorderColor: "#fff"
                },
                colors: ["#a7b5c5", "#30a0eb"],
                xaxis: {
                    ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4,"APR"], [5,"MAY"], [6,"JUN"],
                        [7,"JUL"], [8,"AUG"], [9,"SEP"], [10,"OCT"], [11,"NOV"], [12,"DEC"]],
                    font: {
                        size: 12,
                        family: "Open Sans, Arial",
                        variant: "small-caps",
                        color: "#697695"
                    }
                },
                yaxis: {
                    ticks:3,
                    tickDecimals: 0,
                    font: {size:12, color: "#9da3a9"}
                }
            });

        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 30,
                left: x - 50,
                color: "#fff",
                padding: '2px 5px',
                'border-radius': '6px',
                'background-color': '#000',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#statsChart").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(0),
                        y = item.datapoint[1].toFixed(0);

                    var month = item.series.xaxis.ticks[item.dataIndex].label;

                    showTooltip(item.pageX, item.pageY,
                        item.series.label + " of " + month + ": " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    });
</script>

</body>
</html>
