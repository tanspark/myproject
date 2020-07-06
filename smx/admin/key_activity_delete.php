<?php

include "../com/mysqloperate.php";

if(!empty($_GET['id'])) {

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_GET['id']))->delete('T_KEY_ACTIVITY');;
    if($state != 0) {
        echo "删除成功";
        header("Location: key_activity.php");
    } else {
        echo "删除失败";
    }
}

?>
