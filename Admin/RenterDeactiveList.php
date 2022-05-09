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
                                        <h1>Renter Deactive List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Renter</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Renter Deactive List</li>
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
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th></th>
                                                        <th>Renter ID</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Active Status</th>
                                                        <!-- <th>Date of Entry</th> -->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $select_renter = "SELECT * FROM tblrenter WHERE ysnactive='1' and renter_status='0' ORDER BY renter_id desc";
                                                    $run_select_qry = mysqli_query($conn, $select_renter);
                                                    while ($row_renter = mysqli_fetch_array($run_select_qry)){
                                                        $renterImage = $row_renter['renter_img'];
                                                        $renterID = $row_renter['renter_id'];
                                                        $renterName = $row_renter['renter_name'];
                                                        $renterPhone = $row_renter['renter_phone'];
                                                        $renterEmail = $row_renter['renter_email'];
                                                        $renterActiveStatus = $row_renter['renter_status'];
                                                        $renterEntryDate = $row_renter['entry_date'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="list-img">
                                                                        <?php
                                                                            if($renterImage !== ""){
                                                                                echo "<img src='../upload/renter/profile/";
                                                                                echo $renterImage;
                                                                                echo "' />";
                                                                            }
                                                                            else{
                                                                                echo "<img src='../assets/img/blankimage.png' />";
                                                                            }

                                                                        ?>
                                                                    </div>                                                            
                                                                </td>
                                                                <td class="text-center"><?php echo $renterID; ?></td>
                                                                <td class="text-center"><?php echo $renterName; ?></td>
                                                                <td class="text-center"><?php echo $renterPhone; ?></td>
                                                                <td class="text-center"><?php echo $renterEmail; ?></td>
                                                                <td class="text-center">
                                                                    <?php 
                                                                        if($renterActiveStatus === '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Active</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Deactive</span>"; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <!-- <td><?php echo $renterEntryDate; ?></td> -->
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="RenterInfo.php?info_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-eye"></i></a>
                                                                        <a href="EditRenter.php?edit_id=<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $renterID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
      <form action="renterCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_renter" class="delete_renter_id" />
            <p>Are you sure, you want to delete this renter?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="renter_delete_btn" class="btn btn-danger">Delete</button>
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

            var renter_ID = $(this).val();
            
            $('.delete_renter_id').val(renter_ID);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>