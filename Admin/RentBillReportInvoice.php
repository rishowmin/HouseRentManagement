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
                        <h1>Rent & Bill Invoice</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Rent & Bill</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Rent & Bill Invoice</li>
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
                            <h4 class="card-title">Rent & Bill Invoice</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RentBillReport.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['rb_invoice_no'])){
                            $rb_invoice_no = $_GET['rb_invoice_no'];
                            $select_rentBillReport = "SELECT tblrentbills.rentbill_id,tblrentbills.renter_id,tblrentbills.rentbill_month,tblrentbills.rb_invoice_no,tblrentbills.rent_id,tblrentbills.bill_id,
                                tblrent.rent_id,tblrent.r_invoice_no,tblrent.rent_month,tblrent.rent_date,tblrent.rent_actual,tblrent.rent_service_charge,tblrent.rent_total,tblrent.received_by,tblrent.r_type,
                                tblbills.bill_id,tblbills.b_invoice_no,tblbills.bill_month,tblbills.bill_date,tblbills.bill_electricity,tblbills.bill_gas,tblbills.bill_water,tblbills.bill_internet,tblbills.bill_total, tblbills.received_by,tblbills.b_type,
                                tblrenter.renter_id,tblrenter.renter_name,tblrenter.flat_no,tblrenter.renter_email,tblrenter.renter_phone
                                FROM tblrentbills INNER JOIN tblrent ON tblrentbills.rent_id=tblrent.rent_id
                                INNER JOIN tblbills ON tblrentbills.bill_id=tblbills.bill_id
                                INNER JOIN tblrenter ON tblrentbills.renter_id=tblrenter.renter_id
                                WHERE tblrentbills.ysnactive='1' AND tblrentbills.rb_invoice_no='$rb_invoice_no' LIMIT 1";
                            $run_select_qry = mysqli_query($conn, $select_rentBillReport);

                            if(!$run_select_qry || mysqli_num_rows($run_select_qry) > 0){
                                foreach($run_select_qry as $row_rentBill){
                    ?>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-header-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="invoice-header d-block">
                                                        <div class="invoice-header-logo float-left">
                                                            <img src="../assets/img/f-logo-2.png" alt="">
                                                            <p>House#2445/1, Uttarkhan Mazar Para, <br> P.O: Uttarkhan, P.S: Uttarkhan, Dhaka-1230.</p>
                                                        </div>
                                                        
                                                        <div class="invoice-header-ivno float-right">
                                                            <h1><?php echo $row_rentBill['rb_invoice_no']; ?></h1>
                                                            <h4 class="text-center"><?php echo $row_rentBill['rentbill_month']; ?></h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row invoice-info-row">
                                                        <div class="col-md-4">
                                                            <div class="invoice-info-left text-left">
                                                                <p><strong>Rent ID:</strong> <?php echo $row_rentBill['rent_id']; ?></p>
                                                                <p><strong>Invoice NO:</strong> <?php echo $row_rentBill['r_invoice_no']; ?></p>
                                                                <p><strong>Received By:</strong> <?php echo $row_rentBill['received_by']; ?></p>
                                                                <p><strong>Month:</strong> <?php echo $row_rentBill['rent_month']; ?></p>
                                                                <p><strong>Date:</strong> <?php echo $row_rentBill['rent_date']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="invoice-info-center text-center">
                                                                <p><strong>Renter ID:</strong> <?php echo $row_rentBill['renter_id']; ?></p>
                                                                <p><strong>Renter Name:</strong> <?php echo $row_rentBill['renter_name']; ?></p>
                                                                <p><strong>Flat NO:</strong> <?php echo $row_rentBill['flat_no']; ?></p>
                                                                <p><strong>Email:</strong> <?php echo $row_rentBill['renter_email']; ?></p>
                                                                <p><strong>Phone:</strong> <?php echo $row_rentBill['renter_phone']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="invoice-info-right text-right">
                                                                <p><strong>Bill ID:</strong> <?php echo $row_rentBill['bill_id']; ?></p>
                                                                <p><strong>Invoice NO:</strong> <?php echo $row_rentBill['b_invoice_no']; ?></p>
                                                                <p><strong>Received By:</strong> <?php echo $row_rentBill['received_by']; ?></p>
                                                                <p><strong>Month:</strong> <?php echo $row_rentBill['bill_month']; ?></p>
                                                                <p><strong>Date:</strong> <?php echo $row_rentBill['bill_date']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-secondary table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>SL NO</th>
                                                                    <th>Type</th>
                                                                    <th>Description</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['r_type']; ?></td>
                                                                    <td class="text-center">Actual</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['rent_actual']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['r_type']; ?></td>
                                                                    <td class="text-center">Service Charge</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['rent_service_charge']; ?></td>
                                                                </tr><tr>
                                                                    <td class="text-center">3</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['b_type']; ?></td>
                                                                    <td class="text-center">Electricity</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['bill_electricity']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">4</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['b_type']; ?></td>
                                                                    <td class="text-center">Gas</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['bill_gas']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">5</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['b_type']; ?></td>
                                                                    <td class="text-center">Water</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['bill_water']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">6</td>
                                                                    <td class="text-center"><?php echo $row_rentBill['b_type']; ?></td>
                                                                    <td class="text-center">Internet</td>
                                                                    <td class="text-right"><?php echo '৳ '.$row_rentBill['bill_internet']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th rowspan="3" colspan="2" class="empty-row"></th>
                                                                    <th class="text-right"><strong>Rent Total</strong></th>
                                                                    <th class="text-right"><?php echo '৳ '.$row_rentBill['rent_total'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-right"><strong>Bill Total</strong></th>
                                                                    <th class="text-right"><?php echo '৳ '.$row_rentBill['bill_total']; ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-right" style="font-size: 18px;"><strong>Sub-Total</strong></th>
                                                                    <th class="text-right" style="font-size: 18px;">
                                                                        <?php 
                                                                        $subTotal = $row_rentBill['rent_total'] + $row_rentBill['bill_total'];
                                                                        echo '৳ '.$subTotal;
                                                                        ?>
                                                                    </th>
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