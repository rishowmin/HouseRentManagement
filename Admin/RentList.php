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
                                        <h1>Rent List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Rent</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Rent List</li>
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
                                            <a href="AddRent.php" class="btn btn-success">Add New</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th rowspan="2">SL NO</th>
                                                        <th rowspan="2">Rent ID</th>
                                                        <th rowspan="2">Voucher NO</th>
                                                        <th rowspan="2">Renter ID & Name</th>
                                                        <th rowspan="2">Rental Month</th>
                                                        <th colspan="3">Rent</th>
                                                        <th rowspan="2">Received By</th>
                                                        <th rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Actual</th>
                                                        <th>Service Charge</th>
                                                        <th>Total Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $counter = 0;
                                                    $select_rent = "SELECT tblrent.rent_id, tblrent.renter_id, tblrent.r_invoice_no, tblrent.rent_month, tblrent.rent_actual, tblrent.rent_service_charge, tblrent.rent_total, tblrent.received_by, tblrenter.renter_name 
                                                        FROM tblrent INNER JOIN tblrenter ON tblrent.renter_id=tblrenter.renter_id WHERE tblrent.ysnactive='1' ORDER BY tblrent.id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_rent);
                                                    while ($row_rent = mysqli_fetch_array($run_select_qry)){
                                                        $rentID = $row_rent['rent_id'];
                                                        $rentInvoiceNo = $row_rent['r_invoice_no'];
                                                        $renterID = $row_rent['renter_id'];
                                                        $renterName = $row_rent['renter_name'];
                                                        $rentMonth = $row_rent['rent_month'];
                                                        $rentActual = $row_rent['rent_actual'];
                                                        $rentServiceCharge = $row_rent['rent_service_charge'];
                                                        $rentTotal = $row_rent['rent_total'];
                                                        $rentReceived = $row_rent['received_by'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$counter; ?></td>
                                                                <td class="text-center"><?php echo $rentID; ?></td>
                                                                <td class="text-center"><?php echo $rentInvoiceNo; ?></td>
                                                                <td class="text-center"><?php echo $renterID; ?> <br> <?php echo $renterName; ?></td>
                                                                <td class="text-center"><?php echo $rentMonth; ?></td>
                                                                <td class="text-center"><?php echo $rentActual; ?></td>
                                                                <td class="text-center"><?php echo $rentServiceCharge; ?></td>
                                                                <td class="text-center"><?php echo $rentTotal; ?></td>
                                                                <td class="text-center"><?php echo $rentReceived; ?></td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="RentInfo.php?info_id=<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-dark" data-toggle="tooltip" data-placement="top" data-original-title="Voucher"><i class="fa fa-file"></i></a>
                                                                        <a href="EditRent.php?edit_id=<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $rentID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
      <form action="rentCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_rent" class="delete_rent_id" />
            <p>Are you sure, you want to delete this rent?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="rent_delete_btn" class="btn btn-danger">Delete</button>
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

            var rent_id = $(this).val();
            
            $('.delete_rent_id').val(rent_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>