<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    // insert
    if(isset($_POST['rent_insert_btn'])){
        $rentID = $_POST['rentID'];
        $rentInvoiceNo = $_POST['invoiceNo'];
        $renterNameId = $_POST['renterNameId'];
        $rentMonth = $_POST['rentMonth'];
        $rentDate = $_POST['rentDate'];
        $rentReceivedBy = $_POST['rentReceivedBy'];
        $rentActual = $_POST['rentActual'];
        $rentServiceCharge = $_POST['rentServiceCharge'];
        $rentTotal = $_POST['rentTotal'];

        $rentBillID = $_POST['rentBillID'];
        $rbInvoiceNo = $_POST['rbInvoiceNo'];

        $insert_rent = "INSERT INTO tblrent(rent_id,r_invoice_no,renter_id,rent_month,rent_date,rent_actual,rent_service_charge,rent_total,received_by,r_type,ysnactive) 
            VALUES('$rentID','$rentInvoiceNo','$renterNameId','$rentMonth','$rentDate','$rentActual','$rentServiceCharge','$rentTotal','$rentReceivedBy','Rent','1')";

        $run_insert_qry_rent = mysqli_query($conn, $insert_rent);

        if($run_insert_qry_rent){
            $insert_rentbill = "INSERT INTO tblrentbills(rentbill_id,renter_id,rentbill_month,rb_invoice_no,rent_id,ysnactive) 
                VALUES('$rentBillID','$renterNameId','$rentMonth','$rbInvoiceNo','$rentID','1')";  
            $run_insert_qry_rentbill = mysqli_query($conn, $insert_rentbill);            

            if($run_insert_qry_rentbill){
                $_SESSION['success_status'] = "Rent has been inserted successfully!";
                header('location: RentList.php');
                exit(0);
            }
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddRent.php');
            exit(0);
        } 
               
    }



    // update
    if(isset($_POST['rent_update_btn'])){
        $rentID = $_POST['rentID'];
        $rentInvoiceNo = $_POST['invoiceNo'];
        $renterNameId = $_POST['renterNameId'];
        $rentMonth = $_POST['rentMonth'];
        $rentDate = $_POST['rentDate'];
        $rentReceivedBy = $_POST['rentReceivedBy'];
        $rentActual = $_POST['rentActual'];
        $rentServiceCharge = $_POST['rentServiceCharge'];
        $rentTotal = $_POST['rentTotal'];

        $update_rent = "UPDATE tblrent SET 
            renter_id='$renterNameId',rent_month='$rentMonth',rent_date='$rentDate',received_by='$rentReceivedBy',
            rent_actual='$rentActual',rent_service_charge='$rentServiceCharge',rent_total='$rentTotal'
            WHERE rent_id='$rentID'";
            
        $run_update_qry_rent = mysqli_query($conn, $update_rent);

        if($run_update_qry_rent){
            $update_rentbill = "UPDATE tblrentbills SET 
            renter_id='$renterNameId',rentbill_month='$rentMonth' WHERE rent_id='$rentID'";            
            $run_update_qry_rentbill = mysqli_query($conn, $update_rentbill);

            if($run_update_qry_rentbill){
                $_SESSION['success_status'] = "Rent has been updated successfully!";
                header('location: RentList.php');
                exit(0);
            }
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditRent.php?edit_id='.$rentID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['rent_delete_btn'])){
        $rent_id = $_POST['delete_rent'];
        $ysnactive = $_POST[0];

        $delete_rent = "UPDATE tblrent SET ysnactive='$ysnactive' WHERE rent_id='$rent_id'";
        $run_delete_qry = mysqli_query($conn, $delete_rent);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Rent has been deleted successfully!";
            header('location: RentList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: RentList.php');
        }
    }

?>