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
                        <h1>Change Password</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Settings</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Change Password</li>
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


            <?php
                if(isset($_SESSION['auth'])){
                    $user_id = $_SESSION['auth_user']['user_id'];
                    $select_user = "SELECT * FROM tbluser WHERE user_id='$user_id' LIMIT 1";
                    $run_select_user = mysqli_query($conn, $select_user);

                    if(mysqli_num_rows($run_select_user) > 0){
                        foreach($run_select_user as $rowUser){
                            $userID = $rowUser['user_id'];
            ?>

            <div id="change-password" class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 card-heading">
                                <h4 class="card-title"><i class="fa fa-lock"></i> Change Your Password</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-xl-6 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Old Password</h5>
                                    </div>
                                    <div class="page-personal p-4">
                                        <form id="manageProfilePersonalForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 d-none">
                                                    <label for="userID">User ID</label>
                                                    <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $userID; ?>">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="oldPassword">Old Password</label>
                                                    <div class="input-group" id="show_hide_old_password">
                                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter your old password">
                                                        <div class="input-group-append">
                                                            <a href="" class="input-group-text" id="basic-addon2">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="newPassword">New Password</label>
                                                    <div class="input-group" id="show_hide_new_password">
                                                        <input type="password" class="form-control" id="password" name="newPassword" placeholder="Enter your new password" />
                                                        <div class="input-group-append">
                                                            <a href="" class="input-group-text" id="basic-addon2">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="confirmPassword">Confirm Password</label>
                                                    <div class="input-group" id="show_hide_confirm_password">
                                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password" />
                                                        <div class="input-group-append">
                                                            <a href="" class="input-group-text" id="basic-addon2">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <ul class="pass-strength">
                                                        <li class="password-match-error"></li>
                                                    </ul>
                                                </div>
                                                
                                                <input type="submit" class="btn btn-primary" name="change_password_btn" value="Update Password" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-12 border-t">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Check Your Password Length</h5>
                                    </div>
                                    <div class="page-personal p-4">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
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
</div>


<?php include('../includes/script.php'); ?>

<script>
    function loadLogo(event){
        var output = document.getElementById('prevlogo');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
    function loadIcon(event){
        var output = document.getElementById('previcon');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
    $("#show_hide_old_password a").on('click', function (event) {
		event.preventDefault();
		if ($('#show_hide_old_password input').attr("type") == "text") {
			$('#show_hide_old_password input').attr('type', 'password');
			$('#show_hide_old_password i').addClass("fa-eye");
			$('#show_hide_old_password i').removeClass("fa-eye-slash");
		} 				
		else if ($('#show_hide_old_password input').attr("type") == "password") {
			$('#show_hide_old_password input').attr('type', 'text');
			$('#show_hide_old_password i').removeClass("fa-eye");
			$('#show_hide_old_password i').addClass("fa-eye-slash");
		}
	});

    
    
    $("#show_hide_new_password a").on('click', function (event) {
		event.preventDefault();
		if ($('#show_hide_new_password input').attr("type") == "text") {
			$('#show_hide_new_password input').attr('type', 'password');
			$('#show_hide_new_password i').addClass("fa-eye");
			$('#show_hide_new_password i').removeClass("fa-eye-slash");
		} 				
		else if ($('#show_hide_new_password input').attr("type") == "password") {
			$('#show_hide_new_password input').attr('type', 'text');
			$('#show_hide_new_password i').removeClass("fa-eye");
			$('#show_hide_new_password i').addClass("fa-eye-slash");
		}
	});

    
    
    $("#show_hide_confirm_password a").on('click', function (event) {
		event.preventDefault();
		if ($('#show_hide_confirm_password input').attr("type") == "text") {
			$('#show_hide_confirm_password input').attr('type', 'password');
			$('#show_hide_confirm_password i').addClass("fa-eye");
			$('#show_hide_confirm_password i').removeClass("fa-eye-slash");
		} 				
		else if ($('#show_hide_confirm_password input').attr("type") == "password") {
			$('#show_hide_confirm_password input').attr('type', 'text');
			$('#show_hide_confirm_password i').removeClass("fa-eye");
			$('#show_hide_confirm_password i').addClass("fa-eye-slash");
		}
	});
</script>

<?php include('../includes/footer.php'); ?>