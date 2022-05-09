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
                                        <h1>Role List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Role</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Role List</li>
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
                                <div class="row">
                                    <?php
                                        $select_role = "SELECT * FROM tblrole WHERE ysnactive='1' ORDER BY id asc";
                                        $run_select_qry = mysqli_query($conn, $select_role);
                                        while ($row_role = mysqli_fetch_array($run_select_qry)){
                                            $roleID = $row_role['id'];
                                            $roleName = $row_role['role_name'];
                                            $roleDescription = $row_role['role_description'];
                                            $modulePermission = $row_role['page_access'];

                                            if(mysqli_num_rows($run_select_qry) > 0){
                                    ?>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="text-center p-2">
                                                    <div class="mb-2 w-75 m-auto">
                                                        <?php
                                                            if($roleName == "Admin"){
                                                                echo "<img src='../assets/img/role-badge/admin-badge.png' width='100%; alt='Admin'>";
                                                            }
                                                            elseif($roleName == "Manager"){
                                                                echo "<img src='../assets/img/role-badge/manager-badge.png' width='100%; alt='Manager'>";                                                                            
                                                            }
                                                            else{
                                                                echo "<img src='../assets/img/role-badge/renter-badge.png' width='100%; alt='Renter'>";
                                                            }
                                                        ?>
                                                    </div>
                                                    <h4 class="mb-0"><?php echo $roleName; ?></h4>
                                                    <p class="mb-2"><?php echo $roleDescription; ?></p>
                                                    <div class="action-btn">
                                                        <a href="EditRole.php?edit_id=<?php echo $roleID; ?>&page_access=<?php echo $modulePermission; ?>" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                        <button type="button" value="<?php echo $roleID; ?>" class="btn btn-icon btn-danger deletebtn" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            }
                                        }
                                    ?>
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
      <form action="roleCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_role" class="delete_role_id" />
            <p>Are you sure, you want to delete this role?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="role_delete_btn" class="btn btn-danger">Delete</button>
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

            var role_id = $(this).val();
            
            $('.delete_role_id').val(role_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>