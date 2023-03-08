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
<script src="include/assets/js/childTASKmultiple.js"></script>
<div>
    <div class="row div-center ">
        <h3 style="text-align: center;">Child Task List</h3>
    </div>
    <div class="row float-right margin-top-10px margin-bottom-10px">
        <button type="button" onclick="lodeChildAddTask()"  class="btn btn-primary margin-left-10px">+Create childTASK</button>
        <button type="button" onclick="multipleComplete()"class="btn btn-success w100px">Complete</button>
        <button type="button" onclick="multipleDelete()" class="btn btn-danger w100px">Delete</button>
    </div>

    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr style="background-color: #F7F9F9">
                <th></th>
                <th>Parent Task</th>
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
                $sql_task_view = "SELECT * FROM `tbl_child_task` where cTask_user_id=$user_id AND cTask_activity!='D' ORDER BY cTask_id DESC";
                $query_task_view = mysqli_query($con, $sql_task_view);
                while ($data = mysqli_fetch_array($query_task_view)) {
                    $task = new childTask($data['cTask_user_id'], $data['ParentTask_id'], $data['cTask_id'], $data['cTask_title'], $data['cTask_description'], $data['cTask_create_date'], $data['cTask_create_time'], $data['cTask_end_date'], $data['cTask_end_time'],$data['cTask_activity']);
                
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
                <td><input type="checkbox" id="select[]" name="select[]" value="<?php echo $task->get_childTaskID(); ?>"></td>
                <td><?php 
                    $tid=$task->get_taskid();
                    $sql="SELECT `pTask_title` FROM `tbl_parenttask` WHERE `pTask_id`='$tid'";
                    $query=mysqli_query($con,$sql);
                    $data2 = mysqli_fetch_array($query);
                    $tt=$data2['pTask_title'];
                
                echo $tt; ?></td>
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
                        $time=interval2($data['cTask_completeTIME'],$task->get_end_date(),$task->get_end_time());
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
                <td><a href="?page=updateCHILD&cid=<?php echo $task->get_childTaskID(); ?>" >Edit</a> <a href="?page=childVIEW&cid=<?php echo $task->get_childTaskID(); ?>" >View</a><br> <a href="?page=childDelete&cid=<?php echo $task->get_childTaskID(); ?>">Delete</a> <a href="?page=childComplete&cid=<?php echo $task->get_childTaskID(); ?>" >Complete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #F7F9F9">
                <th></th>
                <th>Parent Task</th>
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