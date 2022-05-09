<?php

    session_start();
    include('../config/dbconn.php');
    // include('../authentication.php');

    if(isset($_POST['checkEmail'])){
        $email = $_POST['email'];
        $checkEmail = "SELECT user_email FROM tbluser WHERE user_email='$email'";
        $run_checkEmail_qry = mysqli_query($conn, $checkEmail);
        if(mysqli_num_rows($run_checkEmail_qry) > 0){
            echo "Email is already exists!";
        }
        else{
            echo "Email is Available!";
        }
    }

    if(isset($_POST['checkUsername'])){
        $username = $_POST['username'];
        $checkUsername = "SELECT user_username FROM tbluser WHERE user_username='$username'";
        $run_checkUsername_qry = mysqli_query($conn, $checkUsername);
        if(mysqli_num_rows($run_checkUsername_qry) > 0){
            echo "Username is already exists!";
        }
        else{
            echo "Username is Available!";
        }
    }

    // insert
    if(isset($_POST['user_insert_btn'])){
        $userID = $_POST['userID'];
        $userFName = $_POST['userFName'];
        $userLName = $_POST['userLName'];
        $userAddress = $_POST['userAddress'];
        $userGender = $_POST['userGender'];
        $userDOB = $_POST['userDOB'];
        $userBloodGroup = $_POST['userBloodGroup'];
        $userPhone = $_POST['userPhone'];
        $userEmail = $_POST['userEmail'];
        $userRole = $_POST['userRole'];
        $username = $_POST['username'];
        //$password = $_POST['password'];
        // $confirmPassword = $_POST['confirmPassword'];
        //$hashPassword = md5($password);
        $userActiveStatus = $_POST['userActiveStatus'];
        //image
        $image = $_FILES['userImage']['name'];
        if($image != ''){
            $insert_imgfilename = $_FILES['userImage']['name'];

            $allowed_img_extension = array('png','jpg','jpeg','svg');
            $img_file_extension = pathinfo($image, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$img_file_extension;
            if(!in_array($img_file_extension, $allowed_img_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Profile Image";
                header('location: AddUser.php');
                exit(0);
            }
        }
        else{
            $insert_imgfilename = '';
        } 


        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            $hashPassword = md5($password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
                $_SESSION['failed_status'] = "Password length at least 8 charecters. For strong password please use at least 1 Uppercase Letter, 1 Lowercase Letter, 1 Number and 1 Special Charecter. (e.g. 'Usr@tst1')";
                header('location: AddUser.php');
                exit(0);
            }
            else{
                if($password == $confirmPassword){
                    $checkEmail = "SELECT user_email FROM tbluser WHERE user_email='$userEmail'";
                    $run_checkEmail_qry = mysqli_query($conn, $checkEmail);
                    if(mysqli_num_rows($run_checkEmail_qry) > 0){
                        $_SESSION['failed_status'] = "Email Already Exists";
                        header('location: AddUser.php');
                        exit(0);
                    }
                    else{
                        if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                            $_SESSION['failed_status'] = "Email is incorrect! (e.g. 'example@example.com')";
                            header('location: AddUser.php');
                            exit(0);
                        }
                        else{
                            $checkUsername = "SELECT * FROM tbluser WHERE user_username='$username'";
                            $run_checkUsername_qry = mysqli_query($conn, $checkUsername);
                            if(mysqli_num_rows($run_checkUsername_qry) > 0){
                                $_SESSION['failed_status'] = "Username Already Exists";
                                header('location: AddUser.php');
                                exit(0);
                            }
                            else{
                                $insert_user = "INSERT INTO tbluser (user_id,user_first_name,user_last_name,user_address,user_gender,user_dob,user_blood_group,user_phone,user_email,user_img,user_role,user_username,user_password,user_status,ysnactive) 
                                VALUES('$userID','$userFName','$userLName','$userAddress','$userGender','$userDOB','$userBloodGroup','$userPhone','$userEmail','$insert_imgfilename','$userRole','$username','$hashPassword','$userActiveStatus','1')";
        
                                $run_insert_qry = mysqli_query($conn, $insert_user);
            
                                if($run_insert_qry){
                                    move_uploaded_file($_FILES['userImage']['tmp_name'], '../assets/upload/user/profile/'.$insert_imgfilename);
                                    $_SESSION['success_status'] = "User has been inserted successfully!";
                                    header('location: UserList.php');
                                    exit(0);
                                }
                                else{
                                    $_SESSION['failed_status'] = "Failed! Try Again.";
                                    header('location: AddUser.php');
                                    exit(0);
                                }
                            }
                        }
                    }
                }
                else{
                    $_SESSION['failed_status'] = "Password does not match.";
                    header('location: AddUser.php');
                    exit(0);
                }         
            }
        }
               
    }


    // update
    if(isset($_POST['user_update_btn'])){
        $userID = $_POST['userID'];
        $userFName = $_POST['userFName'];
        $userLName = $_POST['userLName'];
        $userAddress = $_POST['userAddress'];
        $userGender = $_POST['userGender'];
        $userDOB = $_POST['userDOB'];
        $userBloodGroup = $_POST['userBloodGroup'];
        $userPhone = $_POST['userPhone'];
        $userEmail = $_POST['userEmail'];
        $userRole = $_POST['userRole'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userActiveStatus = $_POST['userActiveStatus'];

        //image
        $image = $_FILES['userImage']['name'];
        $oldImage = $_POST['userOldImage'];
        if($image != ''){
            $update_imgfilename = $_FILES['userImage']['name'];

            $allowed_img_extension = array('png','jpg','jpeg','svg');
            $img_file_extension = pathinfo($update_imgfilename, PATHINFO_EXTENSION);
            $imgfilename = time().'.'.$img_file_extension;
            if(!in_array($img_file_extension, $allowed_img_extension)){
                $_SESSION['failed_status'] = "Please upload only png,jpg,jpeg,svg file for Profile Image";
                header('location: EditUser.php');
                exit(0);
            }
        }
        else{
            $update_imgfilename = $oldImage;
        }

        $update_user = "UPDATE tbluser SET 
            user_first_name='$userFName',user_last_name='$userLName',user_address='$userAddress',user_gender='$userGender',user_dob='$userDOB',user_blood_group='$userBloodGroup',user_phone='$userPhone',user_email='$userEmail',user_img='$update_imgfilename',user_role='$userRole',user_status='$userActiveStatus' WHERE user_id='$userID'";
            
        $run_update_qry = mysqli_query($conn, $update_user);

        if($run_update_qry){
            if($image != ''){
                move_uploaded_file($_FILES['userImage']['tmp_name'], '../assets/upload/user/profile/'.$update_imgfilename);
            }
            $_SESSION['success_status'] = "User has been updated successfully!";
            header('location: UserList.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: EditUser.php?edit_id='.$userID);
            exit(0);
        }
    }



    // delete
    if(isset($_POST['user_delete_btn'])){
        $user_ID = $_POST['delete_user'];
        $ysnactive = $_POST[0];

        $delete_user = "UPDATE tbluser SET ysnactive='$ysnactive' WHERE user_id='$user_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_user);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "User has been deleted successfully!";
            header('location: UserList.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: UserList.php');
        }
    }








?>