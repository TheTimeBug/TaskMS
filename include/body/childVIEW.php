<script src="include/assets/js/onclickLIST.js"></script>
<?php 
    extract($_REQUEST);
    $user_id = $_SESSION['user_id'];
    require_once('config/db.php');
    $sql_task="SELECT `cTask_id`,`ParentTask_id`,`cTask_user_id`,`cTask_title`,`cTask_description`,`cTask_create_date`,`cTask_create_time`,`cTask_end_date`,`cTask_end_time`,`cTask_activity` FROM `tbl_child_task` WHERE cTask_id= $cid";
    $query_task=mysqli_query($con,$sql_task);
    $data = mysqli_fetch_array($query_task);
    require_once('include/class/task.php');

    $task = new childTask($data['cTask_user_id'],$data['ParentTask_id'],$data['cTask_id'],$data['cTask_title'],$data['cTask_description'],$data['cTask_create_date'],$data['cTask_create_time'],$data['cTask_end_date'],$data['cTask_end_time'],$data['cTask_activity']);
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
                <p><strong>Parent Task : </strong><?php 
                    $tid=$task->get_taskid();
                    $sql="SELECT `pTask_title` FROM `tbl_parenttask` WHERE `pTask_id`='$tid'";
                    $query=mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $tt=$data['pTask_title'];
                
                echo $tt; ?></p>
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
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
            <div class="col-md-3"></div>
            <div class="col-md-2"><a href="?page=childComplete&cid=<?php echo $task->get_childTaskID(); ?>" ><button type="button"  class="btn btn-primary w100p">Complete</button></a></div>
            <div class="col-md-2"><a href="?page=updateCHILD&cid=<?php echo $task->get_childTaskID(); ?>" ><button type="button"  class="btn btn-primary w100p">Edit</button></a></div>
            <div class="col-md-2"><a href="?page=childDelete&cid=<?php echo $task->get_childTaskID(); ?>"><button type="button" class="btn btn-primary w100p">Delete</button></a></div>
            <div class="col-md-1"></div>
        </div>
    </form>
</div>
   <?php }

?>
