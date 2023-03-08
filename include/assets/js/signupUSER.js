function storeUSERdata() {
    var operation = "insert";
    var formdata = $("#signupFRORM").serialize();
    var data = "operation=" + operation + "&" + formdata;
    connect_ajax_signup(data);
}

function connect_ajax_signup(data) {
    $.ajax({
        method: "POST",
        url: 'include/crud/signup.php',
        data: data,
        success: function(data) {
            if (data == "user data Stored") {
                toastr.success("Signup Sucessfull");
                $("#mainFRAME").load("include/body/login.php");
            } else if (data == "user data Store failed") {
                toastr.error("Something Wrong Try again");

            }

        }
    });
}