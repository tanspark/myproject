<?php

include "com/mysqloperate.php";

if(!empty($_POST['tel']) && $_POST['addr']) {

    $data = array(
        't_tel' => $_POST['tel'],
        't_selected' => $_POST['selected'],
        't_addr' => $_POST['addr'],
        't_tel' => $_POST['tel'],
        't_phone' => $_POST['phone'],
        't_email' => $_POST['email'],
    );
    $state =  MySqlOperate::getInstance()->insert('T_CONTACT_INFO', $data);

    if($state) {
        echo "存储成功";
        header("Location: contact_gy.php");
    } else {
        echo "存储失败";
    }
}

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
            <div id="pad-wrapper">
                 <div class="row-fluid head">
                    <div class="span12">
                        <h3>新增联系我们概要信息</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="contact_gy_add.php" method="post">

                            <div class="field-box">
                                是否选中：&nbsp;&nbsp;&nbsp;
                                <select name="selected" style="height: 30px;">
                                    <option value="1">选中</option>
                                    <option value="2">未选中</option>
                                </select>
                            </div>
                            <br>

                            <div class="field-box">
                                地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="addr" />
                            </div>
                            <br>
                            <div class="field-box">
                                电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="tel" />
                            </div>
                            <br>
                            <div class="field-box">
                                手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="phone" />
                            </div>
                            <br>
                            <div class="field-box">
                                邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="email" />
                            </div>
                            <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="button" class="btn-glow primary " value="提交内容" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

</body>
</html>