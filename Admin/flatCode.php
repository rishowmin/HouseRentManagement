<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['flat_insert_btn'])){
        $flatID = $_POST['flatID'];
        $flatFloor = $_POST['flatFloor'];
        $flatNameEN = $_POST['flatNameEN'];
        $flatNameBN = $_POST['flatNameBN'];
        $flatNO = $_POST['flatNO'];
        $flatDescription = $_POST['flatDescription'];
        $flatActiveStatus = $_POST['flatActiveStatus'];

        $insert_flat = "INSERT INTO tblflat(flat_id,flat_floor,flat_name_en,flat_name_bn,flat_no,flat_description,flat_status,created_by,ysnactive) 
                VALUES('$flatID','$flatFloor','$flatNameEN','$flatNameBN','$flatNO','$flatDescription','$flatActiveStatus','Admin','1')";

        $run_insert_qry = mysqli_query($conn, $insert_flat);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Flat has been inserted successfully!";
            header('location: FlatList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddFlat.php');
            exit(0);
        } 
               
    }



    // update
    if(isset($_POST['flat_update_btn'])){
        $flatID = $_POST['flatID'];
        $flatFloor = $_POST['flatFloor'];
        $flatNameEN = $_POST['flatNameEN'];
        $flatNameBN = $_POST['flatNameBN'];
        $flatNO = $_POST['flatNO'];
        $flatDescription = $_POST['flatDescription'];
        $flatActiveStatus = $_POST['flatActiveStatus'];

        $update_flat = "UPDATE tblflat SET 
            flat_floor='$flatFloor',flat_name_en='$flatNameEN',flat_name_bn='$flatNameBN',flat_no='$flatNO',flat_description='$flatDescription',
            flat_status='$flatActiveStatus',created_by='Admin' WHERE flat_id='$flatID'";
            
        $run_update_qry = mysqli_query($conn, $update_flat);

        if($run_update_qry){
            $_SESSION['success_status'] = "Flat has been updated successfully!";
            header('location: FlatList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditFlat.php?edit_id='.$flatID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['flat_delete_btn'])){
        $flat_ID = $_POST['delete_flat'];
        $ysnactive = $_POST[0];

        $delete_flat = "UPDATE tblflat SET ysnactive='$ysnactive' WHERE flat_id='$flat_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_flat);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Flat has been deleted successfully!";
            header('location: FlatList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: FlatList.php');
        }
    }

?>