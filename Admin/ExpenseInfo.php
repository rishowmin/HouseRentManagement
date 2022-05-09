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
                        <h1>Expense</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Expense</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Expense's Info</li>
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
                            <h4 class="card-title">Expense's Info</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="ExpenseList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['info_id'])){
                            $info_id = $_GET['info_id'];
                            $select_expense = "SELECT expense_id, expense_head, expense_amount, expense_month, DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date, expense_by, expense_description
                                FROM tblexpense WHERE tblexpense.expense_id='$info_id' LIMIT 1";
                            $run_select_qry = mysqli_query($conn, $select_expense);

                            if(!$run_select_qry || mysqli_num_rows($run_select_qry) > 0){
                                foreach($run_select_qry as $row_expense){
                    ?>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-header-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row invoice-info-row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Expense ID</strong></p>
                                                                        <p><?php echo $row_expense['expense_id']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Expense By</strong></p>
                                                                        <p><?php echo $row_expense['expense_by']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Month of Expense</strong></p>
                                                                        <p><?php echo $row_expense['expense_month']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Expense Date</strong></p>
                                                                        <p><?php echo $row_expense['expense_date']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Expense Head</strong></p>
                                                                        <p><?php echo $row_expense['expense_head']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info-left text-center">
                                                                        <p><strong>Expense Amount</strong></p>
                                                                        <p><?php echo $row_expense['expense_amount']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="invoice-info-right text-center">
                                                                <p class="mb-2 text-left"><strong>Expense Description</strong></p>
                                                                <div class="invoice-info-table"><?php 
                                                                echo $row_expense['expense_description'];
                                                                ?></div>
                                                                <table border="2" cellpadding="2" cellspacing="2" style="width:400px">
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th colspan="2" class="text-right"><p><strong>Total</strong></p></th>
                                                                            <th class="text-right" style="width: 110px;"><p><strong><?php echo $row_expense['expense_amount']; ?></strong></p></th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
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
        </div>
        <!-- end Validation row  -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->




<?php include('../includes/script.php'); ?>
<?php include('../includes/footer.php'); ?>