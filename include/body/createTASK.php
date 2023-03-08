<script src="include/assets/js/createTASK.js"></script>
<div>
    <form method="POST" action="" id="taskFROM">
        <div class="row margin-top-50px">
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
            <div class="col-md-2"><button type="button" onclick="createTASK()" class="btn btn-primary w100p">Create Task</button></div>
            <div class="col-md-1"></div>
        </div>
    </form>
</div>