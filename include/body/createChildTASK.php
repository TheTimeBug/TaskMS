<?php session_start();
$user_id = $_SESSION['user_id']; ?>
<script src="include/assets/js/createChildTASK.js"></script>
<div>
    <form method="POST" action="" id="CHILDtaskFROM">
        <div class="row margin-top-50px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $user_id; ?>
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="parentID" name="parentID">
                        <option disabled selected>Choose Parent Task</option>
                        <?php 
                            require_once('../../config/db.php');
                            $sql_parent_title="SELECT `pTask_id`,`pTask_title` FROM `tbl_parenttask` WHERE `pTask_user_id`=$user_id and pTask_activity='A'";
                            $query_parent_title=mysqli_query($con,$sql_parent_title);
                            while($data = mysqli_fetch_array($query_parent_title)){
                                $title = $data['pTask_title'];
                                $title_id = $data['pTask_id'];
                                echo " <option value='$title_id'>$title</option>";
                            }
                        ?>
                       
                    </select>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="email" class="form-control" id="description" name="description" aria-describedby="emailHelp">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">End Date</label>
                <input onchange="checkDate()" type="date" id="date" name="date" class="form-control">
                <input  type="text" id="datex" name="" value="<?php $d=strtotime("+5 Hour"); echo date("Y-m-d",$d);?>" hidden>
            </div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">End Time</label>
                <input disabled type="time" onchange="checkTime()" id="time" name="time" class="form-control" >
                <input  type="text" id="timex" name=""  value="<?php $d=strtotime("+5 Hour"); echo date("H:i",$d);?>" hidden>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-5"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"><button type="button" onclick="createChildTASK()" class="btn btn-primary w100p">Create Task</button></div>
            <div class="col-md-1"></div>
        </div>
    </form>
</div>