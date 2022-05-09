<?php
    include('../../config/dbconn.php');
    include('../../authentication.php');
    include('../../includes/website/header.php');
    include('../../includes/website/navbar.php');
    include('../../includes/website/sidebar.php');
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
                                        <h1>Menu List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="../Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Menu</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Menu List</li>
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
                                    include('../../message.php');
                                ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="list-imp-btn mb-2 text-right">
                                            <a href="AddMenu.php" class="btn btn-success">Add New</a>
                                        </div>
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Position</th>
                                                        <th>Menu ID</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Slug (URL)</th>
                                                        <th>Visibility</th>
                                                        <th>Active Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    $select_menu = "SELECT * FROM tblwebmenu WHERE ysnactive='1' ORDER BY display_position asc";
                                                    $run_select_qry = mysqli_query($conn, $select_menu);
                                                    while ($row_menu = mysqli_fetch_array($run_select_qry)){
                                                        $menuDisplayPosition = $row_menu['display_position'];
                                                        $menuId = $row_menu['menu_id'];
                                                        $menuTitle = $row_menu['menu_title'];
                                                        $menuDescription = $row_menu['menu_description'];
                                                        $menuSlug = $row_menu['menu_slug_url'];
                                                        $menuVisibleStatus = $row_menu['visible_status'];
                                                        $menuActiveStatus = $row_menu['menu_status'];

                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $menuDisplayPosition; ?></td>
                                                                <td class="text-center"><?php echo $menuId; ?></td>
                                                                <td class="text-center"><?php echo $menuTitle; ?></td>
                                                                <td class="text-center"><?php echo $menuDescription; ?></td>
                                                                <td class="text-center"><?php echo $menuSlug; ?></td>
                                                                <td class="text-center">
                                                                    <?php 
                                                                        if($menuVisibleStatus === '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Visible</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Invisible</span>"; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                                        if($menuActiveStatus === '1'){
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Active</span>"; 
                                                                        }
                                                                        else{
                                                                            echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Deactive</span>"; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <a href="EditFlat.php?edit_id=<?php echo $menuId; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                        <button type="button" value="<?php echo $menuId; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
      <form action="flatCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_flat" class="delete_flat_no" />
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
            
                


<?php include('../../includes/website/script.php'); ?>

<script>
    $(document).ready(function(){
        $('.deletebtn').click(function(e){
            e.preventDefault();

            var flat_No = $(this).val();
            
            $('.delete_flat_no').val(flat_No);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../../includes/website/footer.php'); ?>