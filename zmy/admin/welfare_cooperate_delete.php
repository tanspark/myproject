<?php

include "com/mysqloperate.php";

if(!empty($_GET['id'])) {

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_GET['id']))->delete('T_WELFARE_COOPERATE');;

    if($state != 0) {
        echo "删除成功";
        header("Location: welfare_cooperate.php");
    } else {
        echo "删除失败";
    }
}

?>
