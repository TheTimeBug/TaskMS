function multipleComplete() {
    var favorite = [];
    var i = 0;
    $("input[name='select[]']:checked").each(function() {
        //val[i] = $(this).val();
        favorite.push($(this).val());
        i++;
    });
    for (j = 0; j < i; j++) {
        //await delay(2000);
        completeCHILD(favorite[j]);
    }
    window.location.href = "?page=childTASK";
}

function completeCHILD(id) {
    var operation = "childComplete";
    var data = "operation=" + operation + "&cid=" + id;
    connect_ajax_complete(data);
}

function connect_ajax_complete(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/complete.php',
        data: data,
        success: function(data) {
            if (data == "2Task Sucessful") {
                toastr.success("Task Completed Sucessfull");
            } else if (data == "2Task Failed") {
                toastr.warning("Something Wrong Try again");
            }

        }
    });
}


function multipleDelete() {
    var favorite = [];
    var i = 0;
    $("input[name='select[]']:checked").each(function() {
        //val[i] = $(this).val();
        favorite.push($(this).val());
        i++;
    });
    for (j = 0; j < i; j++) {
        // await delay(2000);
        deleteCHILD(favorite[j]);
    }
    window.location.href = "?page=childTASK";
}

function deleteCHILD(id) {
    var operation = "childDELETE";
    var data = "operation=" + operation + "&cid=" + id;
    connect_ajax_delete(data);

}

function connect_ajax_delete(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/delete.php',
        data: data,
        success: function(data) {
            if (data == "2Task Sucessful") {
                toastr.success("Task Deleted Sucessfull");
            } else if (data == "2Task Failed") {
                toastr.warning("Something Wrong Try again");
            }

        }
    });
}