<script src="include/assets/js/delete.js"></script>
<?php 
    extract($_REQUEST);
    $user_id = $_SESSION['user_id'];
    require_once('config/db.php');
    $sql_task="SELECT `pTask_user_id`,`pTask_id`,`pTask_title`,`pTask_description`,`pTask_end_date`,`pTask_end_time`,`pTask_activity` FROM `tbl_parenttask` WHERE `pTask_id`=$tid";
    $query_task=mysqli_query($con,$sql_task);
    $data = mysqli_fetch_array($query_task);
    require_once('include/class/task.php');

    $task = new task($data['pTask_user_id'],$data['pTask_id'],$data['pTask_title'],$data['pTask_description'],null,null,$data['pTask_end_date'],$data['pTask_end_time'],$data['pTask_activity']);
    $d=strtotime("+5 Hour");
    $timestamp = strtotime(date($task->get_end_date().' '.$task->get_end_time()))-strtotime(date('Y-m-d h:i:sa',$d));
    $time=$timestamp/(60*60);
    $hr=$time;
    $min= ($time-(int)$time)*60;
    if($user_id== $task->get_userId()){  ?>
<div>
    <form method="POST" action="" id="taskFROM">
        <div class="row margin-top-50px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <p><strong>Title : </strong><?php echo $task->get_title(); ?></p>
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <p><strong>Description : </strong><?php echo $task->get_description(); ?></p>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-2">
            <p><strong>Date : </strong><?php echo $task->get_end_date(); ?></p>
            </div>
            <div class="col-md-2">
            <p><strong>Time : </strong><?php echo $task->get_end_time(); ?></p>
            </div>
            <div class="col-md-2">
            <p><strong>Remining : </strong><?php echo (int)$hr.'hr '.(int)$min.'min'; ?></p>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-4"></div>
            <div class="col-md-4"><h4>Are you Sure You want to delete this Task?</h4></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-4"></div>
            <div class="col-md-2"><button type="button"  class="btn btn-primary w100p" onClick="deleteParent(<?php echo $task->get_taskid(); ?>)">Yes</button></div>
            <div class="col-md-2"><a href="?page=task"><button type="button" class="btn btn-primary w100p">No</button></a></div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
   <?php }

?>
