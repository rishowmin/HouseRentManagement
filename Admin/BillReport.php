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
                            <div class="col-md-12 m-b-20">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Utility Bills Report</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Report</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Utility Bills Report</li>
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
                                                                            <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Renter ID / Bill (Month/Date/Received By)" />
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
                                                                                                    $renter_query = "SELECT * FROM tblrenter WHERE ysnactive='1'";
                                                                                                    $run_renter_query = mysqli_query($conn,$renter_query);
                                                                                                    if(mysqli_num_rows($run_renter_query) > 0){
                                                                                                ?>
                                                                                                <select class="form-control" id="renterID" name="renterID">
                                                                                                    <option selected disabled position>--Select Renter--</option>
                                                                                                <?php foreach($run_renter_query as $item) { ?>
                                                                                                    <option value="<?php echo $item['renter_id']; ?>"><?php echo $item['renter_id']; ?> - <?php echo $item['renter_name']; ?></option>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>                                                            
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <div class="mb-2 input-group date" id="bill-month">
                                                                                                <input type="text" class="form-control" id="billMonth" name="billMonth" value="<?php if(isset($_GET['billMonth'])){ echo $_GET['billMonth']; } ?>" placeholder="Bill Month" />
                                                                                                <span class="input-group-addon">
                                                                                                    <i class="fa fa-calendar"></i>
                                                                                                </span>
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
                                                                                                <a href="AddBill.php" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Add New Rent"><i class="fa fa-plus"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                            </form>
                                                            
                                                                            <!-- <form id="" action="" method="GET" class="form-horizontal"> -->
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <div class="list-imp-btn mb-2 text-right">
                                                                                                <!-- <a href="../Print.php" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print"><i class="fa fa-print"></i></a> -->
                                                                                                <button onclick="window.print();" name="print" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Print"><i class="fa fa-print"></i></button>
                                                                                                <button class="btn btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Genarate PDF" disabled><i class="fa fa-file-pdf-o"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <!-- </form> -->
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

                            

                            <div id="rent-report" class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4 class="card-title"><i class="fa fa-bar-chart"></i> Utility Bills Report</h4>
                                                </div>
                                                <div class="col-md-8 float-right">
                                                    <?php
                                                        if(isset($_GET['search'])){                                                        
                                                            $search_values = $_GET['search'];
                                                    ?>
                                                    <h5 class="card-title m-0">Search By:</h5>
                                                    <h6 class="card-title m-0"><?php echo $search_values; ?></h6>
                                                    <?php
                                                        }
                                                        elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                            $renterID = $_GET['renterID'] ?? null;
                                                            $billMonth = $_GET['billMonth'] ?? null;
                                                            $fromDate = $_GET['fromDate'] ?? null;
                                                            $toDate = $_GET['toDate'] ?? null;
                                                    ?>
                                                    <h5 class="card-title m-0">Filter By:</h5>
                                                    <h6 class="card-title m-0">Renter ID: <?php echo $renterID; ?> & Bill Month: <?php echo $billMonth; ?> & Bill Date: <?php echo $fromDate; ?> -  <?php echo $toDate; ?></h6>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th rowspan="2">SL NO</th>
                                                        <th rowspan="2">Bill ID</th>
                                                        <th rowspan="2">Voucher NO</th>
                                                        <th rowspan="2">Renter ID & Name</th>
                                                        <th rowspan="2">Month</th>
                                                        <th rowspan="2">Date</th>
                                                        <th rowspan="2">Received By</th>
                                                        <th colspan="5">Bills</th>
                                                        <th rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Electricity</th>
                                                        <th>Gas</th>
                                                        <th>Water</th>
                                                        <th>Internet</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <!-- PHP Start -->
                                                <?php
                                                    if(isset($_GET['search'])){                                                        
                                                        $search_values = $_GET['search'];

                                                        if (isset($_GET['page']) && $_GET['page']!=""){
                                                            $page_no = $_GET['page'];
                                                        }
                                                        else {
                                                            $page_no = 1;
                                                        }
                                                        
                                                        $total_records_per_page = 5;
                                                        $offset = ($page_no-1) * $total_records_per_page;
                                                        $previous_page = $page_no - 1;
                                                        $next_page = $page_no + 1;
                                                        $adjacents = "2"; 
                                                    
                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblbills 
                                                        WHERE CONCAT(renter_id,b_invoice_no,bill_month,bill_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                    
                                                        $select_bill = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE CONCAT(tblbills.renter_id,tblbills.b_invoice_no,tblbills.bill_month,tblbills.bill_date,tblbills.received_by) LIKE '%$search_values%' AND tblbills.ysnactive='1' ORDER BY tblbills.id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_bill);
                                                        while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                            $billID = $row_bill['bill_id'];
                                                            $billInvoiceNo = $row_bill['b_invoice_no'];
                                                            $renterID = $row_bill['renter_id'];
                                                            $renterName = $row_bill['renter_name'];
                                                            $billMonth = $row_bill['bill_month'];
                                                            $billDate = $row_bill['bill_date'];
                                                            $receivedBy = $row_bill['received_by'];
                                                            $bill_e = $row_bill['bill_electricity'];
                                                            $bill_g = $row_bill['bill_gas'];
                                                            $bill_w = $row_bill['bill_water'];
                                                            $bill_i = $row_bill['bill_internet'];
                                                            $billTotal = $row_bill['bill_total'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $billID; ?></td>
                                                        <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                        <td class="text-center"><?php echo $billMonth; ?></td>
                                                        <td class="text-center"><?php echo $billDate; ?></td>
                                                        <td class="text-center"><?php echo $receivedBy; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="BillInfo.php?info_id=<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
                                                            </div>
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
                                                    
                                                    elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                        $renterID = $_GET['renterID'] ?? null;
                                                        $billMonth = $_GET['billMonth'] ?? null;
                                                        $fromDate = $_GET['fromDate'] ?? null;
                                                        $toDate = $_GET['toDate'] ?? null;

                                                        if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($billMonth != "")){

                                                            if (isset($_GET['page']) && $_GET['page']!=""){
                                                                $page_no = $_GET['page'];
                                                            }
                                                            else {
                                                                $page_no = 1;
                                                            }
                                                            
                                                            $total_records_per_page = 5;
                                                            $offset = ($page_no-1) * $total_records_per_page;
                                                            $previous_page = $page_no - 1;
                                                            $next_page = $page_no + 1;
                                                            $adjacents = "2"; 
                                                        
                                                            $select_count = "SELECT COUNT(*) As total_records FROM tblbills 
                                                                WHERE bill_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR bill_month='$billMonth' AND ysnactive='1'";
                                                            $result_count = mysqli_query($conn,$select_count);
                                                            $total_records = mysqli_fetch_array($result_count);
                                                            $total_records = $total_records['total_records'];
                                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                            $second_last = $total_no_of_pages - 1; // total page minus 1
                                                            
                                                            $counter = 0;
                                                            $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                        
                                                            $select_rent = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE tblbills.bill_date BETWEEN '$fromDate' AND '$toDate' OR tblbills.renter_id='$renterID' OR tblbills.bill_month='$billMonth' AND tblbills.ysnactive='1' ORDER BY tblbills.id ASC LIMIT $offset, $total_records_per_page";
                                                            $run_select_qry = mysqli_query($conn, $select_rent);
                                                            while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                                $billID = $row_bill['bill_id'];
                                                                $billInvoiceNo = $row_bill['b_invoice_no'];
                                                                $renterID = $row_bill['renter_id'];
                                                                $renterName = $row_bill['renter_name'];
                                                                $billMonth = $row_bill['bill_month'];
                                                                $billDate = $row_bill['bill_date'];
                                                                $receivedBy = $row_bill['received_by'];
                                                                $bill_e = $row_bill['bill_electricity'];
                                                                $bill_g = $row_bill['bill_gas'];
                                                                $bill_w = $row_bill['bill_water'];
                                                                $bill_i = $row_bill['bill_internet'];
                                                                $billTotal = $row_bill['bill_total'];

                                                                if(mysqli_num_rows($run_select_qry) > 0){
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                            <td class="text-center"><?php echo $billID; ?></td>
                                                            <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                            <td class="text-center"><?php echo $billMonth; ?></td>
                                                            <td class="text-center"><?php echo $billDate; ?></td>
                                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
                                                            <td>
                                                                <div class="action-btn">
                                                                    <a href="BillInfo.php?info_id=<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
                                                                </div>
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
                                                        if (isset($_GET['page']) && $_GET['page']!=""){
                                                            $page_no = $_GET['page'];
                                                        }
                                                        else {
                                                            $page_no = 1;
                                                        }
                                                        
                                                        $total_records_per_page = 5;
                                                        $offset = ($page_no-1) * $total_records_per_page;
                                                        $previous_page = $page_no - 1;
                                                        $next_page = $page_no + 1;
                                                        $adjacents = "2"; 

                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblbills WHERE ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;

                                                        $select_rent = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE tblbills.ysnactive='1' ORDER BY tblbills.id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_rent);
                                                        while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                            $billID = $row_bill['bill_id'];
                                                            $billInvoiceNo = $row_bill['b_invoice_no'];
                                                            $renterID = $row_bill['renter_id'];
                                                            $renterName = $row_bill['renter_name'];
                                                            $billMonth = $row_bill['bill_month'];
                                                            $billDate = $row_bill['bill_date'];
                                                            $receivedBy = $row_bill['received_by'];
                                                            $bill_e = $row_bill['bill_electricity'];
                                                            $bill_g = $row_bill['bill_gas'];
                                                            $bill_w = $row_bill['bill_water'];
                                                            $bill_i = $row_bill['bill_internet'];
                                                            $billTotal = $row_bill['bill_total'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $billID; ?></td>
                                                        <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                        <td class="text-center"><?php echo $billMonth; ?></td>
                                                        <td class="text-center"><?php echo $billDate; ?></td>
                                                        <td class="text-center"><?php echo $receivedBy; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="BillInfo.php?info_id=<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
                                                            </div>
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
                                                <!-- PHP End -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <?php
                                                            if(isset($_GET['search'])){                                                        
                                                                $search_values = $_GET['search'];

                                                                $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE CONCAT(renter_id,b_invoice_no,bill_month,bill_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                                $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                $bill_e = $row['sum_bill_electricity'];
                                                                $bill_g = $row['sum_bill_gas'];
                                                                $bill_w = $row['sum_bill_water'];
                                                                $bill_i = $row['sum_bill_internet'];
                                                                $billTotal = $row['sum_bill_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                            }
                                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                                $renterID = $_GET['renterID'] ?? null;
                                                                $billMonth = $_GET['billMonth'] ?? null;
                                                                $fromDate = $_GET['fromDate'] ?? null;
                                                                $toDate = $_GET['toDate'] ?? null;
        
                                                                if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($billMonth != "")){
                                                                    $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE bill_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR bill_month='$billMonth' AND ysnactive='1'";
                                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                    $bill_e = $row['sum_bill_electricity'];
                                                                    $bill_g = $row['sum_bill_gas'];
                                                                    $bill_w = $row['sum_bill_water'];
                                                                    $bill_i = $row['sum_bill_internet'];
                                                                    $billTotal = $row['sum_bill_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                                }
                                                            }
                                                            else {
                                                            $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE ysnactive='1'";
                                                            $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                            $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                            $bill_e = $row['sum_bill_electricity'];
                                                            $bill_g = $row['sum_bill_gas'];
                                                            $bill_w = $row['sum_bill_water'];
                                                            $bill_i = $row['sum_bill_internet'];
                                                            $billTotal = $row['sum_bill_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div class="pagination-div">
                                                <?php
                                                    $search_values = isset($_GET['search']) ? $_GET['search'] : '';
                                                    $renterID = isset($_GET['renterID']) ? $_GET['renterID'] : '';
                                                    $billMonth = isset($_GET['billMonth']) ? $_GET['billMonth'] : '';
                                                    $fromDate = isset($_GET['fromDate']) ? $_GET['fromDate'] : '';
                                                    $toDate = isset($_GET['toDate']) ? $_GET['toDate'] : '';

                                                    if($search_values != ""){
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page&search=$search_values'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last&search=$search_values'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages&search=$search_values'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1&search=$search_values'>1</a></li>";
                                                            echo "<li><a href='?page=2&search=$search_values'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&search=$search_values'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&search=$search_values'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1&search=$search_values'>1</a></li>";
                                                            echo "<li><a href='?page=2&search=$search_values'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&search=$search_values'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="padding-top: 5px;">
                                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                    </div>

                                                <?php
                                                    }
                                                    elseif(($fromDate != "" && $toDate != "") || ($renterID != "") || ($billMonth != "")){
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&renterID=$renterID&billMonth=$billMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="padding-top: 5px;">
                                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                    </div>

                                                <?php
                                                    }
                                                    else{
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1'>1</a></li>";
                                                            echo "<li><a href='?page=2'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1'>1</a></li>";
                                                            echo "<li><a href='?page=2'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="padding-top: 5px;">
                                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                    </div>

                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        
                            
                            
                            <div id="print-report" class="col-lg-12" style="display:none;">
                                <div class="print-logo text-center mb-3">
                                    <img src="../assets/img/logo-admin.png" width="25%" alt="logo" />
                                    <p style="color:#212529;margin-top:8px;font-weight:bold;">House#2445/1, Uttarkhan Mazar Para, Uttarkhan, Dhaka-1230.</p>
                                    <p style="color:#212529;font-weight:bold;">Phone Number: +88018 1986 8985, +88017 1135 5411</p>
                                </div>
                                <div class="report-header text-center mb-3">
                                    <h3 style="border:2px solid #212529;width:fit-content;margin:0 auto;padding:5px;text-transform:uppercase;">Utility Bills Report</h3>
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
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                    $renterID = $_GET['renterID'] ?? null;
                                                    $billMonth = $_GET['billMonth'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
                                            ?>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="width:25%">Filter By </th>
                                                <th style="width:25%">Renter ID</th>
                                                <th style="width:25%">Bill Month</th>
                                                <th style="width:25%">Bill Date</th>
                                            </tr>
                                            <tr>
                                                <th style="width:25%"><?php echo $renterID; ?></th>
                                                <th style="width:25%"><?php echo $billMonth; ?></th>
                                                <th style="width:75%"><?php echo $fromDate; ?> - <?php echo $toDate; ?></th>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </thead>
                                    </table>
                                </div>

                                <table class="display compact table table-bordered print-table">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" class="bg-print">SL NO</th>
                                            <th rowspan="2" class="bg-print">Bill ID</th>
                                            <th rowspan="2" class="bg-print">Voucher NO</th>
                                            <th rowspan="2" class="bg-print">Renter ID & Name</th>
                                            <th rowspan="2" class="bg-print">Month</th>
                                            <th rowspan="2" class="bg-print">Date</th>
                                            <th rowspan="2" class="bg-print">Received By</th>
                                            <th colspan="5" class="bg-print">Bills</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-print">Electricity</th>
                                            <th class="bg-print">Gas</th>
                                            <th class="bg-print">Water</th>
                                            <th class="bg-print">Internet</th>
                                            <th class="bg-print">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['search'])){                                                        
                                                $search_values = $_GET['search'];

                                                $counter = 0;
                                                        
                                                $select_rent = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE CONCAT(tblbills.renter_id,tblbills.b_invoice_no,tblbills.bill_month,tblbills.bill_date,tblbills.received_by) LIKE '%$search_values%' AND tblbills.ysnactive='1' ORDER BY tblbills.id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_rent);
                                                while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                    $billID = $row_bill['bill_id'];
                                                    $billInvoiceNo = $row_bill['b_invoice_no'];
                                                    $renterID = $row_bill['renter_id'];
                                                    $renterName = $row_bill['renter_name'];
                                                    $billMonth = $row_bill['bill_month'];
                                                    $billDate = $row_bill['bill_date'];
                                                    $receivedBy = $row_bill['received_by'];
                                                    $bill_e = $row_bill['bill_electricity'];
                                                    $bill_g = $row_bill['bill_gas'];
                                                    $bill_w = $row_bill['bill_water'];
                                                    $bill_i = $row_bill['bill_internet'];
                                                    $billTotal = $row_bill['bill_total'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $billID; ?></td>
                                            <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $billMonth; ?></td>
                                            <td class="text-center"><?php echo $billDate; ?></td>
                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
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

                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                $renterID = $_GET['renterID'] ?? null;
                                                $billMonth = $_GET['billMonth'] ?? null;
                                                $fromDate = $_GET['fromDate'] ?? null;
                                                $toDate = $_GET['toDate'] ?? null;

                                                if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($billMonth != "")){
                                                    $counter = 0;
                                                            
                                                    $select_rent = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE tblbills.bill_date BETWEEN '$fromDate' AND '$toDate' OR tblbills.renter_id='$renterID' OR tblbills.bill_month='$billMonth' AND tblbills.ysnactive='1' ORDER BY tblbills.id ASC";
                                                    $run_select_qry = mysqli_query($conn, $select_rent);
                                                    while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                        $billID = $row_bill['bill_id'];
                                                        $billInvoiceNo = $row_bill['b_invoice_no'];
                                                        $renterID = $row_bill['renter_id'];
                                                        $renterName = $row_bill['renter_name'];
                                                        $billMonth = $row_bill['bill_month'];
                                                        $billDate = $row_bill['bill_date'];
                                                        $receivedBy = $row_bill['received_by'];
                                                        $bill_e = $row_bill['bill_electricity'];
                                                        $bill_g = $row_bill['bill_gas'];
                                                        $bill_w = $row_bill['bill_water'];
                                                        $bill_i = $row_bill['bill_internet'];
                                                        $billTotal = $row_bill['bill_total'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $billID; ?></td>
                                            <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $billMonth; ?></td>
                                            <td class="text-center"><?php echo $billDate; ?></td>
                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
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

                                                $select_rent = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, DATE_FORMAT(STR_TO_DATE(tblbills.bill_date, '%Y-%m-%d'), '%d %M %Y') as bill_date, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE tblbills.ysnactive='1' ORDER BY tblbills.id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_rent);
                                                while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                    $billID = $row_bill['bill_id'];
                                                    $billInvoiceNo = $row_bill['b_invoice_no'];
                                                    $renterID = $row_bill['renter_id'];
                                                    $renterName = $row_bill['renter_name'];
                                                    $billMonth = $row_bill['bill_month'];
                                                    $billDate = $row_bill['bill_date'];
                                                    $receivedBy = $row_bill['received_by'];
                                                    $bill_e = $row_bill['bill_electricity'];
                                                    $bill_g = $row_bill['bill_gas'];
                                                    $bill_w = $row_bill['bill_water'];
                                                    $bill_i = $row_bill['bill_internet'];
                                                    $billTotal = $row_bill['bill_total'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $billID; ?></td>
                                            <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $billMonth; ?></td>
                                            <td class="text-center"><?php echo $billDate; ?></td>
                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_e; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_g; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_w; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$bill_i; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$billTotal; ?></td>
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
                                    <tfoot>
                                        <tr>
                                            <?php
                                                if(isset($_GET['search'])){                                                        
                                                    $search_values = $_GET['search'];

                                                    $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE CONCAT(renter_id,b_invoice_no,bill_month,bill_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                    $bill_e = $row['sum_bill_electricity'];
                                                    $bill_g = $row['sum_bill_gas'];
                                                    $bill_w = $row['sum_bill_water'];
                                                    $bill_i = $row['sum_bill_internet'];
                                                    $billTotal = $row['sum_bill_total'];
                                            ?>
                                            ?>

                                            <th class="text-center" colspan="7">Sub-Total</th>
                                            <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>

                                            <?php
                                                }
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['billMonth'])){
                                                    $renterID = $_GET['renterID'] ?? null;
                                                    $billMonth = $_GET['billMonth'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
        
                                                    if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($billMonth != "")){
                                                        $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE bill_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR bill_month='$billMonth' AND ysnactive='1'";
                                                        $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                        $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                        $bill_e = $row['sum_bill_electricity'];
                                                        $bill_g = $row['sum_bill_gas'];
                                                        $bill_w = $row['sum_bill_water'];
                                                        $bill_i = $row['sum_bill_internet'];
                                                        $billTotal = $row['sum_bill_total'];
                                                ?>
                                            ?>

                                            <th class="text-center" colspan="7">Sub-Total</th>
                                            <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>

                                            <?php
                                                    }
                                                }
                                                else {
                                                    $select_total = "SELECT SUM(bill_electricity) AS sum_bill_electricity,SUM(bill_gas) AS sum_bill_gas,SUM(bill_water) AS sum_bill_water,SUM(bill_internet) AS sum_bill_internet,SUM(bill_total) AS sum_bill_total FROM tblbills WHERE ysnactive='1'";
                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                    $bill_e = $row['sum_bill_electricity'];
                                                    $bill_g = $row['sum_bill_gas'];
                                                    $bill_w = $row['sum_bill_water'];
                                                    $bill_i = $row['sum_bill_internet'];
                                                    $billTotal = $row['sum_bill_total'];
                                            ?>
                                                ?>

                                            <th class="text-center" colspan="7">Sub-Total</th>
                                            <th class="text-right"><?php echo '৳ '.$bill_e; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_g; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_w; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$bill_i; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$billTotal; ?></th>

                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>
                            
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->





            
                




<?php include('../includes/script.php'); ?>
<?php include('../includes/footer.php'); ?>