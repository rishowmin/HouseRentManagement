<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // module insert
    if(isset($_POST['module_insert_btn'])){
        $moduleTitle = $_POST['moduleTitle'];
        $moduleURL = $_POST['moduleURL'];
        $moduleIcon = $_POST['moduleIcon'];
        $moduleType = $_POST['moduleType'];
        $moduleOrder = $_POST['moduleOrder'];
        $isDisplay = $_POST['isDisplay'];

        $insert_module = "INSERT INTO tblpagetemp(page_title,page_url,page_icon,parent_id,created_by,is_display,ysnactive) 
            VALUES ('$moduleTitle','$moduleURL','$moduleIcon','$moduleType','Admin','$isDisplay','1')";

        $run_insert_qry = mysqli_query($conn, $insert_module);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Module has been inserted successfully!";
            header('location: ModuleSettings.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ModuleSettings.php');
            exit(0);
        } 
               
    }



    // module update
    if(isset($_POST['module_update_btn'])){
        $moduleID = $_POST['moduleID'];
        $moduleTitle = $_POST['moduleTitle'];
        $moduleURL = $_POST['moduleURL'];
        $moduleIcon = $_POST['moduleIcon'];
        $moduleType = $_POST['moduleType'];
        $isDisplay = $_POST['isDisplay'];

        $update_module = "UPDATE tblpagetemp SET 
            page_title='$moduleTitle',page_url='$moduleURL',page_icon='$moduleIcon',
            parent_id='$moduleType',is_display='$isDisplay' WHERE id='$moduleID'";
            
        $run_update_qry = mysqli_query($conn, $update_module);

        if($run_update_qry){
            $_SESSION['success_status'] = "Module has been updated successfully!";
            header('location: ModuleSettings.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ModuleSettings.php');
            exit(0);
        }
    }



    // module delete
    if(isset($_POST['module_delete_btn'])){
        $module_ID = $_POST['delete_module'];
        $ysnactive = $_POST[0];

        $delete_module = "UPDATE tblpagetemp SET ysnactive='$ysnactive' WHERE id='$module_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_module);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Module has been deleted successfully!";
            header('location: ModuleSettings.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ModuleSettings.php');
        }
    }



?>