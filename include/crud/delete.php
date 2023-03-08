<?php 
session_start();
     require_once('../../include/class/task.php');
    extract($_POST);
    $d=strtotime("+5 Hour");
    $dateT= date("Y-m-d",$d);
    $timeT = date("H:i",$d);
    if($operation=='parentDELETE'){
        $task = new task( $_SESSION['user_id'],$tid,null,null,null,null,null,null,'D');
        $task->deleteTASK();
    }
    if($operation=='childDELETE'){
        $task = new childTask( $_SESSION['user_id'],null,$cid,null,null,null,null,null,null,'D');
        $task->deleteChildTASK();
    }

    
?>