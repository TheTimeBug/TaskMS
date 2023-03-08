<script src="include/assets/js/update.js"></script>
<?php 
    extract($_REQUEST);
    $user_id = $_SESSION['user_id'];
    require_once('config/db.php');
    $sql_task="SELECT `pTask_user_id`,`pTask_id`,`pTask_title`,`pTask_description`,`pTask_end_date`,`pTask_end_time`,`pTask_activity` FROM `tbl_parenttask` WHERE `pTask_id`=$tid";
    $query_task=mysqli_query($con,$sql_task);
    $data = mysqli_fetch_array($query_task);
    require_once('include/class/task.php');

    $task = new task($data['pTask_user_id'],$data['pTask_id'],$data['pTask_title'],$data['pTask_description'],null,null,$data['pTask_end_date'],$data['pTask_end_time'],$data['pTask_activity']);

    if($user_id== $task->get_userId()){  ?>
<div>
    <form method="POST" action="" id="taskFROM">
        <div class="row margin-top-50px">
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
            <div class="col-md-2"><button type="button" onclick="update(<?php echo $task->get_taskid(); ?>)" class="btn btn-primary w100p">Update Task</button></div>
            <div class="col-md-1"></div>
        </div>
    </form>
</div>
   <?php }

?>
