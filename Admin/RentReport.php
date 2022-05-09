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
                                        <h1>Rent Report</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Report</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Rent Report</li>
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
                                                                            <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Renter ID / Rent (Month/Date/Received By)" />
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
                                                                                            <div class="mb-2 input-group date" id="rent-month">
                                                                                                <input type="text" class="form-control" id="rentMonth" name="rentMonth" value="<?php if(isset($_GET['rentMonth'])){ echo $_GET['rentMonth']; } ?>" placeholder="Rent Month" />
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
                                                                                                <a href="AddRent.php" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Add New Rent"><i class="fa fa-plus"></i></a>
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
                                                    <h4 class="card-title"><i class="fa fa-bar-chart"></i> Rent Report</h4>
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
                                                        elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                            $renterID = $_GET['renterID'] ?? null;
                                                            $rentMonth = $_GET['rentMonth'] ?? null;
                                                            $fromDate = $_GET['fromDate'] ?? null;
                                                            $toDate = $_GET['toDate'] ?? null;
                                                    ?>
                                                    <h5 class="card-title m-0">Filter By:</h5>
                                                    <h6 class="card-title m-0">Renter ID: <?php echo $renterID; ?> & Rent Month: <?php echo $rentMonth; ?> & Rent Date: <?php echo $fromDate; ?> -  <?php echo $toDate; ?></h6>
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
                                                        <th rowspan="2">Rent ID</th>
                                                        <th rowspan="2">Voucher NO</th>
                                                        <th rowspan="2">Renter ID & Name</th>
                                                        <th rowspan="2">Month</th>
                                                        <th rowspan="2">Date</th>
                                                        <th rowspan="2">Received By</th>
                                                        <th colspan="3">Rent</th>
                                                        <th rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Actual</th>
                                                        <th>Service Charge</th>
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
                                                    
                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblrent 
                                                        WHERE CONCAT(renter_id,r_invoice_no,rent_month,rent_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                    
                                                        $select_rent = "SELECT tblrent.rent_id,tblrent.renter_id,tblrent.r_invoice_no,tblrent.rent_month,DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date,tblrent.rent_actual,tblrent.rent_service_charge,tblrent.rent_total,tblrent.received_by,tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE CONCAT(tblrent.renter_id,tblrent.r_invoice_no,tblrent.rent_month,tblrent.rent_date,tblrent.received_by) LIKE '%$search_values%' AND tblrent.ysnactive='1' ORDER BY tblrent.id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_rent);
                                                        while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                            $rentID = $row_rent['rent_id'];
                                                            $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                            $renterID = $row_rent['renter_id'];
                                                            $renterName = $row_rent['renter_name'];
                                                            $rentMonth = $row_rent['rent_month'];
                                                            $rentDate = $row_rent['rent_date'];
                                                            $receivedBy = $row_rent['received_by'];
                                                            $rentActual = $row_rent['rent_actual'];
                                                            $rentServiceCharge = $row_rent['rent_service_charge'];
                                                            $rentTotal = $row_rent['rent_total'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $rentID; ?></td>
                                                        <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                        <td class="text-center"><?php echo $rentMonth; ?></td>
                                                        <td class="text-center"><?php echo $rentDate; ?></td>
                                                        <td class="text-center"><?php echo $receivedBy; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="RentInfo.php?info_id=<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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
                                                    
                                                    elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                        $renterID = $_GET['renterID'] ?? null;
                                                        $rentMonth = $_GET['rentMonth'] ?? null;
                                                        $fromDate = $_GET['fromDate'] ?? null;
                                                        $toDate = $_GET['toDate'] ?? null;

                                                        if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($rentMonth != "")){

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
                                                        
                                                            $select_count = "SELECT COUNT(*) As total_records FROM tblrent 
                                                                WHERE rent_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR rent_month='$rentMonth' AND ysnactive='1'";
                                                            $result_count = mysqli_query($conn,$select_count);
                                                            $total_records = mysqli_fetch_array($result_count);
                                                            $total_records = $total_records['total_records'];
                                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                            $second_last = $total_no_of_pages - 1; // total page minus 1
                                                            
                                                            $counter = 0;
                                                            $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                        
                                                            $select_rent = "SELECT tblrent.rent_id,tblrent.renter_id,tblrent.r_invoice_no,tblrent.rent_month,DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date,tblrent.rent_actual,tblrent.rent_service_charge,tblrent.rent_total,tblrent.received_by,tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.rent_date BETWEEN '$fromDate' AND '$toDate' OR tblrent.renter_id='$renterID' OR tblrent.rent_month='$rentMonth' AND tblrent.ysnactive='1' ORDER BY tblrent.id ASC LIMIT $offset, $total_records_per_page";
                                                            $run_select_qry = mysqli_query($conn, $select_rent);
                                                            while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                                $rentID = $row_rent['rent_id'];
                                                                $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                                $renterID = $row_rent['renter_id'];
                                                                $renterName = $row_rent['renter_name'];
                                                                $rentMonth = $row_rent['rent_month'];
                                                                $rentDate = $row_rent['rent_date'];
                                                                $receivedBy = $row_rent['received_by'];
                                                                $rentActual = $row_rent['rent_actual'];
                                                                $rentServiceCharge = $row_rent['rent_service_charge'];
                                                                $rentTotal = $row_rent['rent_total'];

                                                                if(mysqli_num_rows($run_select_qry) > 0){
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                            <td class="text-center"><?php echo $rentID; ?></td>
                                                            <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                            <td class="text-center"><?php echo $rentMonth; ?></td>
                                                            <td class="text-center"><?php echo $rentDate; ?></td>
                                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
                                                            <td>
                                                                <div class="action-btn">
                                                                    <a href="RentInfo.php?info_id=<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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

                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblrent WHERE ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;

                                                        $select_rent = "SELECT tblrent.rent_id,tblrent.renter_id,tblrent.r_invoice_no,tblrent.rent_month,DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date,tblrent.rent_actual,tblrent.rent_service_charge,tblrent.rent_total,tblrent.received_by,tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.ysnactive='1' ORDER BY tblrent.id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_rent);
                                                        while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                            $rentID = $row_rent['rent_id'];
                                                            $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                            $renterID = $row_rent['renter_id'];
                                                            $renterName = $row_rent['renter_name'];
                                                            $rentMonth = $row_rent['rent_month'];
                                                            $rentDate = $row_rent['rent_date'];
                                                            $receivedBy = $row_rent['received_by'];
                                                            $rentActual = $row_rent['rent_actual'];
                                                            $rentServiceCharge = $row_rent['rent_service_charge'];
                                                            $rentTotal = $row_rent['rent_total'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $rentID; ?></td>
                                                        <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                        <td class="text-center"><?php echo $rentMonth; ?></td>
                                                        <td class="text-center"><?php echo $rentDate; ?></td>
                                                        <td class="text-center"><?php echo $receivedBy; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="RentInfo.php?info_id=<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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

                                                                $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE CONCAT(renter_id,r_invoice_no,rent_month,rent_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                                $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                $rentActual = $row['sum_rent_actual'];
                                                                $rentService = $row['sum_rent_service_charge'];
                                                                $rentTotal = $row['sum_rent_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                            }
                                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                                $renterID = $_GET['renterID'] ?? null;
                                                                $rentMonth = $_GET['rentMonth'] ?? null;
                                                                $fromDate = $_GET['fromDate'] ?? null;
                                                                $toDate = $_GET['toDate'] ?? null;
        
                                                                if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($rentMonth != "")){
                                                                    $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE rent_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR rent_month='$rentMonth' AND ysnactive='1'";
                                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                    $rentActual = $row['sum_rent_actual'];
                                                                    $rentService = $row['sum_rent_service_charge'];
                                                                    $rentTotal = $row['sum_rent_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                                }
                                                            }
                                                            else {
                                                            $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE ysnactive='1'";
                                                            $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                            $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                            $rentActual = $row['sum_rent_actual'];
                                                            $rentService = $row['sum_rent_service_charge'];
                                                            $rentTotal = $row['sum_rent_total'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                                        <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>
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
                                                    $rentMonth = isset($_GET['rentMonth']) ? $_GET['rentMonth'] : '';
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
                                                    elseif(($fromDate != "" && $toDate != "") || ($renterID != "") || ($rentMonth != "")){
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&renterID=$renterID&rentMonth=$rentMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
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
                                    <h3 style="border:2px solid #212529;width:fit-content;margin:0 auto;padding:5px;text-transform:uppercase;">Rent Report</h3>
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
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                    $renterID = $_GET['renterID'] ?? null;
                                                    $rentMonth = $_GET['rentMonth'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
                                            ?>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="width:25%">Filter By </th>
                                                <th style="width:25%">Renter ID</th>
                                                <th style="width:25%">Rent Month</th>
                                                <th style="width:25%">Rent Date</th>
                                            </tr>
                                            <tr>
                                                <th style="width:25%"><?php echo $renterID; ?></th>
                                                <th style="width:25%"><?php echo $rentMonth; ?></th>
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
                                            <th rowspan="2" class="bg-print">Rent ID</th>
                                            <th rowspan="2" class="bg-print">Voucher NO</th>
                                            <th rowspan="2" class="bg-print">Renter ID<br />Renter Name</th>
                                            <th rowspan="2" class="bg-print">Month</th>
                                            <th rowspan="2" class="bg-print">Date</th>
                                            <th rowspan="2" class="bg-print">Received By</th>
                                            <th colspan="3" class="bg-print">Rent</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-print">Actual</th>
                                            <th class="bg-print">Service<br />Charge</th>
                                            <th class="bg-print">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['search'])){                                                        
                                                $search_values = $_GET['search'];

                                                $counter = 0;
                                                        
                                                $select_rent = "SELECT tblrent.rent_id, tblrent.renter_id, tblrent.r_invoice_no, tblrent.rent_month, DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date, tblrent.rent_actual, tblrent.rent_service_charge, tblrent.rent_total, tblrent.received_by, tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE CONCAT(tblrent.renter_id,tblrent.r_invoice_no,tblrent.rent_month,tblrent.rent_date,tblrent.received_by) LIKE '%$search_values%' AND tblrent.ysnactive='1' ORDER BY tblrent.id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_rent);
                                                while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                    $rentID = $row_rent['rent_id'];
                                                    $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                    $renterID = $row_rent['renter_id'];
                                                    $renterName = $row_rent['renter_name'];
                                                    $rentMonth = $row_rent['rent_month'];
                                                    $rentDate = $row_rent['rent_date'];
                                                    $receivedBy = $row_rent['received_by'];
                                                    $rentActual = $row_rent['rent_actual'];
                                                    $rentServiceCharge = $row_rent['rent_service_charge'];
                                                    $rentTotal = $row_rent['rent_total'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$counter; ?></td>
                                                <td class="text-center"><?php echo $rentID; ?></td>
                                                <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                                <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                <td class="text-center"><?php echo $rentMonth; ?></td>
                                                <td class="text-center"><?php echo $rentDate; ?></td>
                                                <td class="text-center"><?php echo $receivedBy; ?></td>
                                                <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                                <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                                <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
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

                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                $renterID = $_GET['renterID'] ?? null;
                                                $rentMonth = $_GET['rentMonth'] ?? null;
                                                $fromDate = $_GET['fromDate'] ?? null;
                                                $toDate = $_GET['toDate'] ?? null;

                                                if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($rentMonth != "")){
                                                    $counter = 0;
                                                            
                                                    $select_rent = "SELECT tblrent.rent_id, tblrent.renter_id, tblrent.r_invoice_no, tblrent.rent_month, DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date, tblrent.rent_actual, tblrent.rent_service_charge, tblrent.rent_total, tblrent.received_by, tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.rent_date BETWEEN '$fromDate' AND '$toDate' OR tblrent.renter_id='$renterID' OR tblrent.rent_month='$rentMonth' AND tblrent.ysnactive='1' ORDER BY tblrent.id ASC";
                                                    $run_select_qry = mysqli_query($conn, $select_rent);
                                                    while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                        $rentID = $row_rent['rent_id'];
                                                        $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                        $renterID = $row_rent['renter_id'];
                                                        $renterName = $row_rent['renter_name'];
                                                        $rentMonth = $row_rent['rent_month'];
                                                        $rentDate = $row_rent['rent_date'];
                                                        $receivedBy = $row_rent['received_by'];
                                                        $rentActual = $row_rent['rent_actual'];
                                                        $rentServiceCharge = $row_rent['rent_service_charge'];
                                                        $rentTotal = $row_rent['rent_total'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $rentID; ?></td>
                                            <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $rentMonth; ?></td>
                                            <td class="text-center"><?php echo $rentDate; ?></td>
                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
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

                                                $select_rent = "SELECT tblrent.rent_id, tblrent.renter_id, tblrent.r_invoice_no, tblrent.rent_month, DATE_FORMAT(STR_TO_DATE(tblrent.rent_date, '%Y-%m-%d'), '%d %M %Y') as rent_date, tblrent.rent_actual, tblrent.rent_service_charge, tblrent.rent_total, tblrent.received_by, tblrenter.renter_name FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.ysnactive='1' ORDER BY tblrent.id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_rent);
                                                while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                    $rentID = $row_rent['rent_id'];
                                                    $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                    $renterID = $row_rent['renter_id'];
                                                    $renterName = $row_rent['renter_name'];
                                                    $rentMonth = $row_rent['rent_month'];
                                                    $rentDate = $row_rent['rent_date'];
                                                    $receivedBy = $row_rent['received_by'];
                                                    $rentActual = $row_rent['rent_actual'];
                                                    $rentServiceCharge = $row_rent['rent_service_charge'];
                                                    $rentTotal = $row_rent['rent_total'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $rentID; ?></td>
                                            <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                            <td class="text-center"><?php echo $rentMonth; ?></td>
                                            <td class="text-center"><?php echo $rentDate; ?></td>
                                            <td class="text-center"><?php echo $receivedBy; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentActual; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentServiceCharge; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$rentTotal; ?></td>
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

                                                    $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE CONCAT(renter_id,r_invoice_no,rent_month,rent_date,received_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                    $rentActual = $row['sum_rent_actual'];
                                                    $rentService = $row['sum_rent_service_charge'];
                                                    $rentTotal = $row['sum_rent_total'];
                                            ?>

                                            <th class="text-center" colspan="7">Sub-Total</th>
                                            <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>

                                            <?php
                                                }
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['renterID']) || isset($_GET['rentMonth'])){
                                                    $renterID = $_GET['renterID'] ?? null;
                                                    $rentMonth = $_GET['rentMonth'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
        
                                                    if(($fromDate != "" && $toDate != "") || ($renterID != "") || ($rentMonth != "")){
                                                        $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE rent_date BETWEEN '$fromDate' AND '$toDate' OR renter_id='$renterID' OR rent_month='$rentMonth' AND ysnactive='1'";
                                                        $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                        $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                        $rentActual = $row['sum_rent_actual'];
                                                        $rentService = $row['sum_rent_service_charge'];
                                                        $rentTotal = $row['sum_rent_total'];
                                            ?>

                                            <th class="text-center" colspan="7">Sub-Total</th>
                                            <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                            <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>

                                            <?php
                                                    }
                                                }
                                                else {
                                                    $select_total = "SELECT SUM(rent_actual) AS sum_rent_actual,SUM(rent_service_charge) AS sum_rent_service_charge,SUM(rent_total) AS sum_rent_total FROM tblrent WHERE ysnactive='1'";
                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                    $rentActual = $row['sum_rent_actual'];
                                                    $rentService = $row['sum_rent_service_charge'];
                                                    $rentTotal = $row['sum_rent_total'];
                                                ?>

                                                <th class="text-center" colspan="7">Sub-Total</th>
                                                <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                <th class="text-right"><?php echo '৳ '.$rentService; ?></th>
                                                <th class="text-right"><?php echo '৳ '.$rentTotal; ?></th>

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