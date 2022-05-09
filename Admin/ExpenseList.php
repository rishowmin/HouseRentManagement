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
                                        <h1>Expense List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Expense</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Expense List</li>
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
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="list-imp-btn mb-2 text-right">
                                            <a href="AddExpense.php" class="btn btn-success">Add New</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Expense ID</th>
                                                        <th>Voucher NO</th>
                                                        <th>Expense Month</th>
                                                        <th>Expense Date</th>
                                                        <th>Expense Head</th>
                                                        <th>Expense Amount</th>
                                                        <th>Expense By</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $counter = 0;
                                                    $select_expense = "SELECT expense_id,e_invoice_no,expense_month,DATE_FORMAT(STR_TO_DATE(expense_date, '%Y-%m-%d'), '%d %M %Y') as expense_date,expense_head,expense_amount,expense_by FROM tblexpense WHERE ysnactive='1' ORDER BY id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_expense);
                                                    while ($row_expense = mysqli_fetch_array($run_select_qry)){
                                                        $expenseID = $row_expense['expense_id'];
                                                        $expenseInvoiceNo = $row_expense['e_invoice_no'];
                                                        $expenseMonth = $row_expense['expense_month'];
                                                        $expenseDate = $row_expense['expense_date'];
                                                        $expenseHead = $row_expense['expense_head'];
                                                        $expenseAmount = $row_expense['expense_amount'];
                                                        $expenseBy = $row_expense['expense_by'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$counter; ?></td>
                                                                <td class="text-center"><?php echo $expenseID; ?></td>
                                                                <td class="text-center"><?php echo $expenseInvoiceNo; ?></td>
                                                                <td class="text-center"><?php echo $expenseMonth; ?></td>
                                                                <td class="text-center"><?php echo $expenseDate; ?></td>
                                                                <td class="text-center"><?php echo $expenseHead; ?></td>
                                                                <td class="text-center"><?php echo $expenseAmount; ?></td>
                                                                <td class="text-center"><?php echo $expenseBy; ?></td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="ExpenseInfo.php?info_id=<?php echo $expenseID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                        <a href="EditExpense.php?edit_id=<?php echo $expenseID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $expenseID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
                                                ?>
                                                <?php
                                                    }
                                                ?>                                                
                                                <!-- PHP End -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->







<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="expenseCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_expense" class="delete_expense_id" />
            <p>Are you sure, you want to delete this expense?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="expense_delete_btn" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
            
                




<?php include('../includes/script.php'); ?>

<script>
    $(document).ready(function(){
        $('.deletebtn').click(function(e){
            e.preventDefault();

            var expense_id = $(this).val();
            
            $('.delete_expense_id').val(expense_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>