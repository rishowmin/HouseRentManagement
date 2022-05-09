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
                        <h1>Role</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Role</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Role</li>
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
                            <h4 class="card-title">Add A New Role</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RoleList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="roleForm" action="roleCode.php" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="roleName">Role Name</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="roleName" name="roleName" placeholder="Role Name" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="roleDescription">Role Description</label>
                                        <div class="mb-2">
                                            <textarea class="form-control" id="roleDescription" name="roleDescription" rows="3" placeholder="Role Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="modulePermission">Module Permission</label>
                                        <div class="mb-2" style="height:250px;overflow-y:scroll;border:1px solid #9596a1;border-radius:0.25rem;padding:10px 5px;">
                                            <ul class="list-style-none">
                                                <li>
                                                    <div class="form-check" style="padding:5px 35px;">
                                                        <input class="form-check-input" type="checkbox" id="select-all" />
                                                        <label class="form-check-label" for="select-all">Select All</label>
                                                    </div>
                                                </li>
                                                <?php
                                                    $sidebar_module = "SELECT * FROM tblpagetemp WHERE parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                                    $run_module = mysqli_query($conn, $sidebar_module);
                                                    while ($row_module = mysqli_fetch_assoc($run_module)){
                                                        $moduleID = $row_module['id'];
                                                ?>
                                                <li style="padding:0px 30px;">
                                                    <div class="form-check" style="padding:5px 35px;">
                                                        <input class="form-check-input" type="checkbox" id="<?php echo $row_module['id']; ?>" name="modulePermission[]" value="<?php echo $row_module['id']; ?>" />
                                                        <label class="form-check-label" for="<?php echo $row_module['id']; ?>"><?php echo $row_module['page_title']; ?></label>
                                                    </div>
                                                    
                                                    <ul class="list-style-none" style="padding-left:30px;">
                                                    <?php
                                                        $sidebar_submodule = "SELECT * FROM tblpagetemp WHERE parent_id='$moduleID' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                                        $run_submodule = mysqli_query($conn, $sidebar_submodule);
                                                        while ($row_submodule = mysqli_fetch_assoc($run_submodule)){
                                                    ?>
                                                        <li>
                                                            <div class="form-check" style="padding:5px 35px;">
                                                                <input class="form-check-input" type="checkbox" id="<?php echo $row_submodule['id']; ?>" name="modulePermission[]" value="<?php echo $row_submodule['id']; ?>" />
                                                                <label class="form-check-label" for="<?php echo $row_submodule['id']; ?>"><?php echo $row_submodule['page_title']; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php
                                                        }
                                                    ?>
                                                    </ul>

                                                </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="role_insert_btn" />
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

<script>
    $(document).ready(function(){
        $("#roleForm #select-all").click(function(){
            $("#roleForm input[type=checkbox]").prop('checked',this.checked);
        });
    });
</script>

<?php include('../includes/footer.php'); ?>



                                        

