
<?php include 'adminlogmodal.php'; ?>

<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2021 || Designed & Developed By Yashin Khan || 
        <?php
        // session_start();
        if (isset($_SESSION['admin_login']) && $_SESSION['admin_login'] = true) {
            echo '<a href="partials/logout.php" class="text-light"> Admin Logout</a>';
        }
        else {
            
            echo '<a href="#" class="text-light" data-toggle="modal" data-target="#adminloginModal">Admin Login</a>';
            // echo '<a href="adminlogout.php" class="text-light"> Admin Logout</a>';
        }
        ?>
        </small>
    </footer>

       <!-- Boot Javascript and jQuery -->
       <!-- <script src="JS/jQuery.js"></script> -->
    <script src="JS/popper.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
        </script>

    <!-- Font awesome Javascript -->
    <script src="JS/all.min.js"></script>
    
    <!-- ajax request Javascript -->
    <script src="JS/ajaxrequest.js"></script>
    <script src="JS/adminajax.js"></script>
</body>

</html>