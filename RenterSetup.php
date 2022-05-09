<?php
    include('config/dbconn.php');
    include('authentication.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/sidebar.php');
?>


<?php
    if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $select_renter = "SELECT * FROM tblrenter WHERE renter_id='$edit_id' LIMIT 1";
    $run_select_qry = mysqli_query($conn, $select_renter);

    if(mysqli_num_rows($run_select_qry) > 0){
        foreach($run_select_qry as $row_renter){
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
                        <h1>Renter</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Forms
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Validation</li>
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
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Update Renter</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="renterForm" action="renterCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterID">Renter ID</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterID" name="renterID" value="<?php echo $row_renter['renter_id']; ?>" placeholder="Renter ID" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterName">Renter Name</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterName" name="renterName" value="<?php echo $row_renter['renter_name']; ?>" placeholder="Renter Full Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="familyMembers">Family Members</label>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="familyMembers" name="familyMembers" value="<?php echo $row_renter['family_members']; ?>" placeholder="Renter Family Members" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterPhone">Phone Number</label>
                                        <div class="mb-2">
                                            <input type="tel" class="form-control" id="renterPhone" name="renterPhone" value="<?php echo $row_renter['renter_phone']; ?>" placeholder="Renter Phone Number" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterEmail">Email Address</label>
                                        <div class="mb-2">
                                            <input type="email" class="form-control" id="renterEmail" name="renterEmail" value="<?php echo $row_renter['renter_email']; ?>" placeholder="Renter Email Address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterAddress">Address</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterAddress" name="renterAddress" value="<?php echo $row_renter['renter_address']; ?>" placeholder="Renter Address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterNID">NID</label>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="renterNID" name="renterNID" value="<?php echo $row_renter['renter_nid']; ?>" placeholder="Renter NID" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterImage">Renter Image</label>
                                        <div class="mb-2">
                                            <!-- <input type="date" class="form-control" id="renterImage" name="renterImage" placeholder="Renter Image" /> -->
                                            <input type="file" class="form-control form-control-file" id="renterImage" name="renterImage" value="<?php echo $row_renter['renter_img']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterDocs">Renter Documents</label>
                                        <div class="mb-2">
                                            <!-- <input type="date" class="form-control" id="renterDocs" name="renterDocs" placeholder="Renter Documents" /> -->
                                            <input type="file" class="form-control form-control-file" id="renterDocs" name="renterDocs" value="<?php echo $row_renter['renter_doc']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterEntryDate">Date of Entry</label>
                                        <div class="mb-2">
                                            <input type="date" class="form-control" id="renterEntryDate" name="renterEntryDate" value="<?php echo $row_renter['entry_date']; ?>" placeholder="Renter Date of Entry" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterLeaveDate">Date of Leave</label>
                                        <div class="mb-2">
                                            <input type="date" class="form-control" id="renterLeaveDate" name="renterLeaveDate" value="<?php echo $row_renter['leave_date']; ?>" placeholder="Renter Date of Leave" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterActiveStatus">Active Status</label>
                                        <div class="checkbox checbox-switch switch-primary">
                                            <?php
                                                if($row_renter['renter_status'] === '1'){
                                            ?>
                                                    <label>
                                                        <input type="checkbox" id="renterActiveStatus" name="renterActiveStatus" checked />
                                                        <span></span>
                                                    </label>
                                            <?php
                                                }
                                                else{
                                            ?>
                                                    <label>
                                                        <input type="checkbox" id="renterActiveStatus" name="renterActiveStatus" />
                                                        <span></span>
                                                    </label>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary text-uppercase" name="renter_update_btn" />
                                        <a href="RenterList.php" class="btn btn-warning text-uppercase">Back to List</a>
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


<?php
        }
    }
    else{
        ?>
            
        <?php
    }
}
?>







<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>



                                        

