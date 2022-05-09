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
                        <h1>Utility Bills</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Utility Bills</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Bill</li>
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
                            <h4 class="card-title">Add A New Bill</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="BillList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="billForm" action="billCode.php" method="post" class="form-horizontal">
                            <div class="row">                                
                                <?php
                                    $select_billId = "SELECT bill_id FROM tblbills ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_billId);
                                    $billId_row = mysqli_fetch_array($run_select_qry);
                                    $last_billId = $billId_row['bill_id'] ?? 0;
                                    if($last_billId == ""){
                                        $billId = "BILL1";
                                    }
                                    else{
                                        $billId = substr($last_billId,4);
                                        $billId = intval($billId);
                                        $billId = "BILL" . ($billId + 1);
                                    }
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="billID">Bill ID</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="billID" name="billID" value="<?php echo $billId; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $select_invoiceNo = "SELECT b_invoice_no FROM tblbills ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_invoiceNo);
                                    $invoiceNo_row = mysqli_fetch_array($run_select_qry);
                                    $last_invoiceNo = $invoiceNo_row['b_invoice_no'] ?? 0;
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
                                        <label class="control-label" for="billMonth">The Month of Bills</label>
                                        <div class="mb-2 input-group date" id="bill-month">
                                            <input type="text" class="form-control" id="billMonth" name="billMonth" placeholder="Month Year" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="billDate">Date of Bills</label>
                                        <div class="mb-2 input-group date" id="bill-date">
                                            <input type="text" class="form-control" id="billDate" name="billDate" placeholder="Day Month Year" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="billReceivedBy">Received By</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="billReceivedBy" name="billReceivedBy" placeholder="Received By" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="billElectricity">Electricity Bill</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="billElectricity" name="billElectricity" placeholder="0.00" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="billGas">Gas Bill</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="billGas" name="billGas" placeholder="0.00" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="billWater">Water Bill</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="billWater" name="billWater" placeholder="0.00" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="billInternet">Internet Bill</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="billInternet" name="billInternet" placeholder="0.00" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="billTotal">Total Bill</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="billTotal" name="billTotal" placeholder="0.00" readonly />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">৳</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="bill_insert_btn" />
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



                                        

