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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Rent</li>
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
                            <h4 class="card-title">Add A New Rent</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RentList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="rentForm" action="rentCode.php" method="post" class="form-horizontal">
                            <div class="row">
                                <?php
                                    $select_rentId = "SELECT rent_id FROM tblrent ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_rentId);
                                    $rentId_row = mysqli_fetch_array($run_select_qry);
                                    $last_rentId = $rentId_row['rent_id'] ?? 0;
                                    if($last_rentId == ""){
                                        $rentId = "RENT1";
                                    }
                                    else{
                                        $rentId = substr($last_rentId,4);
                                        $rentId = intval($rentId);
                                        $rentId = "RENT" . ($rentId + 1);
                                    }
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="rentID">Rent ID</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="rentID" name="rentID" value="<?php echo $rentId; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $select_invoiceNo = "SELECT r_invoice_no FROM tblrent ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_invoiceNo);
                                    $invoiceNo_row = mysqli_fetch_array($run_select_qry);
                                    $last_invoiceNo = $invoiceNo_row['r_invoice_no'] ?? 0;
                                    if($last_invoiceNo == ""){
                                        $invoiceNo = "VOUCHER#1";
                                    }
                                    else{
                                        $invoiceNo = substr($last_invoiceNo,8);
                                        $invoiceNo = intval($invoiceNo);
                                        $invoiceNo = "VOUCHER#" . ($invoiceNo + 1);
                                    }
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="invoiceNo">Voucher No</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" value="<?php echo $invoiceNo; ?>" readonly />
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
                                                <option selected disabled position>--Select Renter--</option>
                                            <?php foreach($run_renter_query as $item) { ?>
                                                <option value="<?php echo $item['renter_id']; ?>"><?php echo $item['renter_id']; ?> - <?php echo $item['renter_name']; ?></option>
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
                                            <input type="text" class="form-control" id="rentMonth" name="rentMonth" placeholder="Month Year" />
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
                                            <input type="text" class="form-control" id="rentDate" name="rentDate" placeholder="Day Month Year" />
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
                                            <input type="text" class="form-control" id="rentReceivedBy" name="rentReceivedBy" placeholder="Received By" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="rentActual">Rent Actual</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="rentActual" name="rentActual" placeholder="0.00" />
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
                                            <input type="number" class="form-control" id="rentServiceCharge" name="rentServiceCharge" placeholder="0.00" />
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
                                            <input type="number" class="form-control" id="rentTotal" name="rentTotal" placeholder="0.00" readonly />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="rent_insert_btn" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                    $select_rentBillId = "SELECT rentbill_id FROM tblrentbills ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_rentBillId);
                                    $rentBillId_row = mysqli_fetch_array($run_select_qry);
                                    $last_rentBillId = $rentBillId_row['rentbill_id'] ?? 0;
                                    if($last_rentBillId == ""){
                                        $rentId = "RENTBILL1";
                                    }
                                    else{
                                        $rentBillId = substr($last_rentBillId,8);
                                        $rentBillId = intval($rentBillId);
                                        $rentBillId = "RENTBILL" . ($rentBillId + 1);
                                    }
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="rentBillID" name="rentBillID" value="<?php echo $rentBillId; ?>" hidden />
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $select_invoiceNo = "SELECT rb_invoice_no FROM tblrentbills ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_invoiceNo);
                                    $invoiceNo_row = mysqli_fetch_array($run_select_qry);
                                    $last_invoiceNo = $invoiceNo_row['rb_invoice_no'] ?? 0;
                                    if($last_invoiceNo == ""){
                                        $invoiceNo = "INVOICE#1";
                                    }
                                    else{
                                        $invoiceNo = substr($last_invoiceNo,8);
                                        $invoiceNo = intval($invoiceNo);
                                        $invoiceNo = "INVOICE#" . ($invoiceNo + 1);
                                    }
                                ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="rbInvoiceNo" name="rbInvoiceNo" value="<?php echo $invoiceNo; ?>" hidden />
                                        </div>
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

    function loadDocs(event){
        var output = document.getElementById('prevdoc');
        output.src = 'assets/img/pdf.png';
    }
</script>

<?php include('../includes/footer.php'); ?>



                                        

