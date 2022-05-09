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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update User</li>
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
                            <h4 class="card-title">Update User</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="UserList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="renterForm" action="userCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row">
                            <?php
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];
                                        $select_user = "SELECT * FROM tbluser WHERE user_id='$edit_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_user);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_user){
                                                ?>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <!-- <label class="control-label" for="userImage">Image Preview</label> -->
                                                <div class="mb-2 input-group justify-content-center">
                                                <?php
                                                    if($row_user['user_img'] !== ""){
                                                ?>
                                                <img id="previmg" class="img-preview mb-2" src="../assets/upload/user/profile/<?php echo $row_user['user_img']; ?>" width="200px" height="200px" alt="<?php echo $row_user['user_img']; ?>">
                                                <?php
                                                    }
                                                    else{
                                                        echo "<img id='previmg' class='img-preview' src='../assets/img/no-img.png' height='200px' width='200px' />";
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="userImage">Profile Image</label>
                                                <div class="mb-2 input-group">
                                                    <input type="file" class="form-control" id="userImage" name="userImage" onchange="loadImage(event)" />
                                                    <input type="hidden" class="form-control" id="userOldImage" name="userOldImage" value="<?php echo $row_user['user_img']; ?>" />
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
                                                    <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $row_user['user_id']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="userActiveStatus">Active Status</label>
                                                <div class="checkbox checbox-switch switch-primary input-group">
                                                    <?php
                                                        if($row_user['user_status'] === '1'){
                                                    ?>
                                                    <label>
                                                        <input type="checkbox" id="userActiveStatus" name="userActiveStatus" checked />
                                                        <span></span>
                                                    </label>
                                                    <?php
                                                        }
                                                        else{
                                                    ?>
                                                    <label>
                                                        <input type="checkbox" id="userActiveStatus" name="userActiveStatus" />
                                                        <span></span>
                                                    </label>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userFName">First Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userFName" name="userFName" value="<?php echo $row_user['user_first_name']; ?>" placeholder="User First Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userLName">Last Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userLName" name="userLName" value="<?php echo $row_user['user_last_name']; ?>" placeholder="User Last Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="userAddress">Address <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea class="form-control" id="userAddress" name="userAddress" rows="4" placeholder="User Address"><?php
                                                    echo $row_user['user_address'];
                                                    ?></textarea>
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
                                                        <option selected hidden><?php echo $row_user['user_gender']; ?></option>
                                                        <option  disabled>--Select Gender--</option>
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
                                                    <input type="text" class="form-control" id="userDOB" name="userDOB" value="<?php echo $row_user['user_dob']; ?>" placeholder="MM-DD-YYYY" />
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
                                                        <option selected hidden><?php echo $row_user['user_blood_group']; ?></option>
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userPhone">Phone Number <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="userPhone" name="userPhone" value="<?php echo $row_user['user_phone']; ?>" data-mask="(+880) 999 999 9999" placeholder="Usr Phone Number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="userEmail">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?php echo $row_user['user_email']; ?>" placeholder="User Email Address" readonly />
                                                </div>
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
                                                        <option disabled>--Select User Role--</option>
                                                    <?php foreach($run_role_query as $item) { ?>
                                                        <option value="<?php echo $item['role_name']; ?>" <?php echo $row_user['user_role'] == $item['role_name'] ? 'selected':'' ?>><?php echo $item['role_name']; ?></option>
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
                                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row_user['user_username']; ?>" placeholder="User Username" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h4>No Record Found.</h4>";
                                        }
                                    }
                                ?>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="user_update_btn" />
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



                                        

