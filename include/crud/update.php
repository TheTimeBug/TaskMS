<?php 
session_start();
     require_once('../../include/class/task.php');
    extract($_POST);
    $d=strtotime("+5 Hour");
    $dateT= date("Y-m-d",$d);
    $timeT = date("H:i",$d);
    if($operation=='create'){
        $task = new task( $_SESSION['user_id'],$id,$title,$description,null,null,$date,$time,'A');
        $task->updateTASK();
    }
    if($operation=='updateCT'){
        $task = new childTask( $_SESSION['user_id'],null,$id,$title,$description,null,null,$date,$time,'A');
        $task->updateChildTASK();
    }

    
?>