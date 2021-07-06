// Ajax call for admin login verification
function adminlogin() {
    var adminloginemail = $("#adminloginemail").val();
    var adminloginpass = $("#adminloginpass").val();
    $.ajax({
        url: "Admin/admin.php",
        type: "POST",
        data: {
            adminlogin: "adminlogin",
            adminloginemail: adminloginemail,
            adminloginpass: adminloginpass,
        },
        success: function (data) {
            if (data == 0) {
                $('#adminstatuslog').html("<span class='alert alert-danger'>Invalid Email ID or Password</span>");
            }
            else if (data == 1) {
                window.location.href = "Admin/adminDashboard.php";
            }
        },
    });
}