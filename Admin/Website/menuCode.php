<?php

    session_start();
    include('../../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['menu_insert_btn'])){
        $menuId = $_POST['menuId'];
        $menuTitle = $_POST['menuTitle'];
        $menuDescription = $_POST['menuDescription'];
        $menuSlug = $_POST['menuSlug'];
        $menuDisplayPosition = $_POST['menuDisplayPosition'];
        $menuVisibleStatus = $_POST['menuVisibleStatus'];
        $menuActiveStatus = $_POST['menuActiveStatus'];

        $insert_menu = "INSERT INTO tblwebmenu(menu_id,menu_title,menu_description,menu_slug_url,display_position,visible_status,menu_status,ysnactive) 
                VALUES('$menuId','$menuTitle','$menuDescription','$menuSlug','$menuDisplayPosition','$menuVisibleStatus','$menuActiveStatus','1')";

        $run_insert_qry = mysqli_query($conn, $insert_menu);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Menu has been inserted successfully!";
            header('location: MenuList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddMenu.php');
            exit(0);
        } 
               
    }



    // update
    if(isset($_POST['flat_update_btn'])){
        $flatNo = $_POST['flatNo'];
        $flatFloor = $_POST['flatFloor'];
        $flatDescription = $_POST['flatDescription'];
        $flatActiveStatus = $_POST['flatActiveStatus'];

        $update_flat = "UPDATE tblflat SET 
            flat_no='$flatNo',flat_floor='$flatFloor',flat_description='$flatDescription',
            flat_status='$flatActiveStatus' WHERE flat_no='$flatNo'";
            
        $run_update_qry = mysqli_query($conn, $update_flat);

        if($run_update_qry){
            $_SESSION['success_status'] = "Flat has been updated successfully!";
            header('location: FlatList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditFlat.php?edit_id='.$flatNo);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['flat_delete_btn'])){
        $flat_No = $_POST['delete_flat'];
        $ysnactive = $_POST[0];

        $delete_flat = "UPDATE tblflat SET ysnactive='$ysnactive' WHERE flat_no='$flat_No'";
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