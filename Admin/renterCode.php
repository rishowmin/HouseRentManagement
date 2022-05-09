<?php
    session_start();
    include('../config/dbconn.php');
    include('../authentication.php');

    // insert
    if(isset($_POST['renter_insert_btn'])){
        $renterID = $_POST['renterID'];
        $renterName = $_POST['renterName'];
        $flatNo = $_POST['flatNo'];
        $familyMembers = $_POST['familyMembers'];
        $renterPhone = $_POST['renterPhone'];
        $renterEmail = $_POST['renterEmail'];
        $renterAddress = $_POST['renterAddress'];
        $renterNID = $_POST['renterNID'];
        $renterEntryDate = $_POST['renterEntryDate'];
        $renterLeaveDate = $_POST['renterLeaveDate'];
        $renterActiveStatus = $_POST['renterActiveStatus'];
        //image
        $image = $_FILES['renterImage']['name'];
        if($image != ''){
            $insert_imgfilename = $_FILES['renterImage']['name'];

            $allowed_img_extension = array('png','jpg','jpeg','svg');
            $img_file_extension = pathinfo($image, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$img_file_extension;
            if(!in_array($img_file_extension, $allowed_img_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Renter Image";
                header('location: AddRenter.php');
                exit(0);
            }
        }
        else{
            $insert_imgfilename = '';
        } 
        //document
        $image_docu = $_FILES['renterDocs']['name'];
        if($image_docu != ''){
            $insert_docufilename = $_FILES['renterDocs']['name'];

            $allowed_docu_extension = array('pdf');
            $docu_file_extension = pathinfo($image_docu, PATHINFO_EXTENSION);
            $docufilename = time().'.'.$docu_file_extension;
            if(!in_array($docu_file_extension, $allowed_docu_extension)){
                $_SESSION['failed_status'] = "Please upload only pdf file for Renter Document";
                header('location: AddRenter.php');
                exit(0);
            }
        }
        else{
            $insert_docufilename = '';
        } 


        $insert_renter = "INSERT INTO tblrenter(renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,entry_date,leave_date,renter_status,ysnactive) 
                VALUES('$renterID','$renterName','$flatNo','$familyMembers','$renterPhone','$renterEmail','$renterAddress','$insert_imgfilename','$renterNID','$insert_docufilename','$renterEntryDate','$renterLeaveDate','$renterActiveStatus','1')";

        $run_insert_qry = mysqli_query($conn, $insert_renter);

        if($run_insert_qry){
            move_uploaded_file($_FILES['renterImage']['tmp_name'], '../assets/upload/renter/profile/'.$insert_imgfilename);
            move_uploaded_file($_FILES['renterDocs']['tmp_name'],  '../assets/upload/renter/docu/'.$insert_docufilename);
             $_SESSION['success_status'] = "Renter has been inserted successfully!";
            header('location: RenterList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: AddRenter.php');
            exit(0);
        }   
    }


    // update
    if(isset($_POST['renter_update_btn'])){
        $renterID = $_POST['renterID'];
        $renterName = $_POST['renterName'];
        $flatNo = $_POST['flatNo'];
        $familyMembers = $_POST['familyMembers'];
        $renterPhone = $_POST['renterPhone'];
        $renterEmail = $_POST['renterEmail'];
        $renterAddress = $_POST['renterAddress'];
        $renterNID = $_POST['renterNID'];
        $renterEntryDate = $_POST['renterEntryDate'];
        $renterLeaveDate = $_POST['renterLeaveDate'];
        $renterActiveStatus = $_POST['renterActiveStatus'];

        //image
        $image = $_FILES['renterImage']['name'];
        $oldImage = $_POST['renterOldImage'];
        if($image != ''){
            $update_imgfilename = $_FILES['renterImage']['name'];

            $allowed_img_extension = array('png','jpg','jpeg','svg');
            $img_file_extension = pathinfo($update_imgfilename, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$img_file_extension;
            if(!in_array($img_file_extension, $allowed_img_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Renter Image";
                header('location: EditRenter.php');
                exit(0);
            }
        }
        else{
            $update_imgfilename = $oldImage;
        }   

        //document
        $image_docu = $_FILES['renterDocs']['name'];
        $oldDocu = $_POST['renterOldDocs'];
        if($image_docu != ''){
            $update_docufilename = $_FILES['renterDocs']['name'];

            $allowed_docu_extension = array('pdf');
            $docu_file_extension = pathinfo($update_docufilename, PATHINFO_EXTENSION);
            $docufilename = time().'.'.$docu_file_extension;
            if(!in_array($docu_file_extension, $allowed_docu_extension)){
                $_SESSION['failed_status'] = "Please upload only pdf file for Renter Document";
                header('location: EditRenter.php');
                exit(0);
            }
        }
        else{
            $update_docufilename = $oldDocu;
        }  

        $update_renter = "UPDATE tblrenter SET 
            renter_name='$renterName',flat_no='$flatNo',family_members='$familyMembers',renter_phone='$renterPhone',renter_email='$renterEmail',renter_address='$renterAddress',
            renter_img='$update_imgfilename',renter_nid='$renterNID',renter_doc='$update_docufilename',entry_date='$renterEntryDate',leave_date='$renterLeaveDate',renter_status='$renterActiveStatus' 
            WHERE renter_id='$renterID'";
            
        $run_update_qry = mysqli_query($conn, $update_renter);

        if($run_update_qry){
            if($image != '' || $image_docu != ''){
                move_uploaded_file($_FILES['renterImage']['tmp_name'], '../assets/upload/renter/profile/'.$update_imgfilename);
                move_uploaded_file($_FILES['renterDocs']['tmp_name'],  '../assets/upload/renter/docu/'.$update_docufilename);
            }
            $_SESSION['success_status'] = "Renter has been updated successfully!";
            header('location: RenterList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditRenter.php?edit_id='.$renterID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['renter_delete_btn'])){
        $renter_ID = $_POST['delete_renter'];
        $ysnactive = $_POST[0];

        $delete_renter = "UPDATE tblrenter SET ysnactive='$ysnactive' WHERE renter_id='$renter_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_renter);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Renter has been deleted successfully!";
            header('location: RenterList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: RenterList.php');
        }
    }
?>
