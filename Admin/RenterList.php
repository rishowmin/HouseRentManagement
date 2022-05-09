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
                                        <h1>Renter List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Renter</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Renter List</li>
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


                            <!-- Search Option Start -->
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
                                                                        <div class="mb-2 input-group">
                                                                            <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="RENTER (ID/Name/Email/Phone/Flat No)" />
                                                                        </div>
                                                                    </div>                                                 
                                                                </div>   
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="mb-2 input-group">
                                                                            <button type="submit" class="btn btn-primary btn-square text-uppercase m-auto" data-toggle="tooltip" data-placement="top" data-original-title="Search">Search</button>
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
                            <!-- Search Option End -->

                            <!-- Filter Option Start -->
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
                                                                                                    $renterNID_filter = "SELECT DISTINCT renter_nid FROM tblrenter WHERE ysnactive='1'";
                                                                                                    $run_renterNID_filter = mysqli_query($conn,$renterNID_filter);
                                                                                                    if(mysqli_num_rows($run_renterNID_filter) > 0){
                                                                                                ?>
                                                                                                <select class="form-control" id="rNID" name="rNID">
                                                                                                    <option selected disabled position>--Select Renter NID--</option>
                                                                                                <?php foreach($run_renterNID_filter as $item) { ?>
                                                                                                    <option value="<?php echo $item['renter_nid']; ?>"><?php echo $item['renter_nid']; ?></option>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <div class="mb-2">
                                                                                                <?php
                                                                                                    $renterStatus_filter = "SELECT DISTINCT renter_status FROM tblrenter WHERE ysnactive='1'";
                                                                                                    $run_renterStatus_filter = mysqli_query($conn,$renterStatus_filter);
                                                                                                    if(mysqli_num_rows($run_renterStatus_filter) > 0){
                                                                                                ?>
                                                                                                <select class="form-control" id="rStatus" name="rStatus">
                                                                                                    <option selected disabled position>--Select Renter Status--</option>
                                                                                                <?php foreach($run_renterStatus_filter as $item) { ?>
                                                                                                    <option value="<?php echo $item['renter_status']; ?>">
                                                                                                        <?php 
                                                                                                            if($item['renter_status'] == "0"){
                                                                                                                echo "Deactive";
                                                                                                            }
                                                                                                            else{
                                                                                                                echo "Active";
                                                                                                            }
                                                                                                        ?>
                                                                                                    </option>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">                               
                                                                                            <div class="mb-2 input-group date" id="from-date">
                                                                                                <input type="text" class="form-control" id="fromDate" name="fromDate" value="<?php if(isset($_GET['fromDate'])){ echo $_GET['fromDate']; } ?>" placeholder="From Date" />
                                                                                                <span class="input-group-addon">
                                                                                                    <i class="fa fa-calendar"></i>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <div class="mb-2 input-group date" id="to-date">
                                                                                                <input type="text" class="form-control" id="toDate" name="toDate" value="<?php if(isset($_GET['toDate'])){ echo $_GET['toDate']; } ?>" placeholder="To Date" />
                                                                                                <span class="input-group-addon">
                                                                                                    <i class="fa fa-calendar"></i>
                                                                                                </span>
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
                                                                                                <a href="AddRenter.php" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Add New Renter"><i class="fa fa-plus"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                            </form>
                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="list-imp-btn mb-2 text-right">
                                                                                        <button onclick="window.print();" name="print" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print"><i class="fa fa-print"></i></button>
                                                                                        <button class="btn btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Genarate PDF" disabled><i class="fa fa-file-pdf-o"></i></button>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Filter Option End -->

                            <div id="renter-list" class="col-lg-12">
                                <div class="row">

                                    <?php
                                        if(isset($_GET['search'])){
                                            $search_values = $_GET['search'];

                                            $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE CONCAT(renter_id,renter_name,renter_email,renter_phone,flat_no) LIKE '%$search_values%' AND ysnactive='1' ORDER BY id asc";
                                            $run_select_qry = mysqli_query($conn, $select_renter);
                                            while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                $renterImage = $row_renter['renter_img'];
                                                $renterID = $row_renter['renter_id'];
                                                $renterName = $row_renter['renter_name'];
                                                $renterPhone = $row_renter['renter_phone'];
                                                $renterEmail = $row_renter['renter_email'];
                                                $renterFlatNO = $row_renter['flat_no'];
                                                $renterFamily = $row_renter['family_members'];
                                                $renterNID = $row_renter['renter_nid'];
                                                $renterActiveStatus = $row_renter['renter_status'];
                                                $renterEntryDate = $row_renter['entry_date'];
                                                $renterFB = $row_renter['renter_social_facebook'];
                                                $renterTW = $row_renter['renter_social_twitter'];
                                                $renterINSTA = $row_renter['renter_social_instagram'];
                                                $renterWA = $row_renter['renter_social_whatsapp'];

                                                if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $renterID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($renterImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/renter/profile/";
                                                                            echo $renterImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="mb-1"><?php echo $renterName; ?></h4>
                                                                    <?php 
                                                                        if($renterActiveStatus == '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-success'>Active</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-danger'>Deactive</span>"; 
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="<?php echo $renterID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $renterID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="renter-action-btn">
                                                                    <a href="RenterInfo.php?info_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditRenter.php?edit_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Flat NO">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-layout"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFlatNO; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Family Members">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-users"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFamily; ?> person(s)</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="NID Number">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-credit-card"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterNID; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Entry Date">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEntryDate; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
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

                                        elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['rNID']) || isset($_GET['rStatus'])){
                                            $rNID = $_GET['rNID'] ?? null;
                                            $rStatus = $_GET['rStatus'] ?? null;
                                            $fromDate = $_GET['fromDate'] ?? null;
                                            $toDate = $_GET['toDate'] ?? null;

                                            if(($fromDate != "" && $toDate != "") || ($rNID != "") || ($rStatus != "")){

                                                $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE entry_date BETWEEN '$fromDate' AND '$toDate' OR renter_nid='$rNID' OR renter_status='$rStatus' AND ysnactive='1' ORDER BY id asc";
                                                $run_select_qry = mysqli_query($conn, $select_renter);
                                                while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                    $renterImage = $row_renter['renter_img'];
                                                    $renterID = $row_renter['renter_id'];
                                                    $renterName = $row_renter['renter_name'];
                                                    $renterPhone = $row_renter['renter_phone'];
                                                    $renterEmail = $row_renter['renter_email'];
                                                    $renterFlatNO = $row_renter['flat_no'];
                                                    $renterFamily = $row_renter['family_members'];
                                                    $renterNID = $row_renter['renter_nid'];
                                                    $renterActiveStatus = $row_renter['renter_status'];
                                                    $renterEntryDate = $row_renter['entry_date'];
                                                    $renterFB = $row_renter['renter_social_facebook'];
                                                    $renterTW = $row_renter['renter_social_twitter'];
                                                    $renterINSTA = $row_renter['renter_social_instagram'];
                                                    $renterWA = $row_renter['renter_social_whatsapp'];
        
                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $renterID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($renterImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/renter/profile/";
                                                                            echo $renterImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="mb-1"><?php echo $renterName; ?></h4>
                                                                    <?php 
                                                                        if($renterActiveStatus == '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-success'>Active</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-danger'>Deactive</span>"; 
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="<?php echo $renterID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $renterID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="renter-action-btn">
                                                                    <a href="RenterInfo.php?info_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditRenter.php?edit_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Flat NO">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-layout"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFlatNO; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Family Members">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-users"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFamily; ?> person(s)</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="NID Number">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-credit-card"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterNID; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Entry Date">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEntryDate; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
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

                                        else{
                                            $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE ysnactive='1' ORDER BY id asc";
                                            $run_select_qry = mysqli_query($conn, $select_renter);
                                            while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                $renterImage = $row_renter['renter_img'];
                                                $renterID = $row_renter['renter_id'];
                                                $renterName = $row_renter['renter_name'];
                                                $renterPhone = $row_renter['renter_phone'];
                                                $renterEmail = $row_renter['renter_email'];
                                                $renterFlatNO = $row_renter['flat_no'];
                                                $renterFamily = $row_renter['family_members'];
                                                $renterNID = $row_renter['renter_nid'];
                                                $renterActiveStatus = $row_renter['renter_status'];
                                                $renterEntryDate = $row_renter['entry_date'];
                                                $renterFB = $row_renter['renter_social_facebook'];
                                                $renterTW = $row_renter['renter_social_twitter'];
                                                $renterINSTA = $row_renter['renter_social_instagram'];
                                                $renterWA = $row_renter['renter_social_whatsapp'];
    
                                                if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="accordion" id="accordionsimplefill">
                                            <div class="card mb-4 acd-group">
                                                <div class="card-header bg-primary rounded-0">
                                                    <h5 class="mb-0">
                                                        <a href="#<?php echo $renterID; ?>" class="btn-block text-white text-left acd-heading custom-accordion collapsed" data-toggle="collapse">
                                                            <div class="media widget-social-contant align-items-center">
                                                                <div class="bg-img mr-3">
                                                                    <?php
                                                                        if($renterImage !== ""){
                                                                            echo "<img class='img-fluid user-img' src='../assets/upload/renter/profile/";
                                                                            echo $renterImage;
                                                                            echo "' />";
                                                                        }
                                                                        else{
                                                                            echo "<img class='img-fluid user-img' src='../assets/img/blankimage.png' />";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="mb-1"><?php echo $renterName; ?></h4>
                                                                    <?php 
                                                                        if($renterActiveStatus == '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-success'>Active</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark text-danger'>Deactive</span>"; 
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="<?php echo $renterID; ?>" class="collapse" data-parent="#accordionsimplefill">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="user-id">
                                                                    <h4><?php echo $renterID; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="renter-action-btn">
                                                                    <a href="RenterInfo.php?info_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                    <a href="EditRenter.php?edit_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                    <button type="button" value="<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12 pl-2 pr-2">
                                                                <ul class="nav user-nav-details d-block">
                                                                    <li class="nav-item" title="Flat NO">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-layout"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFlatNO; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Family Members">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-users"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterFamily; ?> person(s)</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Email">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-mail"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEmail; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Phone">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-phone"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterPhone; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="NID Number">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-credit-card"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterNID; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li class="nav-item" title="Entry Date">
                                                                        <div class="media nav-link align-items-center justify-content-between">
                                                                            <h5 class="mb-0"><i class="fe fe-calendar"></i></h5>
                                                                            <h5 class="mb-0"><?php echo $renterEntryDate; ?></h5>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <ul class="nav justify-content-center user-social-nav">
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterFB; ?>" class="btn btn-icon btn-round bg-facebook-o" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterTW; ?>" class="btn btn-icon btn-round bg-twitter-o" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterINSTA; ?>" class="btn btn-icon btn-round bg-instagram-o" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="<?php echo $renterWA; ?>" class="btn btn-icon btn-round bg-whatsapp-o" target="_blank">
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
                                    <h3 style="border:2px solid #212529;width:fit-content;margin:0 auto;padding:5px;text-transform:uppercase;">Renter List</h3>
                                    <table class="display compact table table-bordered print-table mt-3">
                                        <thead>                                            
                                            <?php
                                                if(isset($_GET['search'])){                                                        
                                                    $search_values = $_GET['search'];
                                            ?>
                                            <tr>
                                                <th style="width:25%">Search By</th>
                                                <th style="width:75%"><?php echo $search_values; ?></th>
                                            <?php
                                                }
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['rNID']) || isset($_GET['rStatus'])){
                                                    $rNID = $_GET['rNID'] ?? null;
                                                    $rStatus = $_GET['rStatus'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
                                            ?>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="width:25%">Filter By </th>
                                                <th style="width:25%">Entry Date</th>
                                                <th style="width:25%">Renter NID</th>
                                                <th style="width:25%">Renter Status</th>
                                            </tr>
                                            <tr>
                                                <th style="width:25%"><?php echo $fromDate; ?> - <?php echo $toDate; ?></th>
                                                <th style="width:25%"><?php echo $rNID; ?></th>
                                                <th style="width:25%">
                                                    <?php
                                                        if($rStatus == "0"){
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
                                            <th class="bg-print">Renter ID</th>
                                            <th class="bg-print">Name</th>
                                            <th class="bg-print">Flat NO</th>
                                            <th class="bg-print">Email</th>
                                            <th class="bg-print">Phone</th>
                                            <th class="bg-print">NID</th>
                                            <th class="bg-print">Entry Date</th>
                                            <th class="bg-print">Leave Date</th>
                                            <th class="bg-print">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['search'])){                                                        
                                                $search_values = $_GET['search'];

                                                $counter = 0;
                                                        
                                                $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE CONCAT(renter_id,renter_name,renter_email,renter_phone,flat_no) LIKE '%$search_values%' AND ysnactive='1' ORDER BY id asc";
                                                $run_select_qry = mysqli_query($conn, $select_renter);
                                                while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                    $renterID = $row_renter['renter_id'];
                                                    $renterName = $row_renter['renter_name'];
                                                    $renterFlatNO = $row_renter['flat_no'];
                                                    $renterEmail = $row_renter['renter_email'];
                                                    $renterPhone = $row_renter['renter_phone'];
                                                    $renterNID = $row_renter['renter_nid'];
                                                    $renterEntryDate = $row_renter['entry_date'];
                                                    $renterLeaveDate = $row_renter['leave_date'];
                                                    $renterActiveStatus = $row_renter['renter_status'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?></td>
                                            <td class="text-center"><?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $renterFlatNO; ?></td>
                                            <td class="text-center"><?php echo $renterEmail; ?></td>
                                            <td class="text-center"><?php echo $renterPhone; ?></td>
                                            <td class="text-center"><?php echo $renterNID; ?></td>
                                            <td class="text-center"><?php echo $renterEntryDate; ?></td>
                                            <td class="text-center"><?php echo $renterLeaveDate; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($renterActiveStatus == "0"){
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
                                            
                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['rNID']) || isset($_GET['rStatus'])){
                                                $rNID = $_GET['rNID'] ?? null;
                                                $rStatus = $_GET['rStatus'] ?? null;
                                                $fromDate = $_GET['fromDate'] ?? null;
                                                $toDate = $_GET['toDate'] ?? null;
    
                                                if(($fromDate != "" && $toDate != "") || ($rNID != "") || ($rStatus != "")){
                                                    $counter = 0;
    
                                                    $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE entry_date BETWEEN '$fromDate' AND '$toDate' OR renter_nid='$rNID' OR renter_status='$rStatus' AND ysnactive='1' ORDER BY id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_renter);
                                                    while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                        $renterID = $row_renter['renter_id'];
                                                        $renterName = $row_renter['renter_name'];
                                                        $renterFlatNO = $row_renter['flat_no'];
                                                        $renterEmail = $row_renter['renter_email'];
                                                        $renterPhone = $row_renter['renter_phone'];
                                                        $renterNID = $row_renter['renter_nid'];
                                                        $renterEntryDate = $row_renter['entry_date'];
                                                        $renterLeaveDate = $row_renter['leave_date'];
                                                        $renterActiveStatus = $row_renter['renter_status'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?></td>
                                            <td class="text-center"><?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $renterFlatNO; ?></td>
                                            <td class="text-center"><?php echo $renterEmail; ?></td>
                                            <td class="text-center"><?php echo $renterPhone; ?></td>
                                            <td class="text-center"><?php echo $renterNID; ?></td>
                                            <td class="text-center"><?php echo $renterEntryDate; ?></td>
                                            <td class="text-center"><?php echo $renterLeaveDate; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($renterActiveStatus == "0"){
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
    
                                                $select_renter = "SELECT renter_id,renter_name,flat_no,family_members,renter_phone,renter_email,renter_address,renter_img,renter_nid,renter_doc,DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date,DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date,renter_social_facebook,renter_social_twitter,renter_social_instagram,renter_social_whatsapp,renter_status,ysnactive FROM tblrenter WHERE ysnactive='1' ORDER BY id asc";
                                                $run_select_qry = mysqli_query($conn, $select_renter);
                                                while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                    $renterID = $row_renter['renter_id'];
                                                    $renterName = $row_renter['renter_name'];
                                                    $renterFlatNO = $row_renter['flat_no'];
                                                    $renterEmail = $row_renter['renter_email'];
                                                    $renterPhone = $row_renter['renter_phone'];
                                                    $renterNID = $row_renter['renter_nid'];
                                                    $renterEntryDate = $row_renter['entry_date'];
                                                    $renterLeaveDate = $row_renter['leave_date'];
                                                    $renterActiveStatus = $row_renter['renter_status'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?></td>
                                            <td class="text-center"><?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $renterFlatNO; ?></td>
                                            <td class="text-center"><?php echo $renterEmail; ?></td>
                                            <td class="text-center"><?php echo $renterPhone; ?></td>
                                            <td class="text-center"><?php echo $renterNID; ?></td>
                                            <td class="text-center"><?php echo $renterEntryDate; ?></td>
                                            <td class="text-center"><?php echo $renterLeaveDate; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($renterActiveStatus == "0"){
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
      <form action="renterCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_renter" class="delete_renter_id" />
            <p>Are you sure, you want to delete this renter?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="renter_delete_btn" class="btn btn-danger">Delete</button>
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

            var renter_ID = $(this).val();
            
            $('.delete_renter_id').val(renter_ID);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>