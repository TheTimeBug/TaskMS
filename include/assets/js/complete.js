function completeCHILD(id) {
    var operation = "childComplete";
    var data = "operation=" + operation + "&cid=" + id;
    connect_ajax_complete(data);
}

function completeParent(id) {
    var operation = "parentComplete";
    var data = "operation=" + operation + "&pid=" + id;
    connect_ajax_complete(data);
}

function connect_ajax_complete(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/complete.php',
        data: data,
        success: function(data) {
            if (data == "2Task Sucessful") {
                window.location.href = "?page=childTASK";
            } else if (data == "2Task Failed") {
                toastr.warning("Something Wrong Try again");
            }
            if (data == "Task Sucessful") {
                window.location.href = "?page=task";
            } else if (data == "Task Failed") {
                toastr.warning("Something Wrong Try again");
            }


        }
    });
}