<script src="include/assets/js/update.js"></script>
<?php 
    extract($_REQUEST);
    $user_id = $_SESSION['user_id'];
    require_once('config/db.php');
    $sql_task="SELECT `cTask_id`,`ParentTask_id`,`cTask_user_id`,`cTask_title`,`cTask_description`,`cTask_end_date`,`cTask_end_time` FROM `tbl_child_task` WHERE `cTask_id`=$cid";
    $query_task=mysqli_query($con,$sql_task);
    $data = mysqli_fetch_array($query_task);
    require_once('include/class/task.php');

    $task = new childTask($data['cTask_user_id'],$data['ParentTask_id'],$data['cTask_id'],$data['cTask_title'],$data['cTask_description'],null,null,$data['cTask_end_date'],$data['cTask_end_time'],null);

    if($user_id== $task->get_userId()){  ?>
<div>
    <form method="POST" action="" id="updateCT">
    <div class="row margin-top-50px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInput" class="form-label">Parante Title</label>
                <input type="text" disabled class="form-control" id="" name="" aria-describedby="emailHelp" value="<?php 
                    $tid=$task->get_taskid();
                    $sql="SELECT `pTask_title` FROM `tbl_parenttask` WHERE `pTask_id`='$tid'";
                    $query=mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $tt=$data['pTask_title'];
                
                echo $tt; ?>">
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="<?php echo $task->get_title(); ?>">
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="email" class="form-control" id="description" name="description" aria-describedby="emailHelp" value="<?php echo $task->get_description(); ?>">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">End Date</label>
                <input onchange="checkDate()" type="date" id="date" name="date" class="form-control" value="<?php echo $task->get_end_date(); ?>">
            </div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">End Time</label>
                <input type="time" onchange="checkTime()" id="time" name="time" class="form-control" value="<?php echo $task->get_end_time(); ?>" >
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-5"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"><button type="button" onclick="CHILDupdate(<?php echo $task->get_childTaskID(); ?>)" class="btn btn-primary w100p">Update Task</button></div>
            <div class="col-md-1"></div>
        </div>
    </form>
</div>
   <?php }

?>
