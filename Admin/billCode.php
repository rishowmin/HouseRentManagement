<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['bill_insert_btn'])){
        $billID = $_POST['billID'];
        $billInvoiceNo = $_POST['invoiceNo'];
        $renterNameId = $_POST['renterNameId'];
        $billMonth = $_POST['billMonth'];
        $billDate = $_POST['billDate'];
        $billReceivedBy = $_POST['billReceivedBy'];
        $billElectricity = $_POST['billElectricity'];
        $billGas = $_POST['billGas'];
        $billWater = $_POST['billWater'];
        $billInternet = $_POST['billInternet'];
        $billTotal = $_POST['billTotal'];

        // $rentBillID = $_POST['rentBillID'];
        // $rbInvoiceNo = $_POST['rbInvoiceNo'];


        $insert_bill = "INSERT INTO tblbills(bill_id,b_invoice_no,renter_id,bill_month,bill_date,bill_electricity,bill_gas,bill_water,bill_internet,bill_total,received_by,b_type,ysnactive) 
                VALUES('$billID','$billInvoiceNo','$renterNameId','$billMonth','$billDate','$billElectricity','$billGas','$billWater','$billInternet','$billTotal','$billReceivedBy','Utility Bill','1')";

        $run_insert_qry_bill = mysqli_query($conn, $insert_bill);

        // if($run_insert_qry_bill){
        //     $_SESSION['success_status'] = "Bills has been inserted successfully!";
        //     header('location: BillList.php');
        //     exit(0);
        // }
        if($run_insert_qry_bill){
            $select_rentbill = "SELECT * FROM tblrentbills WHERE renter_id='$renterNameId' AND rentbill_month='$billMonth'";  
            $run_select_qry_rentbill = mysqli_query($conn, $select_rentbill);                    

            if($run_select_qry_rentbill){
                $update_rentbill = "UPDATE tblrentbills SET 
                    bill_id='$billID' WHERE  renter_id='$renterNameId' AND rentbill_month='$billMonth'";
                $run_update_qry_rentbill = mysqli_query($conn, $update_rentbill);                  

                if($run_update_qry_rentbill){
                    $_SESSION['success_status'] = "Bills has been inserted successfully!";
                    header('location: BillList.php');
                    exit(0);
                }                
            }
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddBill.php');
            exit(0);
        } 
               
    }



    // update
    if(isset($_POST['bill_update_btn'])){
        $billID = $_POST['billID'];
        $billInvoiceNo = $_POST['invoiceNo'];
        $renterNameId = $_POST['renterNameId'];
        $billMonth = $_POST['billMonth'];
        $billDate = $_POST['billDate'];
        $billReceivedBy = $_POST['billReceivedBy'];
        $billElectricity = $_POST['billElectricity'];
        $billGas = $_POST['billGas'];
        $billWater = $_POST['billWater'];
        $billInternet = $_POST['billInternet'];
        $billTotal = $_POST['billTotal'];

        $update_bill = "UPDATE tblbills SET 
            renter_id='$renterNameId',bill_month='$billMonth',bill_date='$billDate',received_by='$billReceivedBy',
            bill_electricity='$billElectricity',bill_gas='$billGas',bill_water='$billWater',bill_internet='$billInternet',
            bill_total='$billTotal' WHERE bill_id='$billID'";
            
        $run_update_qry = mysqli_query($conn, $update_bill);

        if($run_update_qry){
            $update_rentbill = "UPDATE tblrentbills SET 
            renter_id='$renterNameId',rentbill_month='$billMonth' WHERE bill_id='$billID'";            
            $run_update_qry_rentbill = mysqli_query($conn, $update_rentbill);

            if($run_update_qry_rentbill){
                $_SESSION['success_status'] = "Bills has been updated successfully!";
                header('location: BillList.php');
                exit(0);
            }
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditBill.php?edit_id='.$billID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['bill_delete_btn'])){
        $bill_id = $_POST['delete_bill'];
        $ysnactive = $_POST[0];

        $delete_bill = "UPDATE tblbills SET ysnactive='$ysnactive' WHERE bill_id='$bill_id'";
        $run_delete_qry = mysqli_query($conn, $delete_bill);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Bill has been deleted successfully!";
            header('location: BillList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: BillList.php');
        }
    }

?>