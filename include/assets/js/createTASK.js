function createTASK() {
    var operation = "create";
    var formdata = $("#taskFROM").serialize();
    var data = "operation=" + operation + "&" + formdata;
    connect_ajax_task(data);
}

function connect_ajax_task(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/task.php',
        data: data,
        success: function(data) {
            if (data.substring(0, 14) == "Task Sucessful") {
                window.location.href = "?page=view&tid=" + data.substring(14, );
            } else if (data.substring(0, 14) == "Task Failed000") {
                toastr.warning("Something Wrong Try again");

            }

        }
    });
}