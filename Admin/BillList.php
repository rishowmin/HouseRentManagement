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
                                        <h1>Utility Bills List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Utility Bills</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Utility Bills List</li>
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
                                            <a href="AddBill.php" class="btn btn-success">Add New</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th rowspan="2">SL NO</th>
                                                        <th rowspan="2">Bill ID</th>
                                                        <th rowspan="2">Voucher NO</th>
                                                        <th rowspan="2">Renter ID & Name</th>
                                                        <th rowspan="2">Billing Month</th>
                                                        <th colspan="5">Bills</th>
                                                        <th rowspan="2">Received By</th>
                                                        <th rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Electricity</th>
                                                        <th>Gas</th>
                                                        <th>Water</th>
                                                        <th>Internet</th>
                                                        <th>Total Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $counter = 0;
                                                    $select_bill = "SELECT tblbills.bill_id, tblbills.renter_id, tblbills.b_invoice_no, tblbills.bill_month, tblbills.bill_electricity, tblbills.bill_gas, tblbills.bill_water, tblbills.bill_internet, tblbills.bill_total, tblbills.received_by, tblrenter.renter_name 
                                                    FROM tblbills INNER JOIN tblrenter ON tblbills.renter_id=tblrenter.renter_id WHERE tblbills.ysnactive='1' ORDER BY tblbills.id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_bill);
                                                    while ($row_bill = mysqli_fetch_array($run_select_qry)){
                                                        $billID = $row_bill['bill_id'];
                                                        $billInvoiceNo = $row_bill['b_invoice_no'];
                                                        $renterID = $row_bill['renter_id'];
                                                        $renterName = $row_bill['renter_name'];
                                                        $billMonth = $row_bill['bill_month'];
                                                        $billElectricity = $row_bill['bill_electricity'];
                                                        $billGas = $row_bill['bill_gas'];
                                                        $billWater = $row_bill['bill_water'];
                                                        $billInternet = $row_bill['bill_internet'];
                                                        $billTotal = $row_bill['bill_total'];
                                                        $billReceived = $row_bill['received_by'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$counter; ?></td>
                                                                <td class="text-center"><?php echo $billID; ?></td>
                                                                <td class="text-center"><?php echo $billInvoiceNo; ?></td>
                                                                <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                                <td class="text-center"><?php echo $billMonth; ?></td>
                                                                <td class="text-center"><?php echo $billElectricity; ?></td>
                                                                <td class="text-center"><?php echo $billGas; ?></td>
                                                                <td class="text-center"><?php echo $billWater; ?></td>
                                                                <td class="text-center"><?php echo $billInternet; ?></td>
                                                                <td class="text-center"><?php echo $billTotal; ?></td>
                                                                <td class="text-center"><?php echo $billReceived; ?></td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="BillInfo.php?info_id=<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                        <a href="EditBill.php?edit_id=<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $billID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
      <form action="billCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_bill" class="delete_bill_id" />
            <p>Are you sure, you want to delete this bill?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="bill_delete_btn" class="btn btn-danger">Delete</button>
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

            var bill_id = $(this).val();
            
            $('.delete_bill_id').val(bill_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>