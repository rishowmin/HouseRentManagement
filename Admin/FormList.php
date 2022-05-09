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
                                        <h1>Forms</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Form</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Form List</li>
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
                                            <a href="AddForm.php" class="btn btn-success">Add New</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Title</th>
                                                        <th>Type</th>
                                                        <th>Language</th>
                                                        <th>Created By</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $counter = 0;
                                                    $select_form = "SELECT form_title,form_type,form_language,created_by FROM tblforms WHERE ysnactive='1' ORDER BY id asc";
                                                    $run_select_qry = mysqli_query($conn, $select_form);
                                                    while ($row_form = mysqli_fetch_array($run_select_qry)){
                                                        $formID = $row_form['id'] ?? null;
                                                        $formTitle = $row_form['form_title'];
                                                        $formType = $row_form['form_type'];
                                                        $formLanguage = $row_form['form_language'];
                                                        $formCreatedBy = $row_form['created_by'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$counter; ?></td>
                                                                <td class="text-center"><?php echo $formTitle; ?></td>
                                                                <td class="text-center"><?php echo $formType; ?></td>
                                                                <td class="text-center"><?php echo $formLanguage; ?></td>
                                                                <td class="text-center"><?php echo $formCreatedBy; ?></td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="EditForm.php?edit_id=<?php echo $formID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $formID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
      <form action="formsCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_form" class="delete_form_id" />
            <p>Are you sure, you want to delete this form?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="form_delete_btn" class="btn btn-danger">Delete</button>
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
            
            $('.delete_form_id').val(rent_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>