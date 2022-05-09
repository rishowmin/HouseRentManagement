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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Renter</li>
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
                            <h4 class="card-title">Add A New Renter</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RenterList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="renterForm" action="renterCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                                $select_renterId = "SELECT renter_id FROM tblrenter ORDER BY id desc limit 1";
                                $run_select_qry = mysqli_query($conn, $select_renterId);
                                $renterId_row = mysqli_fetch_array($run_select_qry);
                                $last_renterId = $renterId_row['renter_id'] ?? 0;
                                if($last_renterId == ""){
                                    $renterId = "RENTER1";
                                }
                                else{
                                    $renterId = substr($last_renterId,6);
                                    $renterId = intval($renterId);
                                    $renterId = "RENTER" . ($renterId + 1);
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterID">Renter ID</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterID" name="renterID" value="<?php echo $renterId; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterName">Renter Name</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterName" name="renterName" placeholder="Renter Full Name" />
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
                                                <option selected disabled position>--Select Flat--</option>
                                            <?php foreach($run_flat_query as $item) { ?>
                                                <option value="<?php echo $item['flat_no']; ?>"><?php echo $item['flat_no']; ?></option>
                                            <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="familyMembers">Family Members</label>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="familyMembers" name="familyMembers" placeholder="Renter Family Members" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterPhone">Phone Number</label>
                                        <div class="mb-2">
                                            <input type="tel" class="form-control" id="renterPhone" name="renterPhone" data-mask="(+880) 999 999 9999" placeholder="Renter Phone Number" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterEmail">Email</label>
                                        <div class="mb-2">
                                            <input type="email" class="form-control" id="renterEmail" name="renterEmail" placeholder="Renter Email Address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterAddress">Address</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="renterAddress" name="renterAddress" placeholder="Renter Address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterNID">NID</label>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="renterNID" name="renterNID" placeholder="Renter NID" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterImage">Renter Image</label>
                                        <div class="mb-2">
                                            <input type="file" class="form-control form-control-file" id="renterImage" name="renterImage" onchange="loadImage(event)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="renterImage">Image Preview</label>
                                        <div class="mb-2">
                                            <img id="previmg" class="img-preview" src="../assets/img/add-img.png" width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="renterDocs">Renter Documents</label>
                                        <div class="mb-2">
                                            <input type="file" class="form-control form-control-file" id="renterDocs" name="renterDocs" onchange="loadDocs(event)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="renterImage">Document Preview</label>
                                        <div class="mb-2">
                                            <img id="prevdoc" class="img-preview" src="../assets/img/add-docs.png" width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterEntryDate">Date of Entry</label>
                                        <div class="mb-2 input-group date" id="entry-date">
                                            <input type="text" class="form-control" id="renterEntryDate" name="renterEntryDate" placeholder="MM-DD-YYYY" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterLeaveDate">Date of Leave</label>
                                        <div class="mb-2 input-group date" id="leave-date">
                                            <input type="text" class="form-control" id="renterLeaveDate" name="renterLeaveDate" placeholder="MM-DD-YYYY" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="renterActiveStatus">Active Status</label>
                                        <div class="checkbox checbox-switch switch-primary">
                                            <label>
                                                <input type="checkbox" id="renterActiveStatus" name="renterActiveStatus" checked />
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="expenseDescription">Expense Description</label>
                                        <div class="mb-2">      
                                            <textarea class="form-control" id="expenseDescription" name="expenseDescription" placeholder="Expense Description" rows="3">
                                                <?php
                                                    include('Miscellaneous/renterForm.php');
                                                ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="renter_insert_btn" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <?php
                    include('Miscellaneous/renterForm.php');
                ?>
            </div>
        </div>
        <!-- end Validation row  -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->


<?php include('../includes/script.php'); ?>

<script src="../assets/plugins/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('expenseDescription');
</script>

<script>
    function loadImage(event){
        var output = document.getElementById('previmg');
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadDocs(event){
        var output = document.getElementById('prevdoc');
        output.src = 'assets/img/pdf.png';
    }
</script>

<?php include('../includes/footer.php'); ?>



                                        

