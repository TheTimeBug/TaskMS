function update(id) {
    var operation = "create";
    var formdata = $("#taskFROM").serialize();
    var data = "operation=" + operation + "&id=" + id + "&" + formdata;
    connect_ajax_task(data);
}

function CHILDupdate(id) {
    var operation = "updateCT";
    var formdata = $("#updateCT").serialize();
    var data = "operation=" + operation + "&id=" + id + "&" + formdata;
    connect_ajax_task(data);
}

function connect_ajax_task(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/update.php',
        data: data,
        success: function(data) {
            if (data == "Task Sucessful") {
                window.location.href = "?page=task";
            } else if (data == "Task Failed") {
                toastr.error("Something Wrong Try again");
            }
            if (data == "2Task Sucessful") {
                window.location.href = "?page=childTASK";
            } else if (data == "2Task Failed") {
                toastrr.error("Something Wrong Try again");
            }

        }
    });
}