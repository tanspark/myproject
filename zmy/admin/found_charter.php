<?php

include "com/mysqloperate.php";

if(!empty($_GET['pageNo']) && $_GET['pageNo'] != 0) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}
$pageSize = 10;
$total = MySqlOperate::getInstance()->totals('T_FOUND_CHARTER');
$pageTotal = ($total % $pageSize == 0) ? ($total / $pageSize) : ($total / $pageSize + 1);
$res = MySqlOperate::getInstance()->field('t_id,t_title,t_selected,t_time')
    ->order('t_time desc')
    ->limit($pageNo, $pageSize)
    ->select('T_FOUND_CHARTER');

?>

<?php include "_head.php";?>

<body>

    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>关于我们</h3>
                    <div class="span10 pull-right">
                        <input type="text" class="span5 search" placeholder="请输入查询的信息" />

                        <!-- custom popup filter -->
                        <!-- styles are located in css/elements.css -->
                        <!-- script that enables this dropdown is located in js/theme.js -->
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!">
                                查询
                                <i class="arrow-down"></i>
                            </div>
                            <div class="dialog">
                                <div class="pointer">
                                    <div class="arrow"></div>
                                    <div class="arrow_border"></div>
                                </div>
                                <div class="body">
                                    <p class="title">
                                        高级查询:
                                    </p>
                                    <div class="form">
                                        <select>
                                            <option />内容
                                            <option />创建时间
                                        </select>
                                        <select>
                                            <option />等于
                                            <option />不等于
                                            <option />大于
                                            <option />开始于
                                            <option />包含
                                        </select>
                                        <input type="text" />
                                        <a class="btn-flat small">增加条件</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="found_charter_add.php" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            新增
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span1 sortable align-center">
                                <span class="line"></span>序号
                            </th>
                            <th class="span5 sortable align-center">
                                <span class="line"></span>标题
                            </th>
                            <th class="span2 sortable align-center">
                                <span class="line"></span>是否选中
                            </th>
                            <th class="span3 sortable align-center">
                                <span class="line"></span>创建时间
                            </th>
                            <th class="span1 sortable align-center">
                                <span class="line"></span>编辑
                            </th>
                            <th class="span1 sortable align-center">
                                <span class="line"></span>删除
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php
                        for ($i=0; $i < count($res) ; $i++) {
                        ?>
                        <tr class="first">
                            <td class="align-center">
                                <?php echo $i+1;?>
                            </td>
                            <td class="align-left">
                                <a href="found_charter_update.php?id=<?php echo $res[$i]['t_id']; ?>" class="name"><?php echo $res[$i]['t_title'];?> </a>
                            </td>
                            <td class="align-left">
                                <?php
                                if($res[$i]['t_selected'] == 1) {
                                    echo "选中";
                                } else if($res[$i]['t_selected'] == 2) {
                                    echo "未选中";
                                } ?>
                            </td>
                            <td class="align-center">
                                <?php echo $res[$i]['t_time'];?>
                            </td>
                            <td class="align-center">
                                <a href="found_charter_update.php?id=<?php echo $res[$i]['t_id']; ?>">编辑</a>
                            </td>
                            <td class="align-center">
                                <a href="found_charter_delete.php?id=<?php echo $res[$i]['t_id']; ?>">删除</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- row -->

                        </tbody>
                    </table>
                </div>

                <div class="pagination pull-right">
                    <ul>
                        <li><a href="#">&#8249;</a></li>
                        <?php
                        for( $i=1; $i< $pageTotal; $i++) {
                        ?>
                            <li><a <?php if($pageNo==$i){ ?>class="active"<?php } ?> href="found_charter.php?pageNo=<?php echo $i;?>">
                                    <?php echo $i; ?></a></li>
                        <?php
                        }?>
                        <li><a href="#">&#8250;</a></li>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>
    </div>
    <!-- end main container -->


</body>
</html>