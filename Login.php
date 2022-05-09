<?php
    session_start();
    include('config/dbconn.php');
    
    if(isset($_SESSION['auth'])){
        $_SESSION['warning_status'] = "You are already logged in!";
        header('location: Admin/Dashboard.php');
        exit(0);
    }
?>

<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/custom-style.css" />
</head>

<body>
    <div class="app-contant">
        <div class="bg-white">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                        <div class="d-flex align-items-center h-100-vh">
                            <div class="login p-50">
                                <img src="assets/img/logo-admin.png" alt="" width="50%">
                                <p class="mt-2">Welcome back, please login to your account.</p>
                                <form action="loginCode.php" method="POST" class="mt-3 mt-sm-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <?php 
                                            if(isset($_SESSION['auth_status'])){
                                                ?>

                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Hey!</strong> <?php echo $_SESSION['auth_status']; ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <?php
                                                unset($_SESSION['auth_status']);
                                            }
                                            ?>

                                            <?php 
                                            if(isset($_SESSION['logout_status'])){
                                                ?>

                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Hey!</strong> <?php echo $_SESSION['logout_status']; ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <?php
                                                unset($_SESSION['logout_status']);
                                            }
                                            ?>

                                            <?php
                                                include('message.php');
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group" id="show_hide_password">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input type="password" class="form-control"id="password" name="password" placeholder="Password" />
                                                <div class="input-group-append">
                                                    <a href="" class="input-group-text" id="basic-addon2">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-block d-sm-flex  align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Remember Me
                                                    </label>
                                                </div>
                                                <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <!-- <a href="index.html" class="btn btn-primary text-uppercase">Sign In</a> -->
                                            <button type="submit" name="login_btn" class="btn btn-primary text-uppercase">Login</button>
                                        </div>
                                        <div class="col-12  mt-3">
                                            <p>Don't have an account ?<a href="#"> Sign Up</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                        <div class="row align-items-center h-100">
                            <div class="col-7 mx-auto ">
                                <img class="img-fluid" src="assets/img/bg/login.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/vendors.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/custom-app.js"></script>

<script>
    $("#show_hide_password a").on('click', function (event) {
		event.preventDefault();
		if ($('#show_hide_password input').attr("type") == "text") {
			$('#show_hide_password input').attr('type', 'password');
			$('#show_hide_password i').addClass("fa-eye");
			$('#show_hide_password i').removeClass("fa-eye-slash");
		} 				
		else if ($('#show_hide_password input').attr("type") == "password") {
			$('#show_hide_password input').attr('type', 'text');
			$('#show_hide_password i').removeClass("fa-eye");
			$('#show_hide_password i').addClass("fa-eye-slash");
		}
	});
</script>

<?php include('includes/script.php'); ?>