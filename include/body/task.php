
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }
</style>
<script src="include/assets/js/parentTaskMultiple.js"></script>
<div>
    <div class="row div-center ">
        <h3 style="text-align: center;">Task List</h3>
    </div>
    <div class="row float-right margin-top-10px margin-bottom-10px">
        <button type="button" onclick="lodeAddTask()" class="btn btn-primary margin-left-10px">+Create Task</button>
        <button type="button" onclick="multipleComplete()" class="btn btn-success w100px">Complete</button>
        <button type="button" onclick="multipleDelete()" class="btn btn-danger w100px">Delete</button>
    </div>

    <table id="myTable" class="display" style="width:100%">
        <thead>
                <tr style="background-color: #F7F9F9">
                    <th></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Late</th>
                    <th style="width:15%;"></th>
                </tr>
        </thead>
        <tbody>
            <?php
                require_once('config/db.php');
                require_once('include/class/task.php');
                $sql_task_view = "SELECT * FROM `tbl_parenttask` where pTask_user_id=$user_id AND pTask_activity!='D' ORDER BY pTask_id DESC";
                $query_task_view = mysqli_query($con, $sql_task_view);
                while ($data = mysqli_fetch_array($query_task_view)) {
                    $task = new task($data['pTask_user_id'], $data['pTask_id'], $data['pTask_title'], $data['pTask_description'], $data['pTask_create_date'], $data['pTask_create_time'], $data['pTask_end_date'], $data['pTask_end_time'], $data['pTask_activity']);
                
                    require_once('include/class/functionLIB.php');
                    $d=strtotime("+5 Hour");
                    $time=interval($task->get_end_date(),$task->get_end_time(),date('Y-m-d',$d),date('H:i:s',$d));
                    //estimeted ending -(current time or done time)
                    $hr=$time;
                    $min= ($time-(int)$time)*60;
            ?>
            <tr style="<?php 
            if($time < 0 && $task->get_activity()!="C"){echo 'background-color:#F5B7B1';}  
            else if($task->get_activity()=="C"){echo 'background-color:#A9DFBF';}
            ?>">
                <td><input type="checkbox" id="select[]" name="select[]" value="<?php echo $task->get_taskid(); ?>"></td>
                <td><?php echo $task->get_title(); ?></td>
                <td><?php echo $task->get_description(); ?></td>
                <td><?php if($task->get_activity()=="C"){echo "--";}
                            else{ echo (int)$hr.'hr '.(int)$min.'min';}
                    ?></td>
                <td><?php if($task->get_activity()=="A"){
                    echo 'Processing';
                }else if($task->get_activity()=="C"){
                    echo 'Complete';
                } ?>
                </td>
                <td><?php 
                    if($task->get_activity()=="C"){
                        $time=interval2($data['pTask_completeTIME'],$task->get_end_date(),$task->get_end_time());
                        if($time>0){
                            $hr=$time;
                            $min= ($time-(int)$time)*60;
                            echo (int)$hr."H ".(int)$min."M late";
                        }
                        else{
                            $hr=abs($time);
                            $min= abs(($time-(int)$time)*60);
                            echo (int)$hr."H ".(int)$min."M early";
                        }
                        
    
                    }else{
                        echo "--";
                    }
                ?></td>
                <td><a href="?page=update&tid=<?php echo $task->get_taskid(); ?>" >Edit</a> <a href="?page=view&tid=<?php echo $task->get_taskid(); ?>" >View</a><br> <a href="?page=taskDelete&tid=<?php echo $task->get_taskid(); ?>" >Delete</a> <a href="?page=taskComplete&tid=<?php echo $task->get_taskid(); ?>" >Complete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #F7F9F9">
                <th></th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Late</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>