function lodeLogin() {
    $("#mainFRAME").load("include/body/login.php");
}

function lodeSignUP() {
    $("#mainFRAME").load("include/body/signup.php");
}

function lodeParentTask() {
    $("#mainFRAME").load("include/body/task.php");

}

function lodeChildTask() {
    $("#mainFRAME").load("include/body/childTASK.php");
}

function lodeAddTask() {
    $("#mainFRAME").load("include/body/createTASK.php");
}

function lodeChildAddTask() {
    $("#mainFRAME").load("include/body/createChildTASK.php");
}

function updateTask(id) {
    var data = "&taskid=" + id;
    $("#mainFRAME").load("include/body/createTASK.php", data);
}



function checkDate() {
    var dateToday = $("#datex").val();
    var date = $("#date").val();
    if (dateToday <= date) {
        $("#time").prop("disabled", false);
    } else {
        toastr.error("Date Passed");
        $("#time").prop("disabled", true);
    }
}

function checkTime() {
    var dateToday = $("#datex").val();
    var date = $("#date").val();
    var timetoday = $("#timex").val()
    var time = $("#time").val()
    if (dateToday <= date && time > timetoday) {} else {

    }
}