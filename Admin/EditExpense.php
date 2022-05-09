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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update Expense</li>
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
                            <h4 class="card-title">Update Expense</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="ExpenseList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="expenseForm" action="expenseCode.php" method="post" class="form-horizontal">
                            <div class="row">
                            <?php
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];
                                        $select_expense = "SELECT * FROM tblexpense WHERE expense_id='$edit_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_expense);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_expense){
                                                ?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseID">Expense ID</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="expenseID" name="expenseID" value="<?php echo $row_expense['expense_id']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="invoiceNo">Voucher NO</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" value="<?php echo $row_expense['e_invoice_no']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseMonth">Month of Expense</label>
                                                <div class="mb-2 input-group date" id="expense-month">
                                                    <input type="text" class="form-control" id="expenseMonth" name="expenseMonth" value="<?php echo $row_expense['expense_month']; ?>" placeholder="Month Year" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseDate">Date of Expense</label>
                                                <div class="mb-2 input-group date" id="expense-date">
                                                    <input type="text" class="form-control" id="expenseDate" name="expenseDate" value="<?php echo $row_expense['expense_date']; ?>" placeholder="Day Month Year" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseHead">Expense Head</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="expenseHead" name="expenseHead" value="<?php echo $row_expense['expense_head']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseAmount">Expense Amount</label>
                                                <div class=" mb-2 input-group">
                                                    <input type="number" class="form-control" id="expenseAmount" name="expenseAmount" value="<?php echo $row_expense['expense_amount']; ?>" placeholder="0.00" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">৳</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseBy">Expense By</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="expenseBy" name="expenseBy" value="<?php echo $row_expense['expense_by']; ?>" placeholder="Received By" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="expenseDescription">Expense Description</label>
                                                <div class="mb-2">
                                                    <textarea class="form-control" id="expenseDescription" name="expenseDescription" rows="3"><?php 
                                                    echo trim($row_expense['expense_description']);
                                                    ?></textarea>
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
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="expense_update_btn" />
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

<script src="../assets/plugins/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('expenseDescription');
</script>

<?php include('../includes/footer.php'); ?>



                                        

