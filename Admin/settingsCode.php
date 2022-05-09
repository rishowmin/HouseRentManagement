<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');



    // update business logo & icon
    if(isset($_POST['business_logo_icon_btn'])){
        $businessID = $_POST['businessID'];
        $businessLogo = $_FILES['businessLogo']['name'];
        $businessOldLogo = $_POST['businessOldLogo'];
        $businessIcon = $_FILES['businessIcon']['name'];
        $businessOldIcon = $_POST['businessOldIcon'];
        
        if($businessLogo != ''){
            $update_logo = $_FILES['businessLogo']['name'];

            $allowed_logo_extension = array('png','jpg','jpeg','svg');
            $logo_file_extension = pathinfo($update_logo, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$logo_file_extension;
            if(!in_array($logo_file_extension, $allowed_logo_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Profile Image";
                header('location: ManageProfile.php');
                exit(0);
            }
        }
        else{
            $update_logo = $businessOldLogo;
        }
        
        if($businessIcon != ''){
            $update_icon = $_FILES['businessIcon']['name'];

            $allowed_icon_extension = array('png','jpg','jpeg','svg');
            $icon_file_extension = pathinfo($update_icon, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$icon_file_extension;
            if(!in_array($icon_file_extension, $allowed_icon_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Profile Image";
                header('location: ManageProfile.php');
                exit(0);
            }
        }
        else{
            $update_icon = $businessOldIcon;
        }

        $update_business = "UPDATE tblbusinesssettings SET business_logo='$update_logo',business_icon='$update_icon' WHERE id='$businessID'";
            
        $run_update_qry = mysqli_query($conn, $update_business);

        if($run_update_qry){
            if($businessLogo != ''){
                move_uploaded_file($_FILES['businessLogo']['tmp_name'], '../assets/upload/business/'.$update_logo);
            }
            if($businessIcon != ''){
                move_uploaded_file($_FILES['businessIcon']['tmp_name'], '../assets/upload/business/'.$update_icon);
            }
            $_SESSION['success_status'] = "Your Business Logo & Icon has been updated successfully!";
            header('location: BusinessSettings.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: BusinessSettings.php');
            exit(0);
        }
    }
    

    // update business information
    if(isset($_POST['business_information_btn'])){
        $businessID = $_POST['businessID'];
        $businessTitleEN = $_POST['businessTitleEN'];
        $businessTitleBN = $_POST['businessTitleBN'];
        $businessSloganEN = $_POST['businessSloganEN'];
        $businessSloganBN = $_POST['businessSloganBN'];
        $businessTypeLong = $_POST['businessTypeLong'];
        $businessTypeShort = $_POST['businessTypeShort'];
        $businessAddress = $_POST['businessAddress'];
        $businessCity = $_POST['businessCity'];
        $businessState = $_POST['businessState'];
        $businessCountry = $_POST['businessCountry'];
        $businessZipCode = $_POST['businessZipCode'];
        $businessEmail = $_POST['businessEmail'];
        $businessPhone = $_POST['businessPhone'];

        $update_business = "UPDATE tblbusinesssettings SET 
            business_title_en='$businessTitleEN',business_title_bn='$businessTitleBN',business_slogan_en='$businessSloganEN',business_slogan_bn='$businessSloganBN',business_type_long='$businessTypeLong',business_type_short='$businessTypeShort',business_address='$businessAddress',business_city='$businessCity',business_state='$businessState',business_country='$businessCountry',business_zipCode='$businessZipCode',business_email='$businessEmail',business_phone='$businessPhone' WHERE id='$businessID'";
            
        $run_update_qry = mysqli_query($conn, $update_business);

        if($run_update_qry){
            $_SESSION['success_status'] = "Your Business Information has been updated successfully!";
            header('location: BusinessSettings.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: BusinessSettings.php');
            exit(0);
        }
    }
    

    // update business social links
    if(isset($_POST['business_social_btn'])){
        $businessID = $_POST['businessID'];
        $businessFB = $_POST['businessFB'];
        $businessInsta = $_POST['businessInsta'];
        $businessWA = $_POST['businessWA'];
        $businessYT = $_POST['businessYT'];

        $update_business = "UPDATE tblbusinesssettings SET 
            business_social_facebook='$businessFB',business_social_instagram='$businessInsta',business_social_whatsapp='$businessWA',business_social_youtube='$businessYT' WHERE id='$businessID'";
            
        $run_update_qry = mysqli_query($conn, $update_business);

        if($run_update_qry){
            $_SESSION['success_status'] = "Your Business Social Links has been updated successfully!";
            header('location: BusinessSettings.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: BusinessSettings.php');
            exit(0);
        }
    }


    // update profile picture
    if(isset($_POST['profile_pic_btn'])){
        $userID = $_POST['userID'];
        $userIMG = $_FILES['userIMG']['name'];
        $userOldIMG = $_POST['userOldIMG'];
        if($userIMG != ''){
            $update_propic = $_FILES['userIMG']['name'];

            $allowed_img_extension = array('png','jpg','jpeg','svg');
            $img_file_extension = pathinfo($update_propic, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$img_file_extension;
            if(!in_array($img_file_extension, $allowed_img_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Profile Image";
                header('location: ManageProfile.php');
                exit(0);
            }
        }
        else{
            $update_propic = $userOldIMG;
        }

        $update_user = "UPDATE tbluser SET user_img='$update_propic' WHERE user_id='$userID'";
            
        $run_update_qry = mysqli_query($conn, $update_user);

        if($run_update_qry){
            if($userIMG != ''){
                move_uploaded_file($_FILES['userIMG']['tmp_name'], '../assets/upload/user/profile/'.$update_propic);
            }
            $_SESSION['success_status'] = "Your Profile Picture has been updated successfully!";
            header('location: ManageProfile.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ManageProfile.php');
            exit(0);
        }
    }


    // update personal information
    if(isset($_POST['profile_personal_btn'])){
        $userID = $_POST['userID'];
        $userFName = $_POST['userFirstName'];
        $userLName = $_POST['userLastName'];
        $userAddress = $_POST['userAddress'];
        $userGender = $_POST['userGender'];
        $userDOB = $_POST['userDOB'];
        $userBlood = $_POST['userBloodGroup'];
        $userPhone = $_POST['userPhone'];
        $userEmail = $_POST['userEmail'];
        $userUsername = $_POST['userUsername'];

        $update_profile = "UPDATE tbluser SET 
            user_first_name='$userFName',user_last_name='$userLName',user_address='$userAddress',user_gender='$userGender',user_dob='$userDOB',user_blood_group='$userBlood',user_phone='$userPhone',user_email='$userEmail',user_username='$userUsername' WHERE user_id='$userID'";
            
        $run_update_profile = mysqli_query($conn, $update_profile);

        if($run_update_profile){
            $_SESSION['success_status'] = "Your Personal Information has been updated successfully!";
            header('location: ManageProfile.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ManageProfile.php');
            exit(0);
        }
    }

    
    // update social links
    if(isset($_POST['profile_social_btn'])){
        $userID = $_POST['userID'];
        $userFB = $_POST['userFB'];
        $userTW = $_POST['userTW'];
        $userINSTA = $_POST['userINSTA'];
        $userLN = $_POST['userLN'];
        $userWA = $_POST['userWA'];

        $update_profile = "UPDATE tbluser SET 
            user_social_facebook='$userFB',user_social_twitter='$userTW',user_social_instagram='$userINSTA',user_social_linkedin='$userLN',user_social_whatsapp='$userWA' WHERE user_id='$userID'";
            
        $run_update_profile = mysqli_query($conn, $update_profile);

        if($run_update_profile){
            $_SESSION['success_status'] = "Your Social Links has been updated successfully!";
            header('location: ManageProfile.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: ManageProfile.php');
            exit(0);
        }
    }

    
    // update password
    if(isset($_POST['change_password_btn'])){
        $userID = $_POST['userID'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $oldPassHash = md5($oldPassword);
        $newPassHash = md5($newPassword);

        $select_user_password = "SELECT user_password FROM tbluser WHERE user_id='$userID'";
        $run_select_user_password = mysqli_query($conn, $select_user_password);
        
        while($rowUserPass = mysqli_fetch_array($run_select_user_password)){
            $lastPassword = $rowUserPass['user_password'];

            if($lastPassword == $oldPassHash){
                if(isset($_POST['newPassword'])) {
                    // $password = $_POST['password'];
                    // $confirmPassword = $_POST['confirmPassword'];
                    $uppercase = preg_match('@[A-Z]@', $newPassword);
                    $lowercase = preg_match('@[a-z]@', $newPassword);
                    $number    = preg_match('@[0-9]@', $newPassword);
                    $specialChars = preg_match('@[^\w]@', $newPassword);
        
                    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newPassword) < 8){
                        $_SESSION['failed_status'] = "Password length at least 8 charecters. For strong password please use at least 1 Uppercase Letter, 1 Lowercase Letter, 1 Number and 1 Special Charecter. (e.g. 'Usr@tst1')";
                        header('location: ChangePassword.php');
                        exit(0);
                    }
                    else{
                        if($newPassword == $confirmPassword){
                            $update_password = "UPDATE tbluser SET user_password='$newPassHash' WHERE user_id='$userID'";            
                            $run_update_password = mysqli_query($conn, $update_password);
                        
                            if($run_update_password){
                                $_SESSION['success_status'] = "Password has been updated successfully!";
                                header('location: ChangePassword.php');
                                exit(0);
                            }
                            else{
                                $_SESSION['failed_status'] = "Failed! Try Again.";
                                header('location: ChangePassword.php');
                                exit(0);
                            }
                        }
                        else{
                            $_SESSION['failed_status'] = "New password is not matching!";
                            header('location: ChangePassword.php');
                            exit(0);
                        }                        
                    }
                }
            }
            else{
                $_SESSION['failed_status'] = "Old password is incorrect!";
                header('location: ChangePassword.php');
                exit(0);
            }
        }

        
    

        // $run_select_password = mysqli_query($conn, $select_password);
        // while ($row_user = mysqli_fetch_array($run_select_password)){
        //     $userPassword = $row_user['user_password'];
        //     $lastPassword = md5($userPassword);

        //     if($oldPassword === $lastPassword){
        //         $hashNewPassword = md5($newPassword);
    
        //         $update_password = "UPDATE tbluser SET user_password='$hashNewPassword' WHERE user_id='$userID'";            
        //         $run_update_password = mysqli_query($conn, $update_password);
    
        //         if($run_update_password){
        //             $_SESSION['success_status'] = "Password has been updated successfully!";
        //             header('location: ChangePassword.php');
        //             exit(0);
        //         }
        //         else{
        //             $_SESSION['failed_status'] = "Failed! Try Again.";
        //             header('location: ChangePassword.php');
        //             exit(0);
        //         }
        //     }
        //     else{
        //         $_SESSION['failed_status'] = "Wrong Password!";
        //         header('location: ChangePassword.php');
        //         exit(0);
        //     }
        // }
    }

?>