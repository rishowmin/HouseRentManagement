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
                                        <h1>User List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">User</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">User List</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <?php
                                    include('../message.php');
                                ?>
                            </div>



                            <div class="col-lg-4">
                                <div class="card card-statistics">
                                    <div class="accordion" id="accordionsimplefill">
                                        <div class="acd-group">
                                            <div class="card-header rounded-0 bg-primary">
                                                <h5 class="mb-0">
                                                    <a href="#collapse1" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse"><i class="fa fa-search"></i> Search</a>
                                                </h5>
                                            </div>
                                            <div id="collapse1" class="collapse" data-parent="#accordionsimplefill">
                                                <div class="card-body">
                                                    <div class="content-body-div">
                                                        <form id="" action="" method="GET" class="form-horizontal"> 
                                                            <div class="row">                                              
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group mb-2">
                                                                            <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" />
                                                                            <button type="submit" class="btn btn-primary btn-square"><i class="fa fa-search"></i></button>
                                                                            <span class="input-hints">Search with User Name / Username / Role / Email / Phone</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card card-statistics">
                                    <div class="accordion" id="accordionsimplefill">
                                        <div class="acd-group">
                                            <div class="card-header rounded-0 bg-primary">
                                                <h5 class="mb-0">
                                                    <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse"><i class="fa fa-filter"></i> Filter</a>
                                                </h5>
                                            </div>
                                            <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                                                <div class="card-body">
                                                    <div class="filter-body-div">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <form id="" action="" method="GET" class="form-horizontal">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="mb-2">
                                                                                            <?php
                                                                                                $roleName_filter = "SELECT DISTINCT role_name FROM tblrole WHERE ysnactive='1'";
                                                                                                $run_roleName_filter = mysqli_query($conn,$roleName_filter);
                                                                                                if(mysqli_num_rows($run_roleName_filter) > 0){
                                                                                            ?>
                                                                                            <select class="form-control" id="role" name="role">
                                                                                                <option selected disabled position>--Select Role--</option>
                                                                                            <?php foreach($run_roleName_filter as $item) { ?>
                                                                                                <option value="<?php echo $item['role_name']; ?>"><?php echo $item['role_name']; ?></option>
                                                                                            <?php } ?>
                                                                                            </select>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <select class="js-basic-single form-control" id="gender" name="gender">
                                                                                                <option selected disabled>--Select Gender--</option>
                                                                                                <option value="Male">Male</option>
                                                                                                <option value="Female">Female</option>
                                                                                                <option value="Others">Others</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <select class="js-basic-single form-control" id="bloodGroup" name="bloodGroup">
                                                                                                <option selected disabled>--Select Blood Group--</option>
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
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <select class="js-basic-single form-control" id="userStatus" name="userStatus">
                                                                                                <option selected disabled>--Select User Status--</option>
                                                                                                <option value="1">Active</option>
                                                                                                <option value="0">Deactive</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="list-imp-btn mb-2 text-right">
                                                                                            <button type="submit" class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Filter"><i class="fa fa-filter"></i></button>
                                                                                            <a href="AddUser.php" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Add New User"><i class="fa fa-plus"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </form>
                                                            
                                                                        <!-- <form id="" action="" method="GET" class="form-horizontal"> -->
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="list-imp-btn mb-2 text-right">
                                                                                            <!-- <a href="../Print.php" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print"><i class="fa fa-print"></i></a> -->
                                                                                            <button onclick="window.print();" name="print" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print"><i class="fa fa-print"></i></button>
                                                                                            <button class="btn btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Genarate PDF" disabled><i class="fa fa-file-pdf-o"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <!-- </form> -->
                                                                    </div>
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="user-list" class="col-lg-12">
                                <div class="row widget-social">

                                    <?php
                                        if(isset($_GET['search'])){
                                            $search_values = $_GET['search'];

                                            $select_user = "SELECT user_id,user_first_name,user_last_name,user_address,user_gender,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_blood_group,user_phone,user_email,user_img,user_role,user_username,user_social_facebook,user_social_twitter,user_social_instagram,user_social_linkedin,user_social_whatsapp,user_status FROM tbluser WHERE CONCAT(user_first_name,user_last_name,user_role,user_email,user_phone,user_username) LIKE '%$search_values%' AND ysnactive='1' ORDER BY id asc";
                                            $run_select_qry = mysqli_query($conn, $select_user);

                                            while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                $userImage = $row_user['user_img'];
                                                $userID = $row_user['user_id'];
                                                $userFName = $row_user['user_first_name'];
                                                $userLName = $row_user['user_last_name'];
                                                $userRole = $row_user['user_role'];
                                                $userPhone = $row_user['user_phone'];
                                                $userEmail = $row_user['user_email'];
                                                $userDOB = $row_user['user_dob'];
                                                $userBlood = $row_user['user_blood_group'];
                                                $userActiveStatus = $row_user['user_status'];
                                                $userFB = $row_user['user_social_facebook'];
                                                $userTW = $row_user['user_social_twitter'];
                                                $userINSTA = $row_user['user_social_instagram'];
                                                $userLIN = $row_user['user_social_linkedin'];
                                                $userWA = $row_user['user_social_whatsapp'];

                                                if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $userID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($userImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/user/profile/";
                                                                            echo $userImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex">
                                                                        <h4 class="mb-1"><?php echo $userFName." ".$userLName; ?></h4>
                                                                        <div class="userStatus-bg">
                                                                            <?php 
                                                                                if($userActiveStatus == '1'){
                                                                            ?>
                                                                            <div class="userStatus-dot active"></div>
                                                                            <?php
                                                                                }
                                                                                else{
                                                                            ?>
                                                                            <div class="userStatus-dot deactive"></div>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-role-section">
                                                                        <p><?php echo $userRole; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="<?php echo $userID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $userID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="user-action-btn">
                                                                    <a href="UserInfo.php?info_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditUser.php?edit_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Date of Birth">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userDOB; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Blood Group">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-droplet"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userBlood; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center pb-4 user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userLIN; ?>" class="btn btn-icon btn-round bg-linkedin-o" target="_blank">
                                                                            <i class="fa fa-linkedin"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
                                                                            <i class="fa fa-whatsapp"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
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

                                        elseif(isset($_GET['role']) || isset($_GET['gender']) || isset($_GET['bloodGroup']) || isset($_GET['userStatus'])){
                                            $fRole = $_GET['role'] ?? null;
                                            $fGender = $_GET['gender'] ?? null;
                                            $fBlood = $_GET['bloodGroup'] ?? null;
                                            $fStatus = $_GET['userStatus'] ?? null;

                                            if($fRole != "" || $fGender != "" || $fBlood != "" || $fStatus != ""){
                                                $select_user = "SELECT user_id,user_first_name,user_last_name,user_address,user_gender,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_blood_group,user_phone,user_email,user_img,user_role,user_username,user_social_facebook,user_social_twitter,user_social_instagram,user_social_linkedin,user_social_whatsapp,user_status FROM tbluser WHERE user_role='$fRole' OR user_gender='$fGender' OR user_blood_group='$fBlood' OR user_status='$fStatus' AND ysnactive='1' ORDER BY id asc";
                                                $run_select_qry = mysqli_query($conn, $select_user);

                                                while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                    $userImage = $row_user['user_img'];
                                                    $userID = $row_user['user_id'];
                                                    $userFName = $row_user['user_first_name'];
                                                    $userLName = $row_user['user_last_name'];
                                                    $userRole = $row_user['user_role'];
                                                    $userPhone = $row_user['user_phone'];
                                                    $userEmail = $row_user['user_email'];
                                                    $userDOB = $row_user['user_dob'];
                                                    $userBlood = $row_user['user_blood_group'];
                                                    $userActiveStatus = $row_user['user_status'];
                                                    $userFB = $row_user['user_social_facebook'];
                                                    $userTW = $row_user['user_social_twitter'];
                                                    $userINSTA = $row_user['user_social_instagram'];
                                                    $userLIN = $row_user['user_social_linkedin'];
                                                    $userWA = $row_user['user_social_whatsapp'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $userID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($userImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/user/profile/";
                                                                            echo $userImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex">
                                                                        <h4 class="mb-1"><?php echo $userFName." ".$userLName; ?></h4>
                                                                        <div class="userStatus-bg">
                                                                            <?php 
                                                                                if($userActiveStatus == '1'){
                                                                            ?>
                                                                            <div class="userStatus-dot active"></div>
                                                                            <?php
                                                                                }
                                                                                else{
                                                                            ?>
                                                                            <div class="userStatus-dot deactive"></div>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-role-section">
                                                                        <p><?php echo $userRole; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="<?php echo $userID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $userID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="user-action-btn">
                                                                    <a href="UserInfo.php?info_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditUser.php?edit_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Date of Birth">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userDOB; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Blood Group">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-droplet"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userBlood; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center pb-4 user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userLIN; ?>" class="btn btn-icon btn-round bg-linkedin-o" target="_blank">
                                                                            <i class="fa fa-linkedin"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
                                                                            <i class="fa fa-whatsapp"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
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
                                        }
                                        
                                        else {
                                            $select_user = "SELECT user_id,user_first_name,user_last_name,user_address,user_gender,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_blood_group,user_phone,user_email,user_img,user_role,user_username,user_social_facebook,user_social_twitter,user_social_instagram,user_social_linkedin,user_social_whatsapp,user_status FROM tbluser WHERE ysnactive='1' ORDER BY id asc";
                                            $run_select_qry = mysqli_query($conn, $select_user);

                                            while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                $userImage = $row_user['user_img'];
                                                $userID = $row_user['user_id'];
                                                $userFName = $row_user['user_first_name'];
                                                $userLName = $row_user['user_last_name'];
                                                $userRole = $row_user['user_role'];
                                                $userPhone = $row_user['user_phone'];
                                                $userEmail = $row_user['user_email'];
                                                $userDOB = $row_user['user_dob'];
                                                $userBlood = $row_user['user_blood_group'];
                                                $userActiveStatus = $row_user['user_status'];
                                                $userFB = $row_user['user_social_facebook'];
                                                $userTW = $row_user['user_social_twitter'];
                                                $userINSTA = $row_user['user_social_instagram'];
                                                $userLIN = $row_user['user_social_linkedin'];
                                                $userWA = $row_user['user_social_whatsapp'];

                                                if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $userID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($userImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/user/profile/";
                                                                            echo $userImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex">
                                                                        <h4 class="mb-1"><?php echo $userFName." ".$userLName; ?></h4>
                                                                        <div class="userStatus-bg">
                                                                            <?php 
                                                                                if($userActiveStatus == '1'){
                                                                            ?>
                                                                            <div class="userStatus-dot active"></div>
                                                                            <?php
                                                                                }
                                                                                else{
                                                                            ?>
                                                                            <div class="userStatus-dot deactive"></div>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-role-section">
                                                                        <p><?php echo $userRole; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="<?php echo $userID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $userID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="user-action-btn">
                                                                    <a href="UserInfo.php?info_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditUser.php?edit_id=<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $userID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Date of Birth">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userDOB; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Blood Group">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-droplet"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $userBlood; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center pb-4 user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userLIN; ?>" class="btn btn-icon btn-round bg-linkedin-o" target="_blank">
                                                                            <i class="fa fa-linkedin"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $userWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
                                                                            <i class="fa fa-whatsapp"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
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


                            <div id="print-report" class="col-lg-12" style="display:none;">
                                <div class="print-logo text-center mb-3">
                                    <img src="../assets/img/logo-admin.png" width="25%" alt="logo" />
                                    <p style="color:#212529;margin-top:8px;font-weight:bold;">House#2445/1, Uttarkhan Mazar Para, Uttarkhan, Dhaka-1230.</p>
                                    <p style="color:#212529;font-weight:bold;">Phone Number: +88018 1986 8985, +88017 1135 5411</p>
                                </div>
                                <div class="report-header text-center mb-3">
                                    <h3 style="border:2px solid #212529;width:fit-content;margin:0 auto;padding:5px;text-transform:uppercase;">User List</h3>
                                    <table class="display compact table table-bordered print-table mt-3">
                                        <thead>                                            
                                            <?php
                                                if(isset($_GET['search'])){                                                        
                                                    $search_values = $_GET['search'];
                                            ?>
                                            <tr>
                                                <th style="width:20%">Search By</th>
                                                <th style="width:80%"><?php echo $search_values; ?></th>
                                            <?php
                                                }
                                                elseif(isset($_GET['role']) || isset($_GET['gender']) || isset($_GET['bloodGroup']) || isset($_GET['userStatus'])){
                                                    $fRole = $_GET['role'] ?? null;
                                                    $fGender = $_GET['gender'] ?? null;
                                                    $fBlood = $_GET['bloodGroup'] ?? null;
                                                    $fStatus = $_GET['userStatus'] ?? null;
                                            ?>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="width:20%">Filter By </th>
                                                <th style="width:20%">Role</th>
                                                <th style="width:20%">Gender</th>
                                                <th style="width:20%">Blood Group</th>
                                                <th style="width:20%">Status</th>
                                            </tr>
                                            <tr>
                                                <th style="width:20%"><?php echo $fRole; ?></th>
                                                <th style="width:20%"><?php echo $fGender; ?></th>
                                                <th style="width:20%"><?php echo $fBlood; ?></th>
                                                <th style="width:20%">
                                                    <?php
                                                        if($fStatus == "0"){
                                                            echo "Deactive";
                                                        }
                                                        else{
                                                            echo "Active";
                                                        }
                                                    ?>
                                                </th>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </thead>
                                    </table>
                                </div>
                                <table class="display compact table table-bordered print-table">
                                    <thead>
                                        <tr>
                                            <th class="bg-print">SL NO</th>
                                            <th class="bg-print">User ID</th>
                                            <th class="bg-print">Name</th>
                                            <th class="bg-print">Date of Birth</th>
                                            <th class="bg-print">Phone</th>
                                            <th class="bg-print">Email</th>
                                            <th class="bg-print">Role</th>
                                            <th class="bg-print">Username</th>
                                            <th class="bg-print">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['search'])){                                                        
                                                $search_values = $_GET['search'];

                                                $counter = 0;
                                                        
                                                $select_user = "SELECT user_id,user_first_name,user_last_name,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_phone,user_email,user_role,user_username,user_status FROM tbluser WHERE CONCAT(user_first_name,user_last_name,user_role,user_email,user_phone,user_username) LIKE '%$search_values%' AND ysnactive='1' ORDER BY id asc";
                                                $run_select_qry = mysqli_query($conn, $select_user);
                                                while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                    $userID = $row_user['user_id'];
                                                    $userFName = $row_user['user_first_name'];
                                                    $userLName = $row_user['user_last_name'];
                                                    $userDOB = $row_user['user_dob'];
                                                    $userPhone = $row_user['user_phone'];
                                                    $userEmail = $row_user['user_email'];
                                                    $userRole = $row_user['user_role'];
                                                    $userUsername = $row_user['user_username'];
                                                    $userStatus = $row_user['user_status'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $userID; ?></td>
                                            <td class="text-center"><?php echo $userFName." ".$userLName; ?></td>
                                            <td class="text-center"><?php echo $userDOB; ?></td>
                                            <td class="text-center"><?php echo $userPhone; ?></td>
                                            <td class="text-center"><?php echo $userEmail; ?></td>
                                            <td class="text-center"><?php echo $userRole; ?></td>
                                            <td class="text-center"><?php echo $userUsername; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($userStatus == "0"){
                                                        echo "Deactive";
                                                    }
                                                    else{
                                                        echo "Active";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            else{
                                        ?>
                                        <tr>
                                            <td>No Records Found.</td>
                                        </tr>
                                        <?php
                                                    }
                                                }
                                            }

                                            elseif(isset($_GET['role']) || isset($_GET['gender']) || isset($_GET['bloodGroup']) || isset($_GET['userStatus'])){
                                                $fRole = $_GET['role'] ?? null;
                                                $fGender = $_GET['gender'] ?? null;
                                                $fBlood = $_GET['bloodGroup'] ?? null;
                                                $fStatus = $_GET['userStatus'] ?? null;

                                                if($fRole != "" || $fGender != "" || $fBlood != "" || $fStatus != ""){
                                                    $counter = 0;
                                                            
                                                    $select_user = "SELECT user_id,user_first_name,user_last_name,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_phone,user_email,user_role,user_username,user_status FROM tbluser WHERE user_role='$fRole' OR user_gender='$fGender' OR user_blood_group='$fBlood' OR user_status='$fStatus' AND ysnactive='1' ORDER BY id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_user);
                                                    while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                        $userID = $row_user['user_id'];
                                                        $userFName = $row_user['user_first_name'];
                                                        $userLName = $row_user['user_last_name'];
                                                        $userDOB = $row_user['user_dob'];
                                                        $userPhone = $row_user['user_phone'];
                                                        $userEmail = $row_user['user_email'];
                                                        $userRole = $row_user['user_role'];
                                                        $userUsername = $row_user['user_username'];
                                                        $userStatus = $row_user['user_status'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $userID; ?></td>
                                            <td class="text-center"><?php echo $userFName." ".$userLName; ?></td>
                                            <td class="text-center"><?php echo $userDOB; ?></td>
                                            <td class="text-center"><?php echo $userPhone; ?></td>
                                            <td class="text-center"><?php echo $userEmail; ?></td>
                                            <td class="text-center"><?php echo $userRole; ?></td>
                                            <td class="text-center"><?php echo $userUsername; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($userStatus == "0"){
                                                        echo "Deactive";
                                                    }
                                                    else{
                                                        echo "Active";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                        }
                                                        else{
                                        ?>
                                        <tr>
                                            <td>No Records Found.</td>
                                        </tr>
                                        <?php
                                                        }
                                                    }
                                                }
                                            }

                                            else{
                                                $counter = 0;

                                                $select_user = "SELECT user_id,user_first_name,user_last_name,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_phone,user_email,user_role,user_username,user_status FROM tbluser WHERE ysnactive='1' ORDER BY id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_user);
                                                while ($row_user = mysqli_fetch_array($run_select_qry)){
                                                    $userID = $row_user['user_id'];
                                                    $userFName = $row_user['user_first_name'];
                                                    $userLName = $row_user['user_last_name'];
                                                    $userDOB = $row_user['user_dob'];
                                                    $userPhone = $row_user['user_phone'];
                                                    $userEmail = $row_user['user_email'];
                                                    $userRole = $row_user['user_role'];
                                                    $userUsername = $row_user['user_username'];
                                                    $userStatus = $row_user['user_status'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $userID; ?></td>
                                            <td class="text-center"><?php echo $userFName." ".$userLName; ?></td>
                                            <td class="text-center"><?php echo $userDOB; ?></td>
                                            <td class="text-center"><?php echo $userPhone; ?></td>
                                            <td class="text-center"><?php echo $userEmail; ?></td>
                                            <td class="text-center"><?php echo $userRole; ?></td>
                                            <td class="text-center"><?php echo $userUsername; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($userStatus == "0"){
                                                        echo "Deactive";
                                                    }
                                                    else{
                                                        echo "Active";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                    }
                                                    else{
                                        ?>
                                        <tr>
                                            <td>No Records Found.</td>
                                        </tr>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->







<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="userCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_user" class="delete_user_id" />
            <p>Are you sure, you want to delete this user?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="user_delete_btn" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
            
                




<?php include('../includes/script.php'); ?>

<script>
    $(document).ready(function(){
        $('.deletebtn').click(function(e){
            e.preventDefault();

            var user_ID = $(this).val();
            
            $('.delete_user_id').val(user_ID);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>