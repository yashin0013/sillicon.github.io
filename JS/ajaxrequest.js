// for modal 
$(document).ready(function () {
    $("#stuemail").on("keypress blur", function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: 'Student/addstudent.php',
            type: 'POST',
            data: {
                checkmail: "checkmail",
                stuemail: stuemail,
            },
            success: function (data) {
                if (data != 0) {
                    $("#Msg2").html('<span class="text-danger">Email Id Already Used</span>');
                    $("#signup").attr("disabled", true);
                }
                else if (data == 0 && reg.test(stuemail)) {
                    $("#Msg2").html('<span class="text-success">There You Go!</span>');
                    $("#signup").attr("disabled", false);
                }
                else if (!reg.test(stuemail)) {
                    $("#Msg2").html('<span class="text-danger">Enter Valid Email eg. example@mail.com</span>');
                    $("#signup").attr("disabled", false);
                }
                if (stuemail == "") {
                    $("#Msg2").html('<span class="text-danger">Please Enter Your Email</span>');
                }
            },
        });
    });
});

// For page 
$(document).ready(function () {
    $("#stu_email").on("keypress blur", function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stu_email").val();
        $.ajax({
            url: 'Student/addstudent.php',
            type: 'POST',
            data: {
                checkmail: "checkmail",
                stuemail: stuemail,
            },
            success: function (data) {
                if (data != 0) {
                    $("#Msg-2").html('<span class="text-danger">Email Id Already Used</span>');
                    $("#sign_up").attr("disabled", true);
                }
                else if (data == 0 && reg.test(stuemail)) {
                    $("#Msg-2").html('<span class="text-success">There You Go!</span>');
                    $("#sign_up").attr("disabled", false);
                }
                else if (!reg.test(stuemail)) {
                    $("#Msg-2").html('<span class="text-danger">Enter Valid Email eg. example@mail.com</span>');
                    $("#sign_up").attr("disabled", false);
                }
                if (stuemail == "") {
                    $("#Msg-2").html('<span class="text-danger">Please Enter Your Email</span>');
                }
            },
        });
    });
});

// From Modal 
function addStu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // Checking Form fields 
    if (stuname.trim() == "") {
        $("#Msg1").html('<span class="text-danger">Please Enter Your Name</span>');
        $("#stuname").focus();
        return false;
    }
    else if (stuemail.trim() == "") {
        $("#Msg2").html('<span class="text-danger">Please Enter Your Email</span>');
        $("#stuemail").focus();
        return false;
    }
    else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#Msg2").html('<span class="text-danger">Enter Valid Email eg. example@mail.com</span>');
        $("#stuemail").focus();
        return false;
    }
    else if (stupass.trim() == "") {
        $("#Msg3").html('<span class="text-danger">Please Enter Password</span>');
        $("#stupass").focus();
        return false;
    }
    else {
        $.ajax({
            url: "Student/addstudent.php",
            type: "POST",
            dataType: "json",
            data: {
                signup: "signup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successfull</span>");
                    clearform();
                }
                else if (data == "Failed") {
                    $('#successMsg').html("<span class='alert alert-danger'>Unable Register</span>");
                }
            },
        });
    }
}

// clear signup form after registration 
function clearform() {
    $("#stuform").trigger("reset");
    $("#Msg1").html("");
    $("#Msg2").html("");
    $("#Msg3").html("");
}

//  For Page
function add_Stu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stu_name").val();
    var stuemail = $("#stu_email").val();
    var stupass = $("#stu_pass").val();

    // Checking Form fields 
    if (stuname.trim() == "") {
        $("#Msg-1").html('<span class="text-danger">Please Enter Your Name</span>');
        $("#stu_name").focus();
        return false;
    }
    else if (stuemail.trim() == "") {
        $("#Msg-2").html('<span class="text-danger">Please Enter Your Email</span>');
        $("#stu_email").focus();
        return false;
    }
    else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#Msg-2").html('<span class="text-danger">Enter Valid Email eg. example@mail.com</span>');
        $("#stu_email").focus();
        return false;
    }
    else if (stupass.trim() == "") {
        $("#Msg-3").html('<span class="text-danger">Please Enter Password</span>');
        $("#stu_pass").focus();
        return false;
    }
    else {
        $.ajax({
            url: "Student/addstudent.php",
            type: "POST",
            dataType: "json",
            data: {
                signup: "signup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $('#success_Msg').html("<span class='alert alert-success'>Registration Successfull</span>");
                    clearform();
                }
                else if (data == "Failed") {
                    $('#success_Msg').html("<span class='alert alert-danger'>Unable Register</span>");
                }
            },
        });
    }
}

// clear signup form after registration 
function clearform() {
    $("#stu_form").trigger("reset");
    $("#Msg-1").html("");
    $("#Msg-2").html("");
    $("#Msg-3").html("");
}

// Ajax call for student login on Modal verification
function stulogin() {
    var loginemail = $("#loginemail").val();
    var loginpass = $("#loginpass").val();
    $.ajax({
        url: "Student/addstudent.php",
        type: "POST",
        data: {
            login: "login",
            loginemail: loginemail,
            loginpass: loginpass,
        },
        success: function (data) {
            if (data == 0) {
                $('#statuslog').html("<span class='alert alert-danger'>Invalid Email ID or Password</span>");
            }
            else if (data == 1) {
                window.location.href = "index.php";
            }
        },
    });
}
// Ajax call for student login on Page(loginsignup) verification
function stu_login() {
    var loginemail = $("#login_email").val();
    var loginpass = $("#login_pass").val();
    $.ajax({
        url: "Student/addstudent.php",
        type: "POST",
        data: {
            login: "login",
            loginemail: loginemail,
            loginpass: loginpass,
        },
        success: function (data) {
            if (data == 0) {
                $('#status_log').html("<span class='alert alert-danger'>Invalid Email ID or Password</span>");
            }
            else if (data == 1) {
                window.location.href = "index.php";
            }
        },
    });
}