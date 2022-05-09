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
                                        <h1>Expense Report</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Report</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Expense Report</li>
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
                                                                            <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Expense (ID/Head/Month/By)" />
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
                                                                                                    $expenseHead_filter = "SELECT DISTINCT expense_head FROM tblexpense WHERE ysnactive='1'";
                                                                                                    $run_expenseHead_filter = mysqli_query($conn,$expenseHead_filter);
                                                                                                    if(mysqli_num_rows($run_expenseHead_filter) > 0){
                                                                                                ?>
                                                                                                <select class="form-control" id="expHead" name="expHead">
                                                                                                    <option selected disabled position>--Select Expense Head--</option>
                                                                                                <?php foreach($run_expenseHead_filter as $item) { ?>
                                                                                                    <option value="<?php echo $item['expense_head']; ?>"><?php echo $item['expense_head']; ?></option>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>                                                            
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <div class="mb-2 input-group date" id="expense-month">
                                                                                                <input type="text" class="form-control" id="expMonth" name="expMonth" value="<?php if(isset($_GET['expMonth'])){ echo $_GET['expMonth']; } ?>" placeholder="Expense Month" />
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
                                                                                                <a href="AddExpense.php" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Add New Expense"><i class="fa fa-plus"></i></a>
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

                            

                            <div id="expense-report" class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4 class="card-title"><i class="fa fa-bar-chart"></i> Expense Report</h4>
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
                                                        elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                            $expHead = $_GET['expHead'] ?? null;
                                                            $expMonth = $_GET['expMonth'] ?? null;
                                                            $fromDate = $_GET['fromDate'] ?? null;
                                                            $toDate = $_GET['toDate'] ?? null;
                                                    ?>
                                                    <h5 class="card-title m-0">Filter By:</h5>
                                                    <h6 class="card-title m-0">Expense Head: <?php echo $expHead; ?> & Expense Month: <?php echo $expMonth; ?> & Expense Date: <?php echo $fromDate; ?> -  <?php echo $toDate; ?></h6>
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
                                                        <th>SL NO</th>
                                                        <th>Expense ID</th>
                                                        <th>Voucher NO</th>
                                                        <th>Month</th>
                                                        <th>Date</th>
                                                        <th>Expense By</th>
                                                        <th>Expense Head</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
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
                                                    
                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblexpense 
                                                        WHERE CONCAT(expense_id,expense_head,expense_month,expense_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                    
                                                        $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense WHERE
                                                            CONCAT(expense_id,expense_head,expense_month,expense_by) LIKE '%$search_values%' AND ysnactive='1' 
                                                            ORDER BY id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_expense);
                                                        while ($row_expense = mysqli_fetch_array($run_select_qry)){
                                                            $expenseID = $row_expense['expense_id'];
                                                            $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                            $expenseMonth = $row_expense['expense_month'];
                                                            $expenseDate = $row_expense['expense_date'];
                                                            $expenseBy = $row_expense['expense_by'];
                                                            $expenseHead = $row_expense['expense_head'];
                                                            $expenseAmount = $row_expense['expense_amount'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $expenseID; ?></td>
                                                        <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $expenseMonth; ?></td>
                                                        <td class="text-center"><?php echo $expenseDate; ?></td>
                                                        <td class="text-center"><?php echo $expenseBy; ?></td>
                                                        <td class="text-center"><?php echo $expenseHead; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="ExpenseInfo.php?info_id=<?php echo $expenseID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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

                                                    elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                        $expHead = $_GET['expHead'] ?? null;
                                                        $expMonth = $_GET['expMonth'] ?? null;
                                                        $fromDate = $_GET['fromDate'] ?? null;
                                                        $toDate = $_GET['toDate'] ?? null;

                                                        if(($fromDate != "" && $toDate != "") || ($expHead != "") || ($expMonth != "")){

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
                                                        
                                                            $select_count = "SELECT COUNT(*) As total_records FROM tblexpense 
                                                                WHERE expense_date BETWEEN '$fromDate' AND '$toDate' OR expense_head='$expHead' OR expense_month='$expMonth' AND ysnactive='1'";
                                                            $result_count = mysqli_query($conn,$select_count);
                                                            $total_records = mysqli_fetch_array($result_count);
                                                            $total_records = $total_records['total_records'];
                                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                            $second_last = $total_no_of_pages - 1; // total page minus 1
                                                            
                                                            $counter = 0;
                                                            $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;
                                                        
                                                            $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense 
                                                                WHERE expense_date BETWEEN '$fromDate' AND '$toDate' OR expense_head='$expHead' OR expense_month='$expMonth' AND ysnactive='1' 
                                                                ORDER BY id ASC LIMIT $offset, $total_records_per_page";
                                                            $run_select_qry = mysqli_query($conn, $select_expense);
                                                            while ($row_expense = mysqli_fetch_assoc($run_select_qry)){
                                                                $expenseID = $row_expense['expense_id'];
                                                                $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                                $expenseMonth = $row_expense['expense_month'];
                                                                $expenseDate = $row_expense['expense_date'];
                                                                $expenseBy = $row_expense['expense_by'];
                                                                $expenseHead = $row_expense['expense_head'];
                                                                $expenseAmount = $row_expense['expense_amount'];

                                                                if(mysqli_num_rows($run_select_qry) > 0){
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                            <td class="text-center"><?php echo $expenseID; ?></td>
                                                            <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                                            <td class="text-center"><?php echo $expenseMonth; ?></td>
                                                            <td class="text-center"><?php echo $expenseDate; ?></td>
                                                            <td class="text-center"><?php echo $expenseBy; ?></td>
                                                            <td class="text-center"><?php echo $expenseHead; ?></td>
                                                            <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
                                                            <td>
                                                                <div class="action-btn">
                                                                    <a href="ExpenseInfo.php?info_id=<?php echo $expenseID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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

                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblexpense WHERE ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                        
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;

                                                        $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense WHERE ysnactive='1' ORDER BY id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_expense);
                                                        while ($row_expense = mysqli_fetch_array($run_select_qry)){
                                                            $expenseID = $row_expense['expense_id'];
                                                            $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                            $expenseMonth = $row_expense['expense_month'];
                                                            $expenseDate = $row_expense['expense_date'];
                                                            $expenseBy = $row_expense['expense_by'];
                                                            $expenseHead = $row_expense['expense_head'];
                                                            $expenseAmount = $row_expense['expense_amount'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $expenseID; ?></td>
                                                        <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                                        <td class="text-center"><?php echo $expenseMonth; ?></td>
                                                        <td class="text-center"><?php echo $expenseDate; ?></td>
                                                        <td class="text-center"><?php echo $expenseBy; ?></td>
                                                        <td class="text-center"><?php echo $expenseHead; ?></td>
                                                        <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="ExpenseInfo.php?info_id=<?php echo $expenseID; ?>" target="_blank" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
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

                                                                $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense WHERE 
                                                                    CONCAT(expense_id,expense_head,expense_month,expense_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                                $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                $rentActual = $row['sum_expense_amount'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                            }
                                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                                $expHead = $_GET['expHead'] ?? null;
                                                                $expMonth = $_GET['expMonth'] ?? null;
                                                                $fromDate = $_GET['fromDate'] ?? null;
                                                                $toDate = $_GET['toDate'] ?? null;
        
                                                                if(($fromDate != "" && $toDate != "") || ($expHead != "") || ($expMonth != "")){
                                                                    $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense 
                                                                        WHERE expense_date BETWEEN '$fromDate' AND '$toDate' OR expense_head='$expHead' OR expense_month='$expMonth' AND ysnactive='1'";
                                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                                    $rentActual = $row['sum_expense_amount'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
                                                        <th class="text-center">Sub-Total</th>

                                                        <?php
                                                                }
                                                            }
                                                            else {
                                                            $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense 
                                                                WHERE ysnactive='1'";
                                                            $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                            $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                            $rentActual = $row['sum_expense_amount'];
                                                        ?>

                                                        <th class="text-center" colspan="7">Sub-Total</th>
                                                        <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>
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
                                                    $expHead = isset($_GET['expHead']) ? $_GET['expHead'] : '';
                                                    $expMonth = isset($_GET['expMonth']) ? $_GET['expMonth'] : '';
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
                                                    elseif(($fromDate != "" && $toDate != "") || ($expHead != "") || ($expMonth != "")){
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>1</a></li>";
                                                            echo "<li><a href='?page=2&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&expHead=$expHead&expMonth=$expMonth&fromDate=$fromDate&toDate=$toDate'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
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
                                    <h3 style="border:2px solid #212529;width:fit-content;margin:0 auto;padding:5px;text-transform:uppercase;">Expense Report</h3>
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
                                                elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                    $expHead = $_GET['expHead'] ?? null;
                                                    $expMonth = $_GET['expMonth'] ?? null;
                                                    $fromDate = $_GET['fromDate'] ?? null;
                                                    $toDate = $_GET['toDate'] ?? null;
                                            ?>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="width:25%">Filter By </th>
                                                <th style="width:25%">Expense Head</th>
                                                <th style="width:25%">Expense Month</th>
                                                <th style="width:25%">Expense Date</th>
                                            </tr>
                                            <tr>
                                                <th style="width:25%"><?php echo $expHead; ?></th>
                                                <th style="width:25%"><?php echo $expMonth; ?></th>
                                                <th style="width:25%"><?php echo $fromDate; ?> - <?php echo $toDate; ?></th>
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
                                            <th class="bg-print">Expense ID</th>
                                            <th class="bg-print">Voucher NO</th>
                                            <th class="bg-print">Month</th>
                                            <th class="bg-print">Date</th>
                                            <th class="bg-print">Expense By</th>
                                            <th class="bg-print">Expense Head</th>
                                            <th class="bg-print">Amount</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['search'])){                                                        
                                                $search_values = $_GET['search'];

                                                $counter = 0;
                                                        
                                                $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense WHERE
                                                CONCAT(expense_id,expense_head,expense_month,expense_by) LIKE '%$search_values%' AND ysnactive='1' 
                                                ORDER BY id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_expense);
                                                while ($row_expense = mysqli_fetch_array($run_select_qry)){
                                                    $expenseID = $row_expense['expense_id'];
                                                    $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                    $expenseMonth = $row_expense['expense_month'];
                                                    $expenseDate = $row_expense['expense_date'];
                                                    $expenseBy = $row_expense['expense_by'];
                                                    $expenseHead = $row_expense['expense_head'];
                                                    $expenseAmount = $row_expense['expense_amount'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $expenseID; ?></td>
                                            <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $expenseMonth; ?></td>
                                            <td class="text-center"><?php echo $expenseDate; ?></td>
                                            <td class="text-center"><?php echo $expenseBy; ?></td>
                                            <td class="text-center"><?php echo $expenseHead; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
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

                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                $expHead = $_GET['expHead'] ?? null;
                                                $expMonth = $_GET['expMonth'] ?? null;
                                                $fromDate = $_GET['fromDate'] ?? null;
                                                $toDate = $_GET['toDate'] ?? null;

                                                if(($fromDate != "" && $toDate != "") || ($expHead != "") || ($expMonth != "")){
                                                    $counter = 0;
                                                            
                                                    $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense WHERE expense_date BETWEEN '$fromDate' AND '$toDate' OR expense_head='$expHead' OR expense_month='$expMonth' AND ysnactive='1' ORDER BY id ASC";
                                                    $run_select_qry = mysqli_query($conn, $select_expense);
                                                    while ($row_expense = mysqli_fetch_assoc($run_select_qry)){
                                                        $expenseID = $row_expense['expense_id'];
                                                        $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                        $expenseMonth = $row_expense['expense_month'];
                                                        $expenseDate = $row_expense['expense_date'];
                                                        $expenseBy = $row_expense['expense_by'];
                                                        $expenseHead = $row_expense['expense_head'];
                                                        $expenseAmount = $row_expense['expense_amount'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $expenseID; ?></td>
                                            <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $expenseMonth; ?></td>
                                            <td class="text-center"><?php echo $expenseDate; ?></td>
                                            <td class="text-center"><?php echo $expenseBy; ?></td>
                                            <td class="text-center"><?php echo $expenseHead; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
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

                                                $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_by,expense_head,expense_amount FROM tblexpense WHERE ysnactive='1' ORDER BY id ASC";
                                                $run_select_qry = mysqli_query($conn, $select_expense);
                                                while ($row_expense = mysqli_fetch_array($run_select_qry)){
                                                    $expenseID = $row_expense['expense_id'];
                                                    $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                    $expenseMonth = $row_expense['expense_month'];
                                                    $expenseDate = $row_expense['expense_date'];
                                                    $expenseBy = $row_expense['expense_by'];
                                                    $expenseHead = $row_expense['expense_head'];
                                                    $expenseAmount = $row_expense['expense_amount'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$counter; ?></td>
                                            <td class="text-center"><?php echo $expenseID; ?></td>
                                            <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                            <td class="text-center"><?php echo $expenseMonth; ?></td>
                                            <td class="text-center"><?php echo $expenseDate; ?></td>
                                            <td class="text-center"><?php echo $expenseBy; ?></td>
                                            <td class="text-center"><?php echo $expenseHead; ?></td>
                                            <td class="text-right"><?php echo '৳ '.$expenseAmount; ?></td>
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

                                                $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense WHERE CONCAT(expense_id,expense_head,expense_month,expense_by) LIKE '%$search_values%' AND ysnactive='1'";
                                                $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                $rentActual = $row['sum_expense_amount'];
                                        ?>

                                                <th class="text-center" colspan="7">Sub-Total</th>
                                                <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>

                                        <?php
                                            }
                                            elseif(isset($_GET['fromDate']) && isset($_GET['toDate']) || isset($_GET['expHead']) || isset($_GET['expMonth'])){
                                                $expHead = $_GET['expHead'] ?? null;
                                                $expMonth = $_GET['expMonth'] ?? null;
                                                $fromDate = $_GET['fromDate'] ?? null;
                                                $toDate = $_GET['toDate'] ?? null;

                                                if(($fromDate != "" && $toDate != "") || ($expHead != "") || ($expMonth != "")){
                                                    $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense WHERE expense_date BETWEEN '$fromDate' AND '$toDate' OR expense_head='$expHead' OR expense_month='$expMonth' AND ysnactive='1'";
                                                    $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                    $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                    $rentActual = $row['sum_expense_amount'];
                                        ?>

                                                <th class="text-center" colspan="7">Sub-Total</th>
                                                <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>

                                        <?php
                                                }
                                            }
                                            else {
                                                $select_total = "SELECT SUM(expense_amount) AS sum_expense_amount FROM tblexpense WHERE ysnactive='1'";
                                                $run_select_sum_qry = mysqli_query($conn, $select_total);
                                                $row = mysqli_fetch_assoc($run_select_sum_qry);
                                                $rentActual = $row['sum_expense_amount'];
                                        ?>

                                                <th class="text-center" colspan="7">Sub-Total</th>
                                                <th class="text-right"><?php echo '৳ '.$rentActual; ?></th>

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

<!-- <script>
    $(document).ready(function(){
        $('#sweetalert').on('click',function(){

            $('#all-data').hide();
            $('#filter-data').show();
        });
    });
</script> -->

<?php include('../includes/footer.php'); ?>