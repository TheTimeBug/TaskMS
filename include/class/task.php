<?php
class task{
    public $userId;
    public $taskid;
    public $title;
    public $description;
    public $start_time;
    public $end_time;
    public $start_date;
    public $end_date;
    public $activity;
    function __construct($userId,$id,$title,$description,$start_date,$start_time,$end_date,$end_time,$activity) {
        $this->userId = $userId;
        $this->taskid = $id;
        $this->title = $title;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->end_date = $end_date;
        $this->end_time = $end_time;
        $this->activity = $activity;
    }

    //getters
    function get_userId(){
        return $this->userId;
    }
    function get_taskid(){
        return $this->taskid;
    }function get_title(){
        return $this->title;
    }function get_description(){
        return $this->description;
    }function get_start_date(){
        return $this->start_date;
    }function get_start_time(){
        return $this->start_time;
    }function get_end_date(){
        return $this->end_date;
    }function get_end_time(){
        return $this->end_time;
    }function get_activity(){
        return $this->activity;
    }

    //CreateTAsk
    function createTask(){
        require_once('../../config/db.php');
        $sql_create = "INSERT INTO `tbl_parenttask` (pTask_user_id,`pTask_id`, `pTask_title`, `pTask_description`, `pTask_create_date`, `pTask_create_time`, `pTask_end_date`, `pTask_end_time`, `pTask_activity`, `pTask_update_date`, `pTask_updatetime`) 
                                            VALUES ('$this->userId',NULL, '$this->title', '$this->description',' $this->start_date', '$this->start_time:00', '$this->end_date', '$this->end_time:00', 'A', NULL, NULL)";
        $query_create=mysqli_query($con,$sql_create);
        $last_id = $con->insert_id;
        if($query_create){
            echo "Task Sucessful";
        }else{
            echo "Task Failed000";
        }
        echo $last_id;
    }

    function updateTASK(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        require_once('../../config/db.php');
        $sql_update = "UPDATE `tbl_parenttask` SET `pTask_title` = '$this->title', `pTask_description` = '$this->description',`pTask_end_date` = '$this->end_date', `pTask_end_time` = '$this->end_time',`pTask_update_date` = '$dateT', `pTask_updatetime` = '$timeT' 
                        WHERE `tbl_parenttask`.`pTask_id` = $this->taskid";
        $query_update=mysqli_query($con,$sql_update);
        //echo $sql_update;
        if($query_update){
            echo "Task Sucessful";
        }else{
            echo "Task Failed";
        }
    }

    function deleteTASK(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        require_once('../../config/db.php');

        $sql_check="SELECT COUNT(*) AS child FROM `tbl_child_task` where `ParentTask_id`=$this->taskid and `cTask_activity`='A';";
        $query_check = mysqli_query($con,$sql_check);
        $d=mysqli_fetch_array($query_check);
        $child = $d['child'];
        if($child==0){
            $sql_update = "UPDATE `tbl_parenttask` SET `pTask_activity` = 'D', `pTask_update_date` = '$dateT', `pTask_updatetime` = '$timeT' WHERE `tbl_parenttask`.`pTask_id` = $this->taskid";
            $query_update=mysqli_query($con,$sql_update);
            if($query_update){
                echo "Task Sucessful";
            }else{
                echo "Task Failed";
            }
        }else{
            echo "Child Task Still Processing";
        }
        
    }
    function parentComplete(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        $dateTIME = $dateT= date("Y-m-d H:i:sa",$d);
        require_once('../../config/db.php');
        $sql_update = "UPDATE `tbl_parenttask` SET `pTask_activity` = 'C', `pTask_update_date` = '$dateT', `pTask_updatetime` = '$timeT',pTask_completeTIME='$dateTIME' WHERE `tbl_parenttask`.`pTask_id` = $this->taskid";
        $query_update=mysqli_query($con,$sql_update);
        //echo $sql_update;
        if($query_update){
            echo "Task Sucessful";
        }else{
            echo "Task Failed";
        }

    }
    
}

