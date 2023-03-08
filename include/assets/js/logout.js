function logout() {
    var operation = "logout";
    var data = "operation=" + operation;
    connect_ajax_logout(data);
}

function connect_ajax_logout(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/login.php',
        data: data,
        success: function(data) {
            if (data == "logout Sucessfull") {
                window.location.href = "?page=home";
                toastr.success("Logout Sucessfull");
            } else {
                toastr.error("Something Wrong");
            }
        }
    });
}