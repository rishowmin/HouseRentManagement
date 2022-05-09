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
                        <h1>Rent</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Rent</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update Rent</li>
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
                            <h4 class="card-title">Update Rent</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RentList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="rentForm" action="rentCode.php" method="post" class="form-horizontal">
                            <div class="row">
                            <?php
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];
                                        $select_rent = "SELECT * FROM tblrent WHERE rent_id='$edit_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_rent);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_rent){
                                                ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentID">Rent ID</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="rentID" name="rentID" value="<?php echo $row_rent['rent_id']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="invoiceNo">Invoice No</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" value="<?php echo $row_rent['r_invoice_no']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="renterNameId">Renter Name</label>
                                                <div class="mb-2">
                                                    <?php
                                                        $renter_query = "SELECT * FROM tblrenter WHERE renter_status='1' AND ysnactive='1'";
                                                        $run_renter_query = mysqli_query($conn,$renter_query);
                                                        if(mysqli_num_rows($run_renter_query) > 0){
                                                    ?>
                                                    <select class="form-control" id="renterNameId" name="renterNameId">
                                                        <!-- <option selected hidden><?php echo $row_rent['renter_id']; ?></option> -->
                                                        <option selected disabled>--Select Renter--</option>
                                                    <?php foreach($run_renter_query as $item) { ?>
                                                        <option value="<?php echo $item['renter_id']; ?>" <?php echo $row_rent['renter_id'] == $item['renter_id'] ? 'selected':'' ?>><?php echo $item['renter_id']; ?> - <?php echo $item['renter_name']; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentMonth">The Month of Rent</label>
                                                <div class="mb-2 input-group date" id="rent-month">
                                                    <input type="text" class="form-control" id="rentMonth" name="rentMonth" value="<?php echo $row_rent['rent_month']; ?>" placeholder="Month Year" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentDate">Date of Rent</label>
                                                <div class="mb-2 input-group date" id="rent-date">
                                                    <input type="text" class="form-control" id="rentDate" name="rentDate" value="<?php echo $row_rent['rent_date']; ?>" placeholder="Day Month Year" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentReceivedBy">Received By</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="rentReceivedBy" name="rentReceivedBy" value="<?php echo $row_rent['received_by']; ?>" placeholder="Received By" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentActual">Rent Actual</label>
                                                <div class=" mb-2 input-group">
                                                    <input type="number" class="form-control" id="rentActual" name="rentActual" value="<?php echo $row_rent['rent_actual']; ?>" placeholder="0.00" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">৳</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentServiceCharge">Service Charge</label>
                                                <div class=" mb-2 input-group">
                                                    <input type="number" class="form-control" id="rentServiceCharge" name="rentServiceCharge" value="<?php echo $row_rent['rent_service_charge']; ?>" placeholder="0.00" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">৳</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="rentTotal">Totla Rent</label>
                                                <div class=" mb-2 input-group">
                                                    <input type="number" class="form-control" id="rentTotal" name="rentTotal" value="<?php echo $row_rent['rent_total']; ?>" placeholder="0.00" readonly />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">৳</span>
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
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="rent_update_btn" />
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
<?php include('../includes/footer.php'); ?>



                                        

