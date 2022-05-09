<?php

    session_start();
    include('../config/dbconn.php');
    include('../authentication.php');

    if(isset($_POST['logout_btn'])){
        //session_destroy();
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);

        $_SESSION['success_status'] = "Logged Out Successfully!";
        header('location: ../Login.php');
        exit(0);
    }

?>