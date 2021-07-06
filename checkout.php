<?php
  // include db 
  include 'partials/dbconnect.php'; 
  session_start();
  if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='loginsignup.php';</script>";
  }
  $stuEmail = $_SESSION['loginemail'];
  header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Font awesome Css  -->
    <link rel="stylesheet" href="CSS/all.min.css">

    <!-- Google font  -->
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <!-- Custom Css  -->
    <link rel="stylesheet" href="CSS/style.css">

    <title>Check Out Page</title>
    
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-3 text-center">Checkout Page</h3>
                <form action="./PaytmKit/pgRedirect.php" method="post">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER ID</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                                autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Student_Email" class="col-sm-4 col-form-label">Student Email</label>
                        <div class="col-sm-8">
                            <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off"
                                value="<?php if(isset($stuEmail)) echo $stuEmail; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Amount" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                            <input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT"
                                value="<?php if (isset($_POST['id'])) {echo $_POST['id'];} ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="Amount" class="col-sm-4 col-form-label">INDUSTRY_TYPE_ID</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12"
                                name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="Amount" class="col-sm-4 col-form-label">Channel</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID"
                                autocomplete="off" value="WEB">
                        </div>
                    </div>
                    <div class="text-left">
                        <input value="CheckOut" class="btn btn-primary" type="submit" onclick="">
                        <a href="courses.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Boot Javascript and jQuery -->
    <script src="JS/jQuery.js"></script>
    <script src="JS/popper.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

    <!-- Font awesome Javascript -->
    <script src="JS/all.min.js"></script>

     
    <!-- ajax request Javascript -->
    <script src="JS/ajaxrequest.js"></script>

</body>

</html>