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
                                <li class="breadcrumb-item active text-primary" aria-current="page">User's Info</li>
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
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header d-flex">
                        <div class="col-6 card-heading">
                            <h4 class="card-title">User's Info</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="UserList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">




                    <?php
                        if(isset($_GET['info_id'])){
                            $info_id = $_GET['info_id'];
                            $select_user = "SELECT user_id,user_first_name,user_last_name,user_address,user_gender,DATE_FORMAT(STR_TO_DATE(user_dob, '%Y-%m-%d'), '%d %M %Y') as user_dob,user_blood_group,user_phone,user_email,user_img,user_role,user_username,user_social_facebook,user_social_twitter,user_social_instagram,user_social_linkedin,user_status FROM tbluser WHERE user_id='$info_id' LIMIT 1";
                            $run_select_qry = mysqli_query($conn, $select_user);

                            if(mysqli_num_rows($run_select_qry) > 0){
                                foreach($run_select_qry as $row_user){
                    ?>


                    <div class="row">
                        <div class="col-md-4">        
                            <div class="mb-4 text-center">
                                <?php
                                    if($row_user['user_img'] !== ""){
                                        echo "<img class='info-img' src='../assets/upload/user/profile/";
                                        echo $row_user['user_img'];
                                        echo "' />";
                                    }
                                    else{
                                        echo "<img class='info-img' src='../assets/img/blankimage-white.png' />";
                                    }
                                ?>
                            </div>
                        </div>

                        
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-info table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td width="25%"><h4 class="m-0">User ID</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_id']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">User Name</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_first_name']; ?> <?php echo $row_user['user_last_name']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Address</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_address']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Date of Birth</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_dob']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Blood Group</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_blood_group']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Phone Number</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_phone']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Email</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_email']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Role</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_role']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">Username</h4></td>
                                                    <td><h4 class="m-0"><?php echo $row_user['user_username']; ?></h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4 class="m-0">User Status</h4></td>
                                                    <td>
                                                        <h4 class="m-0">
                                                            <?php
                                                                if($row_user['user_status'] === '1'){
                                                                    echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success'>Active</span>"; 
                                                                }
                                                                else{
                                                                    echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger'>Deactive</span>"; 
                                                                }
                                                            ?>
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
            </div>
        </div>
        <!-- end Validation row  -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->




<?php include('../includes/script.php'); ?>
<?php include('../includes/footer.php'); ?>