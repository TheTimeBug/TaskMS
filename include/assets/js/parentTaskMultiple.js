function multipleDelete() {
    var favorite = [];
    var i = 0;
    $("input[name='select[]']:checked").each(function() {
        //val[i] = $(this).val();
        favorite.push($(this).val());
        i++;
    });
    for (j = 0; j < i; j++) {
        deleteParent(favorite[j]);
    }
    window.location.href = "?page=task";
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
            if (data == "Child Task Still Processing") {
                toastr.warning("Child Task Still Processing");
            } else if (data == "Task Sucessful") {
                toastr.success("Delete Sucessfull");
            } else if (data == "Task Failed") {
                toastr.error("Something Wrong");
            }


        }
    });
}


function multipleComplete() {
    var favorite = [];
    var i = 0;
    $("input[name='select[]']:checked").each(function() {
        //val[i] = $(this).val();
        favorite.push($(this).val());
        i++;
    });
    for (j = 0; j < i; j++) {
        completeParent(favorite[j]);
    }
    window.location.href = "?page=task";
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
            if (data == "Task Sucessful") {
                toastr.success("Task Complete");
            } else if (data == "Task Failed") {
                toastr.error("Something Wrong Try again");
            }
        }
    });
}