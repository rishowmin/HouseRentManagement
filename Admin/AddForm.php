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
                                <li class="breadcrumb-item">Forms</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Form</li>
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
                            <h4 class="card-title">Add A New Form</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="FormList.php" class="btn btn-sm btn-outline-warning text-uppercase">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="forms" action="formsCode.php" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="formTitle">Title</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="formTitle" name="formTitle" placeholder="Form Title" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="formType">Type</label>
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id="formType" name="formType" placeholder="Form Type" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="formLanguage">Language</label>
                                        <div class="mb-2">
                                            <select class="form-control" id="formLanguage" name="formLanguage">
                                                <option selected disabled position>--Select Language--</option>
                                                <option value="English">English</option>
                                                <option value="Bangla">Bangla</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="formContent">Content</label>
                                        <div class="mb-2">      
                                            <textarea class="form-control" id="formContent" name="formContent" rows="3">
                                                <p>Add forms content</p>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" id="sweetalert" class="btn btn-primary text-uppercase" name="form_insert_btn" />
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

<script src="../assets/plugins/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('formContent');
</script>

<?php include('../includes/footer.php'); ?>

