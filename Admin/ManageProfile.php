<?php
    include('../config/dbconn.php');
    include('../authentication.php');
    include('../includes/header.php');
    include('../includes/navbar.php');
    include('../includes/sidebar.php');
?>


<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Manage Profile</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Settings</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Manage Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->

        
        <div class="row">
            <div class="col-xl-12 mb-4">
                <?php
                    include('../message.php');
                ?>
            </div>

            <?php
                if(isset($_SESSION['auth'])){
                    $user_id = $_SESSION['auth_user']['user_id'];
                    $select_user = "SELECT * FROM tbluser WHERE user_id='$user_id' LIMIT 1";
                    $run_select_user = mysqli_query($conn, $select_user);

                    if(mysqli_num_rows($run_select_user) > 0){
                        foreach($run_select_user as $rowUser){
                            $userID = $rowUser['user_id'];
                            $userFName = $rowUser['user_first_name'];
                            $userLName = $rowUser['user_last_name'];
                            $userAddress = $rowUser['user_address'];
                            $userGender = $rowUser['user_gender'];
                            $userDOB = $rowUser['user_dob'];
                            $userBlood = $rowUser['user_blood_group'];
                            $userPhone = $rowUser['user_phone'];
                            $userEmail = $rowUser['user_email'];
                            $userIMG = $rowUser['user_img'];
                            $userUsername = $rowUser['user_username'];
                            $userRole = $rowUser['user_role'];
                            $userFB = $rowUser['user_social_facebook'];
                            $userTW = $rowUser['user_social_twitter'];
                            $userINSTA = $rowUser['user_social_instagram'];
                            $userLN = $rowUser['user_social_linkedin'];
                            $userWA = $rowUser['user_social_whatsapp'];
            ?>

            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 card-heading">
                                <h4 class="card-title"><i class="fa fa-user-circle"></i> Manage Your Profile</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-xl-3 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Profile Picture</h5>
                                    </div>

                                    <div class="page-profil-pic">
                                        <div class="profile-img text-center rounded-circle">
                                            <div class="pt-5">
                                                <form id="manageProfilePicForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="bg-img bg-profile-img m-auto">
                                                        <?php
                                                            if($userIMG !== ""){
                                                        ?>
                                                        <img id="previmg"  src="../assets/upload/user/profile/<?php echo $userIMG; ?>" class="img-fluid" alt="<?php echo $userIMG; ?>" />
                                                        <?php
                                                            }
                                                            else{
                                                                echo "<img id='previmg' class='img-fluid' src='../assets/img/no-img.png' alt='No Image Found!' />";
                                                            }
                                                        ?>
                                                    </div>

                                                    <div class="profile pt-4">
                                                        <h4 class="mb-1"><?php echo $userFName." ".$userLName; ?></h4>
                                                        <p><?php echo $userRole; ?></p>
                                                    </div>
                                                
                                                    <div class="p-4">
                                                        <div class="form-group d-none">
                                                            <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $userID; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="mb-2 input-group">
                                                                <input type="file" class="form-control" id="userIMG" name="userIMG" onchange="loadImage(event)" />
                                                                <input type="hidden" class="form-control" id="userOldIMG" name="userOldIMG" value="<?php echo $userIMG; ?>" />
                                                            </div>
                                                        </div>
                                                    
                                                        <input type="submit" class="btn btn-primary" name="profile_pic_btn" value="Update Profile Pic" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Personal Information</h5>
                                    </div>
                                    <div class="page-personal p-4">
                                        <form id="manageProfilePersonalForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 d-none">
                                                    <label for="userID">User ID</label>
                                                    <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $userID; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userFirstName">First Name</label>
                                                    <input type="text" class="form-control" id="userFirstName" name="userFirstName" value="<?php echo $userFName; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userLastName">Last Name</label>
                                                    <input type="text" class="form-control" id="userLastName" name="userLastName" value="<?php echo $userLName; ?>">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="userAddress">Address</label>
                                                    <textarea class="form-control" id="userAddress" name="userAddress" rows="2" placeholder="User Address"><?php
                                                    echo $userAddress;
                                                    ?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userGender">Gender</label>
                                                    <select class="js-basic-single form-control" id="userGender" name="userGender">
                                                        <option selected hidden><?php echo $userGender; ?></option>
                                                        <option  disabled>--Select Gender--</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userBloodGroup">Blood Group</label>
                                                    <select class="js-basic-single form-control" id="userBloodGroup" name="userBloodGroup">
                                                        <option selected hidden><?php echo $userBlood; ?></option>
                                                        <option disabled>--Select Blood Group--</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="userDOB">Date of Birth</label>
                                                    <div class="input-group date" id="birth-date">
                                                        <input type="text" class="form-control" id="userDOB" name="userDOB" value="<?php echo $userDOB; ?>" placeholder="MM-DD-YYYY" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userPhone">Phone Number</label>
                                                    <input type="text" class="form-control" id="userPhone" name="userPhone" value="<?php echo $userPhone; ?>" data-mask="(+880) 999 999 9999" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="userEmail">Email Address</label>
                                                    <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?php echo $userEmail; ?>" placeholder="User Email Address" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="userUsername">Username</label>
                                                    <input type="text" class="form-control" id="userUsername" name="userUsername" value="<?php echo $userUsername; ?>" placeholder="User Username" />
                                                
                                                </div>
                                            </div>
                                                
                                            <input type="submit" class="btn btn-primary" name="profile_personal_btn" value="Update Information" />
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12 border-t">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Social Links</h5>
                                    </div>

                                    <div class="page-social p-4">
                                        <form id="manageProfileSocialForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group d-none">
                                                <label for="userID">User ID</label>
                                                <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $userID; ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $userFB; ?>" class="btn btn-social bg-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="userFB" name="userFB" value="<?php echo $userFB; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $userTW; ?>" class="btn btn-social bg-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="userTW" name="userTW" value="<?php echo $userTW; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $userINSTA; ?>" class="btn btn-social bg-instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="userINSTA" name="userINSTA" value="<?php echo $userINSTA; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $userLN; ?>" class="btn btn-social bg-linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="userLN" name="userLN" value="<?php echo $userLN; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $userWA; ?>" class="btn btn-social bg-whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="userWA" name="userWA" value="<?php echo $userWA; ?>">
                                                </div>
                                            </div>
                                                
                                            <input type="submit" class="btn btn-primary" name="profile_social_btn" value="Update Social Links" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php
                        }
                    }
                }
            ?>

        </div>



        
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->




<?php include('../includes/script.php'); ?>

<script>
    function loadImage(event){
        var output = document.getElementById('previmg');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php include('../includes/footer.php'); ?>