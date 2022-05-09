<?php

    session_start();
    include('config/dbconn.php');

    if(isset($_POST['login_btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashPassword = md5($password);

        $login_query = "SELECT * FROM tbluser WHERE user_username='$username' AND user_password='$hashPassword' LIMIT 1";
        $run_login_qry = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($run_login_qry) > 0){
            foreach($run_login_qry as $rowLogin){
                $u_id = $rowLogin['id'];
                $user_id = $rowLogin['user_id'];
                $user_first_name = $rowLogin['user_first_name'];
                $user_last_name = $rowLogin['user_last_name'];
                $user_address = $rowLogin['user_address'];
                $user_gender =  $rowLogin['user_gender'];
                $user_dob = $rowLogin['user_dob'];
                $user_blood_group = $rowLogin['user_blood_group'];
                $user_phone = $rowLogin['user_phone'];
                $user_email = $rowLogin['user_email'];
                $user_img = $rowLogin['user_img'];
                $user_role = $rowLogin['user_role'];
                $user_username = $rowLogin['user_username'];
                $user_social_facebook = $rowLogin['user_social_facebook'];
                $user_social_twitter = $rowLogin['user_social_twitter'];
                $user_social_instagram = $rowLogin['user_social_instagram'];
                $user_social_linkedin = $rowLogin['user_social_linkedin'];
                $user_social_whatsapp = $rowLogin['user_social_whatsapp'];
            }

            $_SESSION['auth'] = "$user_role";
            $_SESSION['auth_user'] = [
                'id' => $u_id,
                'user_id' => $user_id,
                'user_first_name' => $user_first_name,
                'user_last_name' => $user_last_name,
                'user_address' => $user_address,
                'user_gender' => $user_gender,
                'user_dob' => $user_dob,
                'user_blood_group' => $user_blood_group,
                'user_phone' => $user_phone,
                'user_email' => $user_email,
                'user_img' => $user_img,
                'user_username' => $user_username,
                'user_social_facebook' => $user_social_facebook,
                'user_social_twitter' => $user_social_twitter,
                'user_social_instagram' => $user_social_instagram,
                'user_social_linkedin' => $user_social_linkedin,
                'user_social_whatsapp' => $user_social_whatsapp,
            ];

            if($user_role == "Admin"){
                $_SESSION['success_status'] = "Logged In Successfully!";
                header('location: Admin/Dashboard.php');
                exit(0);
            }
            elseif($user_role == "Manager"){
                $_SESSION['success_status'] = "Logged In Successfully!";
                header('location: Manager/Dashboard.php');
                exit(0);
            }
            elseif($user_role == "Renter"){
                $_SESSION['success_status'] = "Logged In Successfully!";
                header('location: Renter/Dashboard.php');
                exit(0);
            }
        }
        else{
            $_SESSION['failed_status'] = "Invalid Email or Password";
            header('location: Login.php');
            exit(0);
        }
    }
    else{
        $_SESSION['failed_status'] = "Login Failed!";
        header('location: Login.php');
        exit(0);
    }


?>