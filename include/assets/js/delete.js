function deleteCHILD(id) {
    var operation = "childDELETE";
    var data = "operation=" + operation + "&cid=" + id;
    connect_ajax_delete(data);

}

function deleteParent(id) {

    var operation = "parentDELETE";
    var data = "operation=" + operation + "&tid=" + id;
    connect_ajax_delete(data);
}

function connect_ajax_delete(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/delete.php',
        data: data,
        success: function(data) {
            if (data == "2Task Sucessful") {
                window.location.href = "?page=childTASK";
            } else if (data == "2Task Failed") {
                toastr.error("Something Wrong Try again");
            } else if (data == "Child Task Still Processing") {
                window.location.href = "?page=task";
                toastr.warning("Child Task Still Processing");
            } else if (data == "Task Sucessful") {
                window.location.href = "?page=task";
            } else if (data == "Task Failed") {
                toastr.warning("Something Wrong");
            }


        }
    });
}