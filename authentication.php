<?php

    session_start();
    include('config/dbconn.php');

    if(!isset($_SESSION['auth'])){
        $_SESSION['auth_status'] = "Please, Login to Access!";
        header('location: Login.php');
        exit(0);
    }
    else{
        if($_SESSION['auth'] == "Admin"){
            
        }
        elseif($_SESSION['auth'] == "Manager"){
            
        }
        elseif($_SESSION['auth'] == "Renter"){
            
        }
        else{
            $_SESSION['warning_status'] = "You are not authorized as Admin!";
            header('location: Login.php');
            exit(0);
        }
    }


?>