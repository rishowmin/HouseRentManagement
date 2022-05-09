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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Expense</li>
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
                            <h4 class="card-title">Add A New Expense</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="ExpenseList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="expenseForm" action="expenseCode.php" method="post" class="form-horizontal">
                            <?php
                                $select_expenseId = "SELECT expense_id FROM tblexpense ORDER BY id desc limit 1";
                                $run_select_qry = mysqli_query($conn, $select_expenseId);
                                $expenseId_row = mysqli_fetch_array($run_select_qry);
                                $last_expenseId = $expenseId_row['expense_id'] ?? 0;
                                if($last_expenseId == ""){
                                    $expenseId = "EXPENSE1";
                                }
                                else{
                                    $expenseId = substr($last_expenseId,7);
                                    $expenseId = intval($expenseId);
                                    $expenseId = "EXPENSE" . ($expenseId + 1);
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="expenseID">Expense ID</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="expenseID" name="expenseID" value="<?php echo $expenseId; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $select_invoiceNo = "SELECT e_invoice_no FROM tblexpense ORDER BY id desc limit 1";
                                    $run_select_qry = mysqli_query($conn, $select_invoiceNo);
                                    $invoiceNo_row = mysqli_fetch_array($run_select_qry);
                                    $last_invoiceNo = $invoiceNo_row['e_invoice_no'] ?? 0;
                                    if($last_invoiceNo == ""){
                                        $invoiceNo = "VOUCHER#1";
                                    }
                                    else{
                                        $invoiceNo = substr($last_invoiceNo,8);
                                        $invoiceNo = intval($invoiceNo);
                                        $invoiceNo = "VOUCHER#" . ($invoiceNo + 1);
                                    }
                                ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="invoiceNo">Voucher No</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" value="<?php echo $invoiceNo; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="expenseMonth">Month of Expense</label>
                                        <div class="mb-2 input-group date" id="expense-month">
                                            <input type="text" class="form-control" id="expenseMonth" name="expenseMonth" placeholder="Month Year" />
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
                                            <input type="text" class="form-control" id="expenseDate" name="expenseDate" placeholder="Day Month Year" />
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
                                            <input type="text" class="form-control" id="expenseHead" name="expenseHead" placeholder="Expense Head" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="expenseAmount">Expense Amount</label>
                                        <div class=" mb-2 input-group">
                                            <input type="number" class="form-control" id="expenseAmount" name="expenseAmount" placeholder="0.00" />
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
                                            <input type="text" class="form-control" id="expenseBy" name="expenseBy" placeholder="Expense By" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="expenseDescription">Expense Description</label>
                                        <div class="mb-2">
                                            <textarea class="form-control" id="expenseDescription" name="expenseDescription" placeholder="Expense Description" rows="3">
                                                <table border="2" cellpadding="2" cellspacing="2" style="width:400px">
                                                    <thead>
                                                        <tr>
                                                            <th scope="row"><p><strong>SL NO</strong></p></th>
                                                            <th scope="col"><p><strong>Description</strong></p></th>
                                                            <th scope="col"><p><strong>Amount</strong></p></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"><strong>1</strong></th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><strong>2</strong></th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><strong>3</strong></th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="expense_insert_btn" />
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



                                        

