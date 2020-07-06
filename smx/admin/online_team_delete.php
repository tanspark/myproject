<?php

include "../com/mysqloperate.php";

if(!empty($_GET['id'])) {

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_GET['id']))->delete('T_TEAM');;

    if($state != 0) {
        //删除之前文件表
        $state =  MySqlOperate::getInstance()->where(array('t_pid' => $_GET['id']))->delete('T_DOC');;
        if($state != 0) {
            echo "删除成功";
            header("Location: online_team.php");
        } else {
            echo "删除文件表失败";
        }
    } else {
        echo "删除失败";
    }
}

?>
