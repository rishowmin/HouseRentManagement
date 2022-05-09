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
                        <h1>Menu</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="../Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Website</li>
                                <li class="breadcrumb-item">
                                    <a href="MenuList.php">Menu</a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Menu</li>
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
                    include('../../message.php');
                ?>
            </div>
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header d-flex">
                        <div class="col-6 card-heading">
                            <h4 class="card-title">Add A New Menu</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="MenuList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="menuForm" action="menuCode.php" method="post" class="form-horizontal">
                            <?php
                                $select_menuId = "SELECT * FROM tblwebmenu ORDER BY menu_id desc limit 1";
                                $run_select_qry = mysqli_query($conn, $select_menuId);
                                $menuId_row = mysqli_fetch_array($run_select_qry);
                                $last_menuId = $menuId_row['menu_id'];
                                if($last_menuId == ""){
                                    $menuId = "MENU-1";
                                }
                                else{
                                    $menuId = substr($last_menuId,5);
                                    $menuId = intval($menuId);
                                    $menuId = "MENU-" . ($menuId + 1);
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="menuId">Menu No</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="menuId" name="menuId" value="<?php echo $menuId; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="menuTitle">Title</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="menuTitle" name="menuTitle" placeholder="Menu Title" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="menuVisibleStatus">Visible Status</label>
                                        <div class="checkbox checbox-switch switch-primary">
                                            <label>
                                                <input type="checkbox" id="menuVisibleStatus" name="menuVisibleStatus" checked />
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="menuDescription">Description</label>
                                        <div class="mb-2">
                                            <textarea class="form-control" id="menuDescription" name="menuDescription" rows="3" placeholder="Menu Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="menuSlug">Slug (URL)</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="menuSlug" name="menuSlug" placeholder="Menu Slug (URL)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="menuDisplayPosition">Display Position</label>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="menuDisplayPosition" name="menuDisplayPosition" placeholder="Display Position" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="menuActiveStatus">Active Status</label>
                                        <div class="checkbox checbox-switch switch-primary">
                                            <label>
                                                <input type="checkbox" id="menuActiveStatus" name="menuActiveStatus" checked />
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="menu_insert_btn" />
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


<?php include('../../includes/website/script.php'); ?>
<?php include('../../includes/website/footer.php'); ?>



                                        

