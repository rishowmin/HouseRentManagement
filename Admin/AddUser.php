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
                        <h1>User</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- start Validation row -->
        <div class="row formavlidation-wrapper">
            <div class="col-md-12 mb-4">
                <?php
                    include('../message.php');
                ?>
            </div>
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header d-flex">
                        <div class="col-6 card-heading">
                            <h4 class="card-title">Add A New User</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="UserList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="userForm" action="userCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                                $select_userID = "SELECT user_id FROM tbluser ORDER BY id desc LIMIT 1";
                                $run_select_qry = mysqli_query($conn, $select_userID);
                                $userID_row = mysqli_fetch_array($run_select_qry);
                                $last_userID = $userID_row['user_id'] ?? 0;
                                if($last_userID == ""){
                                    $userID = "USER1";
                                }
                                else{
                                    $userID = substr($last_userID,4);
                                    $userID = intval($userID);
                                    $userID = "USER" . ($userID + 1);
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="mb-2 input-group justify-content-center">
                                                    <img id="previmg" class="img-preview text-center" src="../assets/img/add-img.png" width="200px" height="200px">
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="userImage">Profile Image</label>
                                                <div class="mb-2 input-group">
                                                    <input type="file" class="form-control form-control-file" id="userImage" name="userImage" onchange="loadImage(event)" />
                                                    <em id="image-match-error" class="error"></em>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="control-label" for="userID">User ID</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $userID; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>                          
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="userActiveStatus">Active Status</label>
                                                <div class="checkbox checbox-switch switch-primary input-group">
                                                    <label>
                                                        <input type="checkbox" id="userActiveStatus" name="userActiveStatus" checked />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userFName">First Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userFName" name="userFName" placeholder="User First Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userLName">Last Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userLName" name="userLName" placeholder="User Last Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="userAddress">Address <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea class="form-control" id="userAddress" name="userAddress" rows="4" placeholder="User Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="userGender">Gender <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select class="js-basic-single form-control" id="userGender" name="userGender">
                                                        <option selected disabled>--Select Gender--</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="userDOB">Date of Birth <span class="text-danger">*</span></label>
                                                <div class="input-group date" id="birth-date">
                                                    <input type="text" class="form-control" id="userDOB" name="userDOB" placeholder="YYYY-MM-DD" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="userBloodGroup">Blood Group</label>
                                                <div class="input-group">
                                                    <select class="js-basic-single form-control" id="userBloodGroup" name="userBloodGroup">
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
                                                <label class="control-label" for="userPhone">Phone Number <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userPhone" name="userPhone" data-mask="(+880) 999 999 9999" placeholder="User Phone Number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userEmail">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control email_id" id="userEmail" name="userEmail" placeholder="User Email Address" />
                                                </div>
                                                <em id="email-match-error" class="error"></em>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userRole">Role <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <?php
                                                        $role_query = "SELECT * FROM tblrole";
                                                        $run_role_query = mysqli_query($conn,$role_query);
                                                        if(mysqli_num_rows($run_role_query) > 0){
                                                    ?>
                                                    <select class="form-control" id="userRole" name="userRole">
                                                        <option selected disabled position>--Select User Role--</option>
                                                    <?php foreach($run_role_query as $item) { ?>
                                                        <option value="<?php echo $item['role_name']; ?>"><?php echo $item['role_name']; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control username" id="username" name="username" placeholder="Username" />
                                                </div>
                                                <em id="username-match-error" class="error"></em>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                                </div>
                                                <ul class="pass-strength mt-2">
                                                    <li class="maxLength"><i class="fa fa-remove mr-2"></i> 8 Charecters Length</li>
                                                    <li class="upCase"><i class="fa fa-remove mr-2"></i> 1 Uppercase Letter (A - Z)</li>
                                                    <li class="oneNumber"><i class="fa fa-remove mr-2"></i> 1 Number (0 - 9)</li>
                                                    <li class="oneSpecial"><i class="fa fa-remove mr-2"></i> 1 Special Charecters (!@#%&*?/)</li>
                                                </ul>
                                                <div class="password-strength mt-3">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar weekLength bg-default" role="progressbar" style="width: 33.33%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar mediamLength bg-default" role="progressbar" style="width: 33.33%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar strongLength bg-default" role="progressbar" style="width: 33.33%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" />
                                                    <!-- <em id="password-match-error" class="error"></em> -->
                                                </div>
                                                <ul class="pass-strength">
                                                    <li class="password-match-error"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="user_insert_btn" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Validation row  -->
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



                                        

