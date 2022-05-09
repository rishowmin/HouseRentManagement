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
                                        <h1>Sub-Module</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Settings</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Sub-Module</li>
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
                                if(isset($_GET['edit_id']) != ""){
                            ?>
                            
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="accordion" id="accordionsimplefill">
                                        <div class="acd-group">
                                            <div class="card-header rounded-0 bg-primary">
                                                <h5 class="mb-0">
                                                    <a href="#collapse1" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse"><i class="fa fa-edit"></i> Update Sub-Module</a>
                                                </h5>
                                            </div>
                                            <div id="collapse1" data-parent="#accordionsimplefill">
                                                <div class="card-body">
                                                    <form id="moduleForm" action="moduleCode.php" method="post" class="form-horizontal">
                                                        <div class="row">
                                                            <?php
                                                                if(isset($_GET['edit_id'])){
                                                                    $edit_id = $_GET['edit_id'];
                                                                    $select_submodule = "SELECT * FROM tblsubmodule WHERE id='$edit_id' LIMIT 1";
                                                                    $run_select_qry = mysqli_query($conn, $select_submodule);

                                                                    if(mysqli_num_rows($run_select_qry) > 0){
                                                                        foreach($run_select_qry as $row_submodule){
                                                                            ?>
                                                                    <div class="col-md-12 d-none">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="submoduleID">ID</label>
                                                                            <div class="mb-2">
                                                                                <input type="text" class="form-control" id="submoduleID" name="submoduleID" value="<?php echo $row_submodule['id']; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="submoduleTitle">Sub-Module Title</label>
                                                                            <div class="mb-2">
                                                                                <input type="text" class="form-control" id="submoduleTitle" name="submoduleTitle" value="<?php echo $row_submodule['submodule_title']; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="parentModule">Parent Module</label>
                                                                            <div class="mb-2">
                                                                            <?php
                                                                                $parent_module = "SELECT * FROM tblmodule WHERE id>='2' AND ysnactive='1'";
                                                                                $run_parent_module = mysqli_query($conn,$parent_module);
                                                                                if(mysqli_num_rows($run_parent_module) > 0){
                                                                            ?>
                                                                                <select class="form-control" id="parentModule" name="parentModule">                                                                                    
                                                                                    <option selected hidden><?php echo $row_submodule['submodule_parent']; ?></option>
                                                                                    <option disabled>--Select Parent Module--</option>
                                                                            <?php foreach($run_parent_module as $item) { ?>
                                                                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['module_title']; ?></option>
                                                                            <?php } ?>
                                                                                </select>
                                                                            <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="submoduleOrder">Sub-Module Order</label>
                                                                            <div class="mb-2">
                                                                                <input type="number" class="form-control" id="submoduleOrder" name="submoduleOrder" value="<?php echo $row_submodule['submodule_order']; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="isDisplay">Display Status</label>
                                                                            <div class="checkbox checbox-switch switch-primary">
                                                                                <?php
                                                                                    if($row_submodule['is_display'] === '1'){
                                                                                ?>
                                                                                        <label>
                                                                                            <input type="checkbox" id="isDisplay" name="isDisplay" checked />
                                                                                            <span></span>
                                                                                        </label>
                                                                                <?php
                                                                                    }
                                                                                    else{
                                                                                ?>
                                                                                        <label>
                                                                                            <input type="checkbox" id="isDisplay" name="isDisplay" />
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
                                                                            <label class="control-label" for="submoduleType">Sub-Module Type</label>
                                                                            <div class="mb-2">
                                                                                <select class="form-control" id="submoduleType" name="submoduleType">
                                                                                    <option selected hidden><?php echo $row_submodule['submodule_type']; ?></option>
                                                                                    <option disabled>--Select Sub-Module Type--</option>
                                                                                    <option value="Parent">Parent</option>
                                                                                    <option value="Child">Child</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="submoduleURL">Sub-Module URL</label>
                                                                            <div class="mb-2">
                                                                                <input type="text" class="form-control" id="submoduleURL" name="submoduleURL" value="<?php echo $row_submodule['submodule_url']; ?>" />
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
                                                                    <input type="submit" value="Update" class="btn btn-primary text-uppercase w-100" name="submodule_update_btn" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php                           
                                }
                                elseif(isset($_GET['detail_id']) != ""){                                    
                            ?>
                            
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="accordion" id="accordionsimplefill">
                                        <div class="acd-group">
                                            <div class="card-header rounded-0 bg-primary">
                                                <h5 class="mb-0">
                                                    <a href="#collapse1" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse"><i class="fa fa-info-circle"></i> Sub-Module Details</a>
                                                </h5>
                                            </div>
                                            <div id="collapse1" data-parent="#accordionsimplefill">
                                                <div class="card-body">
                                                    <?php
                                                        if(isset($_GET['detail_id'])){
                                                            $detail_id = $_GET['detail_id'];
                                                            $select_submodule = "SELECT * FROM tblsubmodule WHERE id='$detail_id' LIMIT 1";
                                                            $run_select_qry = mysqli_query($conn, $select_submodule);

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                                foreach($run_select_qry as $row_submodule){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-secondary table-bordered mb-0">
                                                                <tbody class="text-center">
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <td><?php echo $row_submodule['id']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <td><?php echo $row_submodule['submodule_title']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>URL</th>
                                                                        <td><?php echo $row_submodule['submodule_url']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Parent Module</th>
                                                                        <td><?php echo $row_submodule['submodule_parent']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Type</th>
                                                                        <td><?php echo $row_submodule['submodule_type']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Order</th>
                                                                        <td><?php echo $row_submodule['submodule_order']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Display Status</th>
                                                                        <td>
                                                                        <?php 
                                                                            if($row_submodule['is_display'] == '1'){
                                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Active</span>"; 
                                                                            }
                                                                            else{
                                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Deactive</span>"; 
                                                                            }
                                                                        ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php  
                                }
                                else{
                            ?>
                            
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="accordion" id="accordionsimplefill">
                                        <div class="acd-group">
                                            <div class="card-header rounded-0 bg-primary">
                                                <h5 class="mb-0">
                                                    <a href="#collapse1" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse"><i class="fa fa-plus"></i> Create Sub-Module</a>
                                                </h5>
                                            </div>
                                            <div id="collapse1" class="collapse" data-parent="#accordionsimplefill">
                                                <div class="card-body">
                                                    <form id="moduleForm" action="moduleCode.php" method="post" class="form-horizontal">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="submoduleTitle">Sub-Module Title</label>
                                                                    <div class="mb-2">
                                                                        <input type="text" class="form-control" id="submoduleTitle" name="submoduleTitle" placeholder="Sub-Module Title" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="parentModule">Parent Module</label>
                                                                    <div class="mb-2">
                                                                    <?php
                                                                        $parent_module = "SELECT * FROM tblmodule WHERE id>='2' AND ysnactive='1'";
                                                                        $run_parent_module = mysqli_query($conn,$parent_module);
                                                                        if(mysqli_num_rows($run_parent_module) > 0){
                                                                    ?>
                                                                        <select class="form-control" id="parentModule" name="parentModule">
                                                                            <option selected disabled position>--Select Parent Module--</option>
                                                                    <?php foreach($run_parent_module as $item) { ?>
                                                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['module_title']; ?></option>
                                                                    <?php } ?>
                                                                        </select>
                                                                    <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="submoduleOrder">Sub-Module Order</label>
                                                                    <div class="mb-2">
                                                                        <input type="number" class="form-control" id="submoduleOrder" name="submoduleOrder" value="0" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="isDisplay">Display Status</label>
                                                                    <div class="checkbox checbox-switch switch-primary">
                                                                        <label>
                                                                            <input type="checkbox" id="isDisplay" name="isDisplay" checked />
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="submoduleType">Sub-Module Type</label>
                                                                    <div class="mb-2">
                                                                        <select class="form-control" id="submoduleType" name="submoduleType">
                                                                            <option selected disabled position>--Select Module Type--</option>
                                                                            <option value="Parent">Parent</option>
                                                                            <option value="Child">Child</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="submoduleURL">Sub-Module URL</label>
                                                                    <div class="mb-2">
                                                                        <input type="text" class="form-control" id="submoduleURL" name="submoduleURL" placeholder="Sub-Module URL" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase w-100" name="submodule_insert_btn" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php  
                                }
                            ?>

                            

                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="card-title"><i class="fa fa-bar-chart"></i> Sub-Module List</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <form id="" action="" method="GET" class="form-horizontal">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5 style="margin:6px 0;color:#fff;text-align:right;">Filter By</h5>
                                                            </div>

                                                            <div class="col-md-7 pl-0">
                                                                <div class="form-group mb-0">
                                                                    <div class="text-right">
                                                                        <?php
                                                                            $parent_module = "SELECT DISTINCT * FROM tblmodule WHERE id>='2' AND ysnactive='1'";
                                                                            $run_parent_module = mysqli_query($conn,$parent_module);
                                                                            if(mysqli_num_rows($run_parent_module) > 0){
                                                                        ?>
                                                                        <select class="form-control" id="parentModule" name="parentModule" style="height:30px;">
                                                                            <option selected disabled position>--Select Parent Module--</option>
                                                                        <?php foreach($run_parent_module as $item) { ?>
                                                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['module_title']; ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                            
                                                            <div class="col-md-1 pl-0">
                                                                <div class="form-group mb-0">
                                                                    <div class="list-imp-btn text-right">
                                                                        <button type="submit" class="btn btn-light btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Filter" style="width:30px;height:30px;line-height:30px;"><i class="fa fa-filter"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="display compact table table-striped table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Title</th>
                                                        <th>URL</th>
                                                        <th>Parent Module</th>
                                                        <th>Type</th>
                                                        <th>Order</th>
                                                        <th>Display Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- PHP Start -->
                                                <?php
                                                    if(isset($_GET['parentModule'])){
                                                        $parentModule = $_GET['parentModule'] ?? null;

                                                        if($parentModule != ""){

                                                            if (isset($_GET['page']) && $_GET['page']!=""){
                                                                $page_no = $_GET['page'];
                                                            }
                                                            else {
                                                                $page_no = 1;
                                                            }
                                                            
                                                            $total_records_per_page = 5;
                                                            $offset = ($page_no-1) * $total_records_per_page;
                                                            $previous_page = $page_no - 1;
                                                            $next_page = $page_no + 1;
                                                            $adjacents = "2"; 
                                                            
                                                            $select_count = "SELECT COUNT(*) As total_records FROM tblsubmodule 
                                                                WHERE submodule_parent='$parentModule' AND ysnactive='1'";
                                                            $result_count = mysqli_query($conn,$select_count);
                                                            $total_records = mysqli_fetch_array($result_count);
                                                            $total_records = $total_records['total_records'];
                                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                            $second_last = $total_no_of_pages - 1; // total page minus 1
                                                                
                                                            $counter = 0;
                                                            $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;

                                                            $select_submodule = "SELECT tblsubmodule.*,tblmodule.module_title FROM tblsubmodule INNER JOIN tblmodule ON tblmodule.id=tblsubmodule.submodule_parent WHERE tblsubmodule.submodule_parent='$parentModule' AND tblsubmodule.ysnactive='1' ORDER BY tblsubmodule.id ASC LIMIT $offset, $total_records_per_page";
                                                            $run_select_qry = mysqli_query($conn, $select_submodule);
                                                            while ($row_submodule = mysqli_fetch_array($run_select_qry)){
                                                                $submoduleID = $row_submodule['id'];
                                                                $submoduleTitle = $row_submodule['submodule_title'];
                                                                $submoduleURL = $row_submodule['submodule_url'];
                                                                $submoduleParent = $row_submodule['module_title'];
                                                                $submoduleType = $row_submodule['submodule_type'];
                                                                $submoduleOrder = $row_submodule['submodule_order'];
                                                                $isDisplay = $row_submodule['is_display'];

                                                            if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $submoduleTitle; ?></td>
                                                        <td class="text-center"><?php echo $submoduleURL; ?></td>
                                                        <td class="text-center"><?php echo $submoduleParent; ?></td>
                                                        <td class="text-center"><?php echo $submoduleType; ?></td>
                                                        <td class="text-center"><?php echo $submoduleOrder; ?></td>
                                                        <td class="text-center">
                                                        <?php 
                                                            if($isDisplay == '1'){
                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Active</span>"; 
                                                            }
                                                            else{
                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Deactive</span>"; 
                                                            }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="SubModule.php?detail_id=<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-info"></i></a>
                                                                <a href="SubModule.php?edit_id=<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                <button type="button" value="<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
                                                        }
                                                    }

                                                    else{
                                                        if (isset($_GET['page']) && $_GET['page']!=""){
                                                            $page_no = $_GET['page'];
                                                        }
                                                        else {
                                                            $page_no = 1;
                                                        }
                                                            
                                                        $total_records_per_page = 5;
                                                        $offset = ($page_no-1) * $total_records_per_page;
                                                        $previous_page = $page_no - 1;
                                                        $next_page = $page_no + 1;
                                                        $adjacents = "2"; 
                                                            
                                                        $select_count = "SELECT COUNT(*) As total_records FROM tblsubmodule 
                                                            WHERE ysnactive='1'";
                                                        $result_count = mysqli_query($conn,$select_count);
                                                        $total_records = mysqli_fetch_array($result_count);
                                                        $total_records = $total_records['total_records'];
                                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                                                
                                                        $counter = 0;
                                                        $counterNumber = ($page_no - 1) * $total_records_per_page + $counter;

                                                        $select_submodule = "SELECT tblsubmodule.*,tblmodule.module_title FROM tblsubmodule INNER JOIN tblmodule ON tblmodule.id=tblsubmodule.submodule_parent WHERE tblsubmodule.ysnactive='1' ORDER BY tblsubmodule.id ASC LIMIT $offset, $total_records_per_page";
                                                        $run_select_qry = mysqli_query($conn, $select_submodule);
                                                        while ($row_submodule = mysqli_fetch_array($run_select_qry)){
                                                            $submoduleID = $row_submodule['id'];
                                                            $submoduleTitle = $row_submodule['submodule_title'];
                                                            $submoduleURL = $row_submodule['submodule_url'];
                                                            $submoduleParent = $row_submodule['module_title'];
                                                            $submoduleType = $row_submodule['submodule_type'];
                                                            $submoduleOrder = $row_submodule['submodule_order'];
                                                            $isDisplay = $row_submodule['is_display'];

                                                        if(mysqli_num_rows($run_select_qry) > 0){
                                                ?>   
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$counterNumber; ?></td>
                                                        <td class="text-center"><?php echo $submoduleTitle; ?></td>
                                                        <td class="text-center"><?php echo $submoduleURL; ?></td>
                                                        <td class="text-center"><?php echo $submoduleParent; ?></td>
                                                        <td class="text-center"><?php echo $submoduleType; ?></td>
                                                        <td class="text-center"><?php echo $submoduleOrder; ?></td>
                                                        <td class="text-center">
                                                        <?php 
                                                            if($isDisplay == '1'){
                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success'>Active</span>"; 
                                                            }
                                                            else{
                                                                echo "<span class='mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger'>Deactive</span>"; 
                                                            }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="SubModule.php?detail_id=<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-info" data-toggle="tooltip" data-placement="top" data-original-title="Details"><i class="fa fa-info"></i></a>
                                                                <a href="SubModule.php?edit_id=<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                <button type="button" value="<?php echo $submoduleID; ?>" class="btn btn-icon btn-sm btn-round btn-outline-danger deletebtn" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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
                                                    }
                                                ?>                                             
                                                <!-- PHP End -->
                                                </tbody>
                                            </table>


                                            <div class="pagination-div">
                                                <?php                                                
                                                    $parentModule = isset($_GET['parentModule']) ? $_GET['parentModule'] : '';

                                                    if(($parentModule != "")){
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page&parentModule=$parentModule'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&parentModule=$parentModule'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&parentModule=$parentModule'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last&parentModule=$parentModule'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages&parentModule=$parentModule'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1&parentModule=$parentModule'>1</a></li>";
                                                            echo "<li><a href='?page=2&parentModule=$parentModule'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&parentModule=$parentModule'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&parentModule=$parentModule'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&parentModule=$parentModule'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1&parentModule=$parentModule'>1</a></li>";
                                                            echo "<li><a href='?page=2&parentModule=$parentModule'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter&parentModule=$parentModule'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&parentModule=$parentModule'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="padding-top: 5px;">
                                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                    </div>

                                                <?php
                                                    }
                                                    else{
                                                ?>

                                                    <ul class="pagination">
                                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no > 1){ echo "href='?page=$previous_page'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                                <i class="fa fa-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <?php 
                                                        if ($total_no_of_pages <= 10){  	 
                                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }
                                                            }
                                                        }
                                                        elseif($total_no_of_pages > 10){
                                                            
                                                        if($page_no <= 4) {			
                                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                                if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }
                                                            }
                                                            echo "<li><a>...</a></li>";
                                                            echo "<li><a href='?page=$second_last'>$second_last</a></li>";
                                                            echo "<li><a href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                                            }

                                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                            echo "<li><a href='?page=1'>1</a></li>";
                                                            echo "<li><a href='?page=2'>2</a></li>";
                                                            echo "<li><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }                  
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                                                }
                                                            
                                                            else {
                                                            echo "<li><a href='?page=1'>1</a></li>";
                                                            echo "<li><a href='?page=2'>2</a></li>";
                                                            echo "<li><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                            echo "<li class='active'><a>$counter</a></li>";	
                                                                    }else{
                                                            echo "<li><a href='?page=$counter'>$counter</a></li>";
                                                                    }                   
                                                                    }
                                                                }
                                                        }
                                                    ?>
                                                        
                                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                            <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div style="padding-top: 5px;">
                                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                    </div>

                                                <?php
                                                    }
                                                ?>
                                            </div>
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
      <form action="moduleCode.php" method="post">
        <div class="modal-body">            
            <input type="hidden" name="delete_submodule" class="delete_submodule_id" />
            <p>Are you sure, you want to delete this sub-module?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submodule_delete_btn" class="btn btn-danger">Delete</button>
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

            var submodule_id = $(this).val();
            
            $('.delete_submodule_id').val(submodule_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>

<?php include('../includes/footer.php'); ?>







<?php


    // sub-module insert
    if(isset($_POST['submodule_insert_btn'])){
        $submoduleTitle = $_POST['submoduleTitle'];
        $submoduleURL = $_POST['submoduleURL'];
        $parentModule = $_POST['parentModule'];
        $submoduleType = $_POST['submoduleType'];
        $submoduleOrder = $_POST['submoduleOrder'];
        $isDisplay = $_POST['isDisplay'];

        $insert_submodule = "INSERT INTO tblsubmodule(submodule_title,submodule_url,submodule_parent,submodule_type,submodule_order,is_display,ysnactive) 
            VALUES ('$submoduleTitle','$submoduleURL','$parentModule','$submoduleType','$submoduleOrder','$isDisplay','1')";

        $run_insert_qry = mysqli_query($conn, $insert_submodule);

        if($run_insert_qry){
            $_SESSION['success_status'] = "Sub-Module has been inserted successfully!";
            header('location: SubModule.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: SubModule.php');
            exit(0);
        } 
               
    }



    // sub-module update
    if(isset($_POST['submodule_update_btn'])){
        $submoduleID = $_POST['submoduleID'];
        $submoduleTitle = $_POST['submoduleTitle'];
        $submoduleURL = $_POST['submoduleURL'];
        $parentModule = $_POST['parentModule'];
        $submoduleType = $_POST['submoduleType'];
        $submoduleOrder = $_POST['submoduleOrder'];
        $isDisplay = $_POST['isDisplay'];

        $update_submodule = "UPDATE tblsubmodule SET 
            submodule_title='$submoduleTitle',submodule_url='$submoduleURL',submodule_parent='$parentModule',
            submodule_type='$submoduleType',submodule_order='$submoduleOrder',is_display='$isDisplay' WHERE id='$submoduleID'";
            
        $run_update_qry = mysqli_query($conn, $update_submodule);

        if($run_update_qry){
            $_SESSION['success_status'] = "Sub-Module has been updated successfully!";
            header('location: SubModule.php');
            exit(0);
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: SubModule.php');
            exit(0);
        }
    }



    // sub-module delete
    if(isset($_POST['submodule_delete_btn'])){
        $submodule_ID = $_POST['delete_submodule'];
        $ysnactive = $_POST[0];

        $delete_submodule = "UPDATE tblsubmodule SET ysnactive='$ysnactive' WHERE id='$submodule_ID'";
        $run_delete_qry = mysqli_query($conn, $delete_submodule);

        if($run_delete_qry === true){
            $_SESSION['success_status'] = "Sub-Module has been deleted successfully!";
            header('location: SubModule.php');
        }
        else{
            $_SESSION['failed_status'] = "Failed! Try Again.";
            header('location: SubModule.php');
        }
    }

?>