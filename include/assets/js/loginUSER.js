function login() {
    var operation = "login";
    var formdata = $("#loginFROM").serialize();
    var data = "operation=" + operation + "&" + formdata;
    connect_ajax_login(data);
}

function connect_ajax_login(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/login.php',
        data: data,
        success: function(data) {
            if (data == "password dosent match..") {
                toastr.error("Wrong Password");
                //$("#mainFRAME").load("include/body/login.php");
            } else if (data == "No account Found") {
                toastr.error("Wrong email and password");
            } else if (data == "account found") {
                window.location.href = "?page=home";
            }
        }
    });
}