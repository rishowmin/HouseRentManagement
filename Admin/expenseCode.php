<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['expense_insert_btn'])){
        $expenseID = $_POST['expenseID'];
        $expenseInvoiceNo = $_POST['invoiceNo'];
        $expenseHead = $_POST['expenseHead'];
        $expenseAmount = $_POST['expenseAmount'];
        $expenseMonth = $_POST['expenseMonth'];
        $expenseDate = $_POST['expenseDate'];
        $expenseBy = $_POST['expenseBy'];
        $expenseDescription = $_POST['expenseDescription'];


        $insert_expense = "INSERT INTO tblexpense(expense_id,e_invoice_no,expense_head,expense_amount,expense_month,expense_date,expense_by,expense_description,ysnactive) 
                VALUES('$expenseID','$expenseInvoiceNo','$expenseHead','$expenseAmount','$expenseMonth','$expenseDate','$expenseBy','$expenseDescription','1')";

        $run_insert_qry = mysqli_query($conn, $insert_expense);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Expense has been inserted successfully!";
            header('location: ExpenseList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddExpense.php');
            exit(0);
        } 
               
    }



    // update
    if(isset($_POST['expense_update_btn'])){
        $expenseID = $_POST['expenseID'];
        $expenseHead = $_POST['expenseHead'];
        $expenseAmount = $_POST['expenseAmount'];
        $expenseMonth = $_POST['expenseMonth'];
        $expenseDate = $_POST['expenseDate'];
        $expenseBy = $_POST['expenseBy'];
        $expenseDescription = $_POST['expenseDescription'];

        $update_expense = "UPDATE tblexpense SET 
            expense_head='$expenseHead',expense_amount='$expenseAmount',expense_month='$expenseMonth',
            expense_date='$expenseDate',expense_by='$expenseBy',expense_description='$expenseDescription' 
            WHERE expense_id='$expenseID'";
            
        $run_update_qry = mysqli_query($conn, $update_expense);

        if($run_update_qry){
            $_SESSION['success_status'] = "Expense has been updated successfully!";
            header('location: ExpenseList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditExpense.php?edit_id='.$expenseID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['expense_delete_btn'])){
        $expense_id = $_POST['delete_expense'];
        $ysnactive = $_POST[0];

        $delete_expense = "UPDATE tblexpense SET ysnactive='$ysnactive' WHERE expense_id='$expense_id'";
        $run_delete_qry = mysqli_query($conn, $delete_expense);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Expense has been deleted successfully!";
            header('location: ExpenseList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ExpenseList.php');
        }
    }

?>