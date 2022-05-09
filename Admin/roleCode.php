<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['role_insert_btn'])){
        $roleName = $_POST['roleName'];
        $roleDescription = $_POST['roleDescription'];
        $modulePermission = $_POST['modulePermission'];
        $moduleSTR = implode(",",$modulePermission);

        $insert_role = "INSERT INTO tblrole(role_name,role_description,page_access,ysnactive) 
                        VALUES('$roleName','$roleDescription','$moduleSTR','1')";
        $run_insert_qry = mysqli_query($conn, $insert_role);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Role has been inserted successfully!";
            header('location: RoleList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddRole.php');
            exit(0);
        } 
    }


    // update
    if(isset($_POST['role_update_btn'])){
        $roleID =  $_POST['roleID'];
        $roleName = $_POST['roleName'];
        $roleDescription = $_POST['roleDescription'];
        $modulePermission = $_POST['modulePermission'];
        $moduleSTR = implode(",",$modulePermission);

        $update_role = "UPDATE tblrole SET role_name='$roleName',role_description='$roleDescription',page_access='$moduleSTR' WHERE id='$roleID'";            
        $run_update_qry = mysqli_query($conn, $update_role);

        if($run_update_qry){
            $_SESSION['success_status'] = "Role has been updated successfully!";
            header('location: RoleList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditRole.php?edit_id='.$roleID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['role_delete_btn'])){
        $role_id = $_POST['delete_role'];
        $ysnactive = $_POST[0];

        $delete_role = "UPDATE tblrole SET ysnactive='$ysnactive' WHERE id='$role_id'";
        $run_delete_qry = mysqli_query($conn, $delete_role);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Role has been deleted successfully!";
            header('location: RoleList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: RoleList.php');
        }
    }

?>