class childTask extends task{
    public $childTaskID;
    function __construct($userId,$id,$childTaskID,$title,$description,$start_date,$start_time,$end_date,$end_time,$activity) {
        $this->userId = $userId;
        $this->taskid = $id;
        $this->childTaskID = $childTaskID;
        $this->title = $title;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->end_date = $end_date;
        $this->end_time = $end_time;
        $this->activity = $activity;

       // echo"child construct created";
        
    }
    function get_userId(){
        return $this->userId;
    }
    function get_childTaskID(){
        return $this->childTaskID;
    }function get_taskid(){
        return $this->taskid;
    }function get_title(){
        return $this->title;
    }function get_description(){
        return $this->description;
    }function get_start_date(){
        return $this->start_date;
    }function get_start_time(){
        return $this->start_time;
    }function get_end_date(){
        return $this->end_date;
    }function get_end_time(){
        return $this->end_time;
    }function get_activity(){
        return $this->activity;
    }
    function createCHILDTask(){
        require_once('../../config/db.php');
        $sql_create = "INSERT INTO `tbl_child_task` (`cTask_id`, `ParentTask_id`, `cTask_user_id`, `cTask_title`, `cTask_description`, `cTask_create_date`, `cTask_create_time`, `cTask_end_date`, `cTask_end_time`, `cTask_activity`, `cTask_update_date`, `cTask_updatetime`) 
                                            VALUES (NULL, '$this->taskid', '$this->userId',  '$this->title',  '$this->description',' $this->start_date', '$this->start_time:00', '$this->end_date', '$this->end_time:00', 'A', NULL, NULL)";
        $query_create=mysqli_query($con,$sql_create);
        $last_id = $con->insert_id;
        if($query_create){
            echo "Task Sucessful";
        }else{
            echo "Task Failed000";
        }
        echo $last_id;
    }
    function updateChildTASK(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        require_once('../../config/db.php');
        $sql_update = "UPDATE `tbl_child_task` SET `cTask_title` = '$this->title', `cTask_description` = '$this->description', `cTask_end_date` = '$this->end_date', `cTask_end_time` = '$this->end_time', `cTask_update_date` = '$dateT', `cTask_updatetime` = '$timeT' WHERE `tbl_child_task`.`cTask_id` = $this->childTaskID";
        $query_update=mysqli_query($con,$sql_update);
        //echo $sql_update;
        if($query_update){
            echo "2Task Sucessful";
        }else{
            echo "2Task Failed";
        }
    }
    function deleteChildTASK(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        require_once('../../config/db.php');
        $sql_update = "UPDATE `tbl_child_task` SET `cTask_activity` = 'D', `cTask_update_date` = '$dateT', `cTask_updatetime` = '$timeT' WHERE `tbl_child_task`.`cTask_id` = $this->childTaskID";
        $query_update=mysqli_query($con,$sql_update);
        //echo $sql_update;
        if($query_update){
            echo "2Task Sucessful";
        }else{
            echo "2Task Failed";
        }
    }
    function childComplete(){
        $d=strtotime("+5 Hour");
        $dateT= date("Y-m-d",$d);
        $timeT = date("H:i:s",$d);
        $dateTIME = $dateT= date("Y-m-d H:i:sa",$d);
        require_once('../../config/db.php');
        $sql_update = "UPDATE `tbl_child_task` SET `cTask_activity` = 'C', `cTask_update_date` = '$dateT', `cTask_updatetime` = '$timeT',cTask_completeTIME='$dateTIME' WHERE `tbl_child_task`.`cTask_id` = $this->childTaskID";
        $query_update=mysqli_query($con,$sql_update);
        //echo $sql_update;
        if($query_update){
            echo "2Task Sucessful";
        }else{
            echo "2Task Failed";
        }
    }
}
?>