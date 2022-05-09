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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Rent Voucher</li>
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
                            <h4 class="card-title">Rent Voucher</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="window.print();" name="print" class="btn btn-sm btn-outline-info"><i class="fa fa-print"></i> Print</button>
                            <a href="RentList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>

                    <div class="card-body">
                    <?php
                        if(isset($_GET['info_id'])){
                            $info_id = $_GET['info_id'];
                            $select_rent = "SELECT tblrent.rent_id, tblrent.renter_id, tblrent.r_invoice_no, tblrent.rent_month, tblrent.rent_date, tblrent.rent_actual, tblrent.rent_service_charge, tblrent.rent_total, tblrent.received_by, tblrenter.renter_name, tblrenter.flat_no, tblrenter.renter_phone, tblrenter.renter_email
                                FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.rent_id='$info_id' LIMIT 1";
                            $run_select_qry = mysqli_query($conn, $select_rent);

                            if(!$run_select_qry || mysqli_num_rows($run_select_qry) > 0){
                                foreach($run_select_qry as $row_rent){
                    ?>

                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="invoice-header-section">
                                    <div class="row">

                                        
                                        <div id="rent-voucher" class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="invoice-header d-block">
                                                        <div class="invoice-header-logo float-left">
                                                            <img src="../assets/img/f-logo-2.png" alt="">
                                                            <p>House#2445/1, Uttarkhan Mazar Para, <br> Uttarkhan, Uttarkhan, Dhaka-1230.</p>
                                                        </div>
                                                                
                                                        <div class="invoice-header-ivno float-right">
                                                            <h1>RENT VOUCHER</h1>
                                                            <h4 class="text-center"><?php echo $row_rent['r_invoice_no']; ?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                                <div class="col-md-12">
                                                    <div class="row invoice-info-row">
                                                        <div class="col-md-6">
                                                            <div class="invoice-info-left text-left">
                                                                <p><strong>Renter ID:</strong> <?php echo $row_rent['renter_id']; ?></p>
                                                                <p><strong>Renter Name:</strong> <?php echo $row_rent['renter_name']; ?></p>
                                                                <p><strong>Email:</strong> <?php echo $row_rent['renter_email']; ?></p>
                                                                <p><strong>Phone:</strong> <?php echo $row_rent['renter_phone']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="invoice-info-right text-right">
                                                                <p><strong>Rent ID:</strong> <?php echo $row_rent['rent_id']; ?></p>
                                                                <p><strong>Flot NO:</strong> <?php echo $row_rent['flat_no']; ?></p>
                                                                <p><strong>Received By:</strong> <?php echo $row_rent['received_by']; ?></p>
                                                                <p><strong>Date:</strong> <?php echo $row_rent['rent_date']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-secondary table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>SL</th>
                                                                    <th>The Month of Rent</th>
                                                                    <th>Description</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td rowspan="2" class="text-center"><?php echo $row_rent['rent_month']; ?></td>
                                                                    <td class="text-center">Actual</td>
                                                                    <td class="text-right"><?php echo $row_rent['rent_actual']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Service Charge</td>
                                                                    <td class="text-right"><?php echo $row_rent['rent_service_charge']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="2" style="border:none;background:#fff !important;"></th>
                                                                    <th class="text-right"><strong>Total</strong></th>
                                                                    <th class="text-right"><?php echo $row_rent['rent_total']; ?></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="renter-sign float-left">
                                                        <h5><span>Signature of Renter</span></h5>
                                                        <h5 class="text-left">Date:</h5>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="authority-sign float-right">
                                                        <h5><span>Signature of Landlord</span></h5>
                                                        <h5 class="text-left">Date:</h5>
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

            

            <div id="print-voucher" class="col-lg-12" style="display:;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice-header d-block">
                            <div class="invoice-header-logo float-left">
                                <img src="../assets/img/f-logo-2.png" alt="">
                                <p>House#2445/1, Uttarkhan Mazar Para, <br> Uttarkhan, Uttarkhan, Dhaka-1230.</p>
                            </div>
                                                                
                            <div class="invoice-header-ivno float-right">
                                <h1>RENT VOUCHER</h1>
                                <h4 class="text-center"><?php echo $row_rent['r_invoice_no']; ?></h4>
                            </div>
                        </div>
                    </div>
                                                        
                    <div class="col-md-12">
                        <div class="row invoice-info-row">
                            <div class="col-md-6">
                                <div class="invoice-info-left text-left">
                                    <p><strong>Renter ID:</strong> <?php echo $row_rent['renter_id']; ?></p>
                                    <p><strong>Renter Name:</strong> <?php echo $row_rent['renter_name']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $row_rent['renter_email']; ?></p>
                                    <p><strong>Phone:</strong> <?php echo $row_rent['renter_phone']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info-right text-right">
                                    <p><strong>Rent ID:</strong> <?php echo $row_rent['rent_id']; ?></p>
                                    <p><strong>Flot NO:</strong> <?php echo $row_rent['flat_no']; ?></p>
                                    <p><strong>Received By:</strong> <?php echo $row_rent['received_by']; ?></p>
                                    <p><strong>Date:</strong> <?php echo $row_rent['rent_date']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-secondary table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>The Month of Rent</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td rowspan="2" class="text-center"><?php echo $row_rent['rent_month']; ?></td>
                                        <td class="text-center">Actual</td>
                                        <td class="text-right"><?php echo $row_rent['rent_actual']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">Service Charge</td>
                                        <td class="text-right"><?php echo $row_rent['rent_service_charge']; ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" style="border:none;background:#fff !important;"></th>
                                        <th class="text-right"><strong>Total</strong></th>
                                        <th class="text-right"><?php echo $row_rent['rent_total']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="renter-sign float-left">
                            <h5><span>Signature of Renter</span></h5>
                            <h5 class="text-left">Date:</h5>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="authority-sign float-right">
                            <h5><span>Signature of Landlord</span></h5>
                            <h5 class="text-left">Date:</h5>
                        </div>
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