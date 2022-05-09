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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Renter's Info</li>
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
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header d-flex">
                        <div class="col-6 card-heading">
                            <h4 class="card-title">Renter's Info</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="RenterList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">




                    <?php
                                    if(isset($_GET['info_id'])){
                                        $info_id = $_GET['info_id'];
                                        $select_renter = "SELECT renter_id, renter_name, flat_no, family_members, renter_phone, renter_email, renter_address, renter_img, renter_nid, renter_doc, DATE_FORMAT(STR_TO_DATE(entry_date, '%Y-%m-%d'), '%d %M %Y') as entry_date, DATE_FORMAT(STR_TO_DATE(leave_date, '%Y-%m-%d'), '%d %M %Y') as leave_date, renter_status FROM tblrenter WHERE renter_id='$info_id' LIMIT 1";
                                        $run_select_qry = mysqli_query($conn, $select_renter);

                                        if(mysqli_num_rows($run_select_qry) > 0){
                                            foreach($run_select_qry as $row_renter){
                    ?>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <?php 
                                            if($row_renter['renter_img'] != ""){
                                        ?>

                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="../assets/upload/renter/profile/<?php echo $row_renter['renter_img']; ?>" alt="png-img" width="100%">
                                            </div>
                                            <h4 class="mb-2"><?php echo $row_renter['renter_img']; ?></h4>
                                        </div>
                                                
                                        <?php
                                            }
                                            else{
                                        ?>

                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="../assets/img/file-icon/img.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-2">No Image Available</h4>
                                        </div>

                                        <?php
                                            }     
                                        ?>
                                    </div>
                                </div>

                                <div class="card card-statistics mt-4">
                                    <div class="card-body">
                                        <?php 
                                            if($row_renter['renter_doc'] != ""){
                                        ?>

                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="../assets/img/file-icon/pdf.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-2"><?php echo $row_renter['renter_doc']; ?></h4>
                                            <!-- <p class="mb-2">28.8 kb</p> -->
                                            <a href="../assets/upload/renter/docu/<?php echo $row_renter['renter_doc']; ?>" target="_blank" class="btn btn-light">Preview</a>
                                            <a href="../assets/upload/renter/docu/<?php echo $row_renter['renter_doc']; ?>" class="btn btn-light" Download>Download</a>
                                        </div>
                                                
                                        <?php
                                            }
                                            else{
                                        ?>

                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="../assets/img/file-icon/pdf.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-2">No Document Available</h4>
                                        </div>

                                        <?php
                                            }     
                                        ?>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-info table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%"><h4 class="m-0">Renter ID</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_id']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Full Name</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_name']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Flat No</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['flat_no']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Family Members</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['family_members']; ?> person(s)</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Phone Number</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_phone']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Email</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_email']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Address</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_address']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">NID</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['renter_nid']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Date Of Entry</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['entry_date']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Date Of Leave</h4></td>
                                                        <td><h4 class="m-0"><?php echo $row_renter['leave_date']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Document Status</h4></td>
                                                        <td>
                                                            <h4 class="m-0">
                                                                <?php
                                                                    if($row_renter['renter_doc'] === ""){
                                                                        echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger'>Not Yet</span>"; 
                                                                    }
                                                                    else{
                                                                        echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success'>Provided</span>"; 
                                                                    }
                                                                ?>
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 class="m-0">Active Status</h4></td>
                                                        <td>
                                                            <h4 class="m-0">
                                                                <?php
                                                                    if($row_renter['renter_status'] === '1'){
                                                                        echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success'>Active</span>"; 
                                                                    }
                                                                    else{
                                                                        echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger'>Deactive</span>"; 
                                                                    }
                                                                ?>
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>










                        

                    <?php
                                            }
                                        }
                                    }

                    ?>





                        
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
<?php include('../includes/footer.php'); ?>