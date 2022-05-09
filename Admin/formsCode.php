<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['form_insert_btn'])){
        $formTitle = $_POST['formTitle'];
        $formContent = $_POST['formContent'];
        $formType = $_POST['formType'];
        $formLanguage = $_POST['formLanguage'];

        $insert_form = "INSERT INTO tblforms(form_title,form_content,form_type,form_language,created_by,ysnactive) 
                        VALUES ('$formTitle','$formContent','$formType','$formLanguage','Admin','1')";

        $run_insert_qry = mysqli_query($conn, $insert_form);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Form has been inserted successfully!";
            header('location: FormList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddForm.php');
            exit(0);
        } 
               
    }



    // delete
    if(isset($_POST['form_delete_btn'])){
        $form_ID = $_POST['delete_form'];
        $ysnactive = $_POST[0];

        $delete_form = "UPDATE tblforms SET ysnactive='$ysnactive' WHERE id='$form_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_form);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Form has been deleted successfully!";
            header('location: FormList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: FormList.php');
        }
    }

?>