<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['filter_expense_btn'])){    
        $expenseHeadFilter = $_POST['expenseHeadFilter'];
        $expenseMonthFilter = $_POST['expenseMonthFilter'];
        $fromDateFilter = $_POST['fromDateFilter'];
        $toDateFilter = $_POST['toDateFilter'];

        $select_filter = "SELECT * FROM tblexpense WHERE ysnactive='1'
            AND expense_head='$expenseHeadFilter' 
            AND expense_month='$expenseMonthFilter'
            AND expense_date BETWEEN '$fromDateFilter' AND '$toDateFilter'";

        $run_select_filter_qry = mysqli_query($conn, $select_filter);

        if($run_select_filter_qry){
            $_SESSION['success_status'] = "Rent has been inserted successfully!";
            header('location: ExpenseReport.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ExpenseReport.php');
            exit(0);
        } 
               
    }

?>