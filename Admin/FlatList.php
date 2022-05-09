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
                                        <h1>Flat List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Flat</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Flat List</li>
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

                            <?php
                                $select_flat = "SELECT flat_id,flat_floor,flat_name_en,flat_name_bn,flat_no,SUBSTRING(flat_description, 1, 80) as flat_description,flat_status FROM tblflat WHERE ysnactive='1' ORDER BY id asc";
                                $run_select_qry = mysqli_query($conn, $select_flat);
                                while ($row_flat = mysqli_fetch_array($run_select_qry)){
                                    $flatID = $row_flat['flat_id'];
                                    $flatFloor = $row_flat['flat_floor'];
                                    $flatNameEN = $row_flat['flat_name_en'];
                                    $flatNameBN = $row_flat['flat_name_bn'];
                                    $flatNO = $row_flat['flat_no'];
                                    $flatDescrp = $row_flat['flat_description'];
                                    $flatActiveStatus = $row_flat['flat_status'];

                                    if(mysqli_num_rows($run_select_qry) > 0){
                            ?>
                            <div class="col-xl-4 col-sm-12">
                                <div class="card card-statistics">
                                    <div class="flat-banner text-center">
                                        <h2><?php echo $flatNameBN; ?></h2>
                                        <h4><?php echo $flatNameEN; ?></h4>
                                    </div>
                                    <div class="card-body flat-body pb-4 pt-4 text-center">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <h4><?php echo $flatNO; ?></h4>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <h5><?php echo $flatFloor; ?></h5>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="mb-4"><?php echo $flatDescrp; ?>...</p>
                                            </div>

                                            <div class="col-md-6 text-left">
                                                <h4 class="mb-0">
                                                    <?php 
                                                        if($flatActiveStatus === '1'){
                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Ready For Rent</span>"; 
                                                        }
                                                        else{
                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Under Construction</span>"; 
                                                        }
                                                    ?>
                                                </h4>
                                            </div>
                                            
                                            <div class="col-md-6 text-right">
                                                <a href="EditFlat.php?edit_id=<?php echo $flatID; ?>" class="btn btn-icon btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                <button type="button" value="<?php echo $flatID; ?>" class="btn btn-icon btn-sm btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                
                            <?php
                                }
                                else{
                            ?>
                                <h4>No Records Found</h4>
                            <?php
                                }
                            }
                            ?>                            
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
      <form action="flatCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_flat" class="delete_flat_id" />
            <p>Are you sure, you want to delete this flat?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="flat_delete_btn" class="btn btn-danger">Delete</button>
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

            var flat_ID = $(this).val();
            
            $('.delete_flat_id').val(flat_ID);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>