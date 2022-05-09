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
                        <h1>Renter</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Renter</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update Renter</li>
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
                            <h4 class="card-title">Update Renter</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RenterList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="renterForm" action="renterCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row">

                                <?php
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];
                                        $select_renter = "SELECT * FROM tblrenter WHERE renter_id='$edit_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_renter);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_renter){
                                                ?>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterID">Renter ID</label>
                                                            <div class="mb-2">
                                                                <input type="text" class="form-control" id="renterID" name="renterID" value="<?php echo $row_renter['renter_id']; ?>" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterName">Renter Name</label>
                                                            <div class="mb-2">
                                                                <input type="text" class="form-control" id="renterName" name="renterName" value="<?php echo $row_renter['renter_name']; ?>" placeholder="Renter Full Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="flatNo">Flat No</label>
                                                            <div class="mb-2">
                                                                <?php
                                                                    $flat_query = "SELECT * FROM tblflat WHERE flat_status='1' AND ysnactive='1'";
                                                                    $run_flat_query = mysqli_query($conn,$flat_query);
                                                                    if(mysqli_num_rows($run_flat_query) > 0){
                                                                ?>
                                                                <select class="form-control" id="flatNo" name="flatNo">
                                                                    <option selected disabled>--Select Flat--</option>
                                                                <?php foreach($run_flat_query as $item) { ?>
                                                                    <option value="<?php echo $item['flat_no']; ?>" <?php echo $row_renter['flat_no'] == $item['flat_no'] ? 'selected':'' ?>><?php echo $item['flat_no']; ?></option>
                                                                <?php } ?>
                                                                </select>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label" for="familyMembers">Family Members</label>
                                                            <div class="mb-2">
                                                                <input type="number" class="form-control" id="familyMembers" name="familyMembers" value="<?php echo $row_renter['family_members']; ?>" placeholder="Renter Family Members" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterPhone">Phone Number</label>
                                                            <div class="mb-2">
                                                                <input type="tel" class="form-control" id="renterPhone" name="renterPhone" value="<?php echo $row_renter['renter_phone']; ?>" data-mask="(+880) 999 999 9999" placeholder="Renter Phone Number" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterEmail">Email</label>
                                                            <div class="mb-2">
                                                                <input type="email" class="form-control" id="renterEmail" name="renterEmail" value="<?php echo $row_renter['renter_email']; ?>" placeholder="Renter Email Address" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterNID">NID</label>
                                                            <div class="mb-2">
                                                                <input type="number" class="form-control" id="renterNID" name="renterNID" value="<?php echo $row_renter['renter_nid']; ?>" placeholder="Renter NID" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterAddress">Parmanent Address</label>
                                                            <div class="input-group">
                                                                <textarea class="form-control" id="renterAddress" name="renterAddress" rows="3" placeholder="Renter Address"><?php
                                                                echo $row_renter['renter_address'];
                                                                ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterEntryDate">Date of Entry</label>
                                                            <div class="mb-2 input-group date" id="entry-date">
                                                                <input type="text" class="form-control" id="renterEntryDate" name="renterEntryDate" value="<?php echo $row_renter['entry_date']; ?>" placeholder="MM-DD-YYYY" />
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterLeaveDate">Date of Leave</label>
                                                            <div class="mb-2 input-group date" id="leave-date">
                                                                <input type="text" class="form-control" id="renterLeaveDate" name="renterLeaveDate" value="<?php echo $row_renter['leave_date']; ?>" placeholder="MM-DD-YYYY" />
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterActiveStatus">Active Status</label>
                                                            <div class="checkbox checbox-switch switch-primary">
                                                                <?php
                                                                    if($row_renter['renter_status'] === '1'){
                                                                ?>
                                                                        <label>
                                                                            <input type="checkbox" id="renterActiveStatus" name="renterActiveStatus" checked />
                                                                            <span></span>
                                                                        </label>
                                                                <?php
                                                                    }
                                                                    else{
                                                                ?>
                                                                        <label>
                                                                            <input type="checkbox" id="renterActiveStatus" name="renterActiveStatus" />
                                                                            <span></span>
                                                                        </label>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterImage">Renter Image</label>
                                                            <div class="mb-2 text-center">
                                                            <?php
                                                                if($row_renter['renter_img'] !== ""){
                                                            ?>
                                                            <a href="upload/renter/profile/<?php echo $row_renter['renter_img']; ?>" target="_blank">
                                                                <img id="previmg" class="img-preview" src="../assets/upload/renter/profile/<?php echo $row_renter['renter_img']; ?>" width="200px" height="200px" alt="<?php echo $row_renter['renter_img']; ?>">
                                                            </a>
                                                            <?php
                                                                }
                                                                else{
                                                                    echo "<img id='previmg' class='img-preview' src='../assets/img/no-img.png' height='200px' width='200px' />";
                                                                }
                                                            ?>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mb-2">
                                                                <input type="file" class="form-control" id="renterImage" name="renterImage" onchange="loadImage(event)" />
                                                                <input type="hidden" class="form-control" id="renterOldImage" name="renterOldImage" value="<?php echo $row_renter['renter_img']; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>                                                  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="renterDocs">Renter Document</label>
                                                            <div class="mb-2 text-center">
                                                            <?php
                                                                if($row_renter['renter_doc'] !== ""){
                                                            ?>
                                                            <a href="../upload/renter/docu/<?php echo $row_renter['renter_doc']; ?>" target="_blank">
                                                                <img id="prevdoc" class="doc-preview" src="../assets/img/pdf.png" width="200px" height="200px" alt="<?php echo $row_renter['renter_doc']; ?>">
                                                            </a>
                                                            <?php
                                                                }
                                                                else{
                                                                    echo "<img id='prevdoc' class='doc-preview' src='../assets/img/no-docs.png' height='200px' width='200px' />";
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mb-2">
                                                                <input type="file" class="form-control" id="renterDocs" name="renterDocs" onchange="loadDocs(event)" />
                                                                <input type="hidden" class="form-control" id="renterOldDocs" name="renterOldDocs" value="<?php echo $row_renter['renter_doc']; ?>" />
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
                                        <input type="submit" value="Update" class="btn btn-primary text-uppercase" name="renter_update_btn" />
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

function loadDocs(event){
    var output = document.getElementById('prevdoc');
    output.src = '../assets/img/pdf.png';
}
</script>

<?php include('../includes/footer.php'); ?>