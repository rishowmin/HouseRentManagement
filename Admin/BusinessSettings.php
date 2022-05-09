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
                        <h1>Business Settings</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="Dashboard.php"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"> Settings</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Business Settings</li>
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
                $select_business = "SELECT * FROM tblbusinesssettings";
                $run_select_business = mysqli_query($conn, $select_business);

                if(mysqli_num_rows($run_select_business) > 0){
                    foreach($run_select_business as $rowBusiness){
                        $businessID = $rowBusiness['id'];
                        $businessTitleEN = $rowBusiness['business_title_en'];
                        $businessTitleBN = $rowBusiness['business_title_bn'];
                        $businessSloganEN = $rowBusiness['business_slogan_en'];
                        $businessSloganBN = $rowBusiness['business_slogan_bn'];
                        $businessTypeLong = $rowBusiness['business_type_long'];
                        $businessTypeShort = $rowBusiness['business_type_short'];
                        $businessAddress = $rowBusiness['business_address'];
                        $businessCity = $rowBusiness['business_city'];
                        $businessState = $rowBusiness['business_state'];
                        $businessCountry = $rowBusiness['business_country'];
                        $businessZipCode = $rowBusiness['business_zipCode'];
                        $businessEmail = $rowBusiness['business_email'];
                        $businessPhone = $rowBusiness['business_phone'];
                        $businessLogo = $rowBusiness['business_logo'];
                        $businessIcon = $rowBusiness['business_icon'];
                        $businessFB = $rowBusiness['business_social_facebook'];
                        $businessInsta = $rowBusiness['business_social_instagram'];
                        $businessWA = $rowBusiness['business_social_whatsapp'];
                        $businessYT = $rowBusiness['business_social_youtube'];
            ?>

            <div id="business-settings" class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 card-heading">
                                <h4 class="card-title"><i class="fa fa-briefcase"></i> Manage Your Business</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-xl-3 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Business Logo & Icon</h5>
                                    </div>

                                    <div class="page-profil-pic">
                                        <div class="profile-img text-center rounded-circle">
                                            <div class="pt-3">
                                                <form id="businessLogoIconForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                
                                                    <div class="p-4">
                                                        <div class="form-group d-none">
                                                            <input type="text" class="form-control" id="businessID" name="businessID" value="<?php echo $businessID; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="bg-img bg-business-img m-auto">
                                                                <?php
                                                                    if($businessLogo !== ""){
                                                                ?>
                                                                <img id="prevlogo"  src="../assets/upload/business/<?php echo $businessLogo; ?>" class="img-fluid" alt="<?php echo $businessLogo; ?>" />
                                                                <?php
                                                                    }
                                                                    else{
                                                                        echo "<img id='prevlogo' class='img-fluid' src='../assets/upload/business/blank-logo.png' alt='No Image Found!' />";
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="mb-2 input-group">
                                                                <input type="file" class="form-control" id="businessLogo" name="businessLogo" onchange="loadLogo(event)" />
                                                                <input type="hidden" class="form-control" id="businessOldLogo" name="businessOldLogo" value="<?php echo $businessLogo; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="bg-img bg-business-img m-auto">
                                                                <?php
                                                                    if($businessIcon !== ""){
                                                                ?>
                                                                <img id="previcon"  src="../assets/upload/business/<?php echo $businessIcon; ?>" class="img-fluid" alt="<?php echo $businessIcon; ?>" />
                                                                <?php
                                                                    }
                                                                    else{
                                                                        echo "<img id='previcon' class='img-fluid' src='../assets/upload/business/blank-icon.png' alt='No Image Found!' />";
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="mb-2 input-group">
                                                                <input type="file" class="form-control" id="businessIcon" name="businessIcon" onchange="loadIcon(event)" />
                                                                <input type="hidden" class="form-control" id="businessOldIcon" name="businessOldIcon" value="<?php echo $businessIcon; ?>" />
                                                            </div>
                                                        </div>
                                                    
                                                        <input type="submit" class="btn btn-primary" name="business_logo_icon_btn" value="Update Logo & Icon" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Business Information</h5>
                                    </div>
                                    <div class="page-personal p-4">
                                        <form id="manageProfilePersonalForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 d-none">
                                                    <label for="businessLogo">Business ID</label>
                                                    <input type="text" class="form-control" id="businessID" name="businessID" value="<?php echo $businessID; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessTitleEN">Title <span class="label-hints">(English)</span></label>
                                                    <input type="text" class="form-control" id="businessTitleEN" name="businessTitleEN" value="<?php echo $businessTitleEN; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessTitleBN">Title <span class="label-hints">(Bangla)</span></label>
                                                    <input type="text" class="form-control" id="businessTitleBN" name="businessTitleBN" value="<?php echo $businessTitleBN; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessSloganEN">Slogan <span class="label-hints">(English)</span></label>
                                                    <input type="text" class="form-control" id="businessSloganEN" name="businessSloganEN" value="<?php echo $businessSloganEN; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessSloganBN">Slogan <span class="label-hints">(Bangla)</span></label>
                                                    <input type="text" class="form-control" id="businessSloganBN" name="businessSloganBN" value="<?php echo $businessSloganBN; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessTypeLong">Type <span class="label-hints">(Long)</span></label>
                                                    <input type="text" class="form-control" id="businessTypeLong" name="businessTypeLong" value="<?php echo $businessTypeLong; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessTypeShort">Type <span class="label-hints">(Short)</span></label>
                                                    <input type="text" class="form-control" id="businessTypeShort" name="businessTypeShort" value="<?php echo $businessTypeShort; ?>">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="businessAddress">Address</label>
                                                    <textarea class="form-control" id="businessAddress" name="businessAddress" rows="2" placeholder="Business Address"><?php
                                                    echo $businessAddress;
                                                    ?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessCity">City</label>
                                                    <input type="text" class="form-control" id="businessCity" name="businessCity" value="<?php echo $businessCity; ?>" placeholder="Business City">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessState">State</label>
                                                    <input type="text" class="form-control" id="businessState" name="businessState" value="<?php echo $businessState; ?>" placeholder="Business State">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessCountry">Country</label>
                                                    <input type="text" class="form-control" id="businessCountry" name="businessCountry" value="<?php echo $businessCountry; ?>" placeholder="Business Country">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessZipCode">ZIP Code</label>
                                                    <input type="text" class="form-control" id="businessZipCode" name="businessZipCode" value="<?php echo $businessZipCode; ?>" placeholder="Business ZIP Code">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="businessEmail">Email</label>
                                                    <input type="text" class="form-control" id="businessEmail" name="businessEmail" value="<?php echo $businessEmail; ?>" placeholder="Business Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="businessPhone">Phone Number</label>
                                                    <input type="text" class="form-control" id="businessPhone" name="businessPhone" value="<?php echo $businessPhone; ?>" placeholder="Business Phone Number">
                                                </div>
                                            </div>
                                                
                                            <input type="submit" class="btn btn-primary" name="business_information_btn" value="Update Information" />
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12 border-t">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Update Your Business Social Links</h5>
                                    </div>

                                    <div class="page-social p-4">
                                        <form id="manageProfileSocialForm" action="settingsCode.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group d-none">
                                                <label for="businessID">User ID</label>
                                                <input type="text" class="form-control" id="businessID" name="businessID" value="<?php echo $businessID; ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $businessFB; ?>" class="btn btn-social bg-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="businessFB" name="businessFB" value="<?php echo $businessFB; ?>" placeholder="Facebook Link">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $businessInsta; ?>" class="btn btn-social bg-instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="businessInsta" name="businessInsta" value="<?php echo $businessInsta; ?>" placeholder="Instagram Link">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $businessWA; ?>" class="btn btn-social bg-whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="businessWA" name="businessWA" value="<?php echo $businessWA; ?>" placeholder="WhatsApp Link">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <a href="<?php echo $businessYT; ?>" class="btn btn-social bg-youtube" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                                    </div>
                                                    <input type="text" class="form-control" id="businessYT" name="businessYT" value="<?php echo $businessYT; ?>" placeholder="YouTube Link">
                                                </div>
                                            </div>
                                                
                                            <input type="submit" class="btn btn-primary" name="business_social_btn" value="Update Social Links" />
                                        </form>
                                    </div>
                                </div>
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


<?php include('../includes/script.php'); ?>

<script>
    function loadLogo(event){
        var output = document.getElementById('prevlogo');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
    function loadIcon(event){
        var output = document.getElementById('previcon');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php include('../includes/footer.php'); ?>