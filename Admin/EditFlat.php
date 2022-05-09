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
                        <h1>Flat</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Flat</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update Flat</li>
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
                            <h4 class="card-title">Update Flat</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="FlatList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="flatForm" action="flatCode.php" method="post" class="form-horizontal">
                            <div class="row">
                                <?php
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];
                                        $select_flat = "SELECT * FROM tblflat WHERE flat_id='$edit_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_flat);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_flat){
                                                ?>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label" for="flatID">Flat ID</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="flatID" name="flatID" value="<?php echo $row_flat['flat_id']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label" for="flatFloor">Floor</label>
                                                <div class="mb-2">
                                                    <select class="js-basic-single form-control" id="flatFloor" name="flatFloor">
                                                        <option selected hidden><?php echo $row_flat['flat_floor']; ?></option>
                                                        <option disabled>--Select Which Floor?--</option>
                                                        <option value="Ground Floor">Ground Floor</option>
                                                        <option value="1st Floor">1st Floor</option>
                                                        <option value="2nd Floor">2nd Floor</option>
                                                        <option value="3rd Floor">3rd Floor</option>
                                                        <option value="4th Floor">4th Floor</option>
                                                        <option value="5th Floor">5th Floor</option>
                                                        <option value="6th Floor">6th Floor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="flatActiveStatus">Active Status</label>
                                                <div class="checkbox checbox-switch switch-primary">
                                                    <?php
                                                        if($row_flat['flat_status'] === '1'){
                                                    ?>
                                                    <label>
                                                        <input type="checkbox" id="flatActiveStatus" name="flatActiveStatus" checked />
                                                        <span></span>
                                                    </label>
                                                    <?php
                                                        }
                                                        else{
                                                    ?>
                                                    <label>
                                                        <input type="checkbox" id="flatActiveStatus" name="flatActiveStatus" />
                                                        <span></span>
                                                    </label>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="flatNameEN">Flat Name <span class="label-hints">(English)</span></label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="flatNameEN" name="flatNameEN" value="<?php echo $row_flat['flat_name_en']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="flatNameBN">Flat Name <span class="label-hints">(Bangla)</span></label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="flatNameBN" name="flatNameBN" value="<?php echo $row_flat['flat_name_bn']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="flatNO">Flat NO</label>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="flatNO" name="flatNO" value="<?php echo $row_flat['flat_no']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="flatDescription">Flat Description</label>
                                                <div class="mb-2">
                                                    <textarea class="form-control" id="flatDescription" name="flatDescription" rows="3"><?php 
                                                    echo $row_flat['flat_description']; 
                                                    ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h4>No Record Found.</h4>";
                                        }
                                    }
                                ?>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="flat_update_btn" />
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
    function loadImage(event){
        var output = document.getElementById('previmg');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php include('../includes/footer.php'); ?>



                                        

