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
                <a class="dropdown-toggle" href="#">
                    <i class="icon-cog"></i>
                    <span>基金会概况</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="found_about.php" target="mainFrame">关于我们</a></li>
                    <li><a href="found_idea.php" target="mainFrame">理念</a></li>
                    <li><a href="found_word.php" target="mainFrame">发起人寄语</a></li>
                    <li><a href="found_organ.php" target="mainFrame">组织架构</a></li>
                    <li><a href="found_charter.php" target="mainFrame">章程</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-code-fork"></i>
                    <span>公益项目</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="welfare_project.php" target="mainFrame">项目与简介</a></li>
                    <li><a href="welfare_flow.php" target="mainFrame">项目流程图</a></li>
                    <li><a href="welfare_trends.php" target="mainFrame">项目动态</a></li>
                    <li><a href="welfare_cooperate.php" target="mainFrame">项目合作方</a></li>
                    <li><a href="welfare_policy.php" target="mainFrame">项目政策</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>新闻资讯</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="news_trends.php" target="mainFrame">机构动态</a></li>
                    <li><a href="news_honour.php" target="mainFrame">荣誉</a></li>
                    <li><a href="news_media.php" target="mainFrame">媒体关注</a></li>
                    <li><a href="news_video.php" target="mainFrame">视频资料</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span>信息公开</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="info_annual.php" target="mainFrame">工作年报</a></li>
                    <li><a href="info_audit.php" target="mainFrame">审计报告</a></li>
                    <li><a href="info_rule.php" target="mainFrame">基金会规章制度</a></li>
                    <li><a href="info_revenue.php" target="mainFrame">善款收支</a></li>
                    <li><a href="info_report.php" target="mainFrame">评估报告</a></li>
                </ul>
            </li>
            <li>
                <a href="donate.php" target="mainFrame">
                    <i class="icon-calendar-empty"></i>
                    <span>爱心捐赠</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>联系我们</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="contact_list.php" target="mainFrame">联系列表</a></li>
                    <li><a href="contact_type.php" target="mainFrame">类型列表</a></li>
                    <li><a href="contact_us.php" target="mainFrame">联系我们</a></li>
                    <li><a href="contact_gy.php" target="mainFrame">联系我们概要信息</a></li>
                </ul>
            </li>
            <li>
                <a href="watch_us.php" target="mainFrame">
                    <i class="icon-cog"></i>
                    <span>关注我们</span>
                </a>
            </li>
            <li>
                <a href="special_project.php" target="mainFrame">
                    <i class="icon-calendar-empty"></i>
                    <span>特色项目</span>
                </a>
            </li>
            <li>
                <a href="chronical_event.php" target="mainFrame">
                    <i class="icon-picture"></i>
                    <span>大事记</span>
                </a>
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
