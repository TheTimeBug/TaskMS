<?php 
session_start();
     require_once('../../include/class/task.php');
    extract($_POST);
    $d=strtotime("+5 Hour");
    $dateT= date("Y-m-d",$d);
    $timeT = date("H:i",$d);
    if($operation=='create'){
        $task = new task( $_SESSION['user_id'],null,$title,$description,$dateT,$timeT,$date,$time,'A');
        $task->createTask();
    }
    if($operation=='childCREATE'){
        $CHILDtask = new childTask( $_SESSION['user_id'],$parentID,null,$title,$description,$dateT,$timeT,$date,$time,'A');
        $CHILDtask->createCHILDTask();
    }
    
?>