            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <?php
                            if(isset($_SESSION['auth'])){
                                $user_id = $_SESSION['auth_user']['user_id'];
                                $select_user = "SELECT * FROM tbluser WHERE user_id='$user_id' LIMIT 1";
                                $run_select_user = mysqli_query($conn, $select_user);

                                if(mysqli_num_rows($run_select_user) > 0){
                                    foreach($run_select_user as $rowUser){
                                        $userID = $rowUser['user_id'];
                                        $userFName = $rowUser['user_first_name'];
                                        $userLName = $rowUser['user_last_name'];
                                        $userRole = $rowUser['user_role'];
                                        $userIMG = $rowUser['user_img'];
                        ?>

                        <div class="sidebar-banner p-4 m-3 bg-gradient text-center d-block rounded">
                            <div class="mb-2">
                                <?php
                                    if($userIMG == ""){
                                        echo "<img src='../assets/img/blankimage.png' class='sidebar-user-ing' />";
                                    }
                                    else{
                                        echo "<img src='../assets/upload/user/profile/";
                                        echo $userIMG;
                                        echo "' class='sidebar-user-ing' alt='avtar-img' />";
                                    }
                                ?>
                            </div>
                            <h4 class="text-white mb-1 user-name">
                                <?php echo $userFName." ".$userLName; ?>
                            </h4>
                            <p class="font-13 text-white line-20 user-role">
                                <?php echo $userRole; ?>
                            </p>
                            <form action="logoutCode.php" method="POST">
                                <button type="submit" class="btn btn-square btn-inverse-light btn-xs d-inline-block mt-2 mb-0 logout-btn"
                                    name="logout_btn">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </button>
                            </form>
                        </div>

                        <?php
                                    }
                                }
                            }
                        ?>

                        <div class="mb-4">
                        <?php
                            if($_SESSION['auth'] == "Admin"){
                        ?>

                        <div class="mb-4">
                            <ul class="metismenu" id="sidebarNav">
                                <?php
                                    $sidebar_moduleDash = "SELECT * FROM tblpagetemp WHERE admin_access='1' AND id='1' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_select_qry = mysqli_query($conn, $sidebar_moduleDash);
                                    while ($row_moduleDash = mysqli_fetch_assoc($run_select_qry)){
                                ?>
                                <li>
                                    <a href="<?php echo $row_moduleDash['page_url']; ?>" aria-expanded="false">
                                        <i class="nav-icon <?php echo $row_moduleDash['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_moduleDash['page_title']; ?></span>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    $sidebar_module = "SELECT * FROM tblpagetemp WHERE admin_access='1' AND id>='2' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_module = mysqli_query($conn, $sidebar_module);
                                    while ($row_module = mysqli_fetch_assoc($run_module)){
                                        $moduleID = $row_module['id'];
                                ?>
                                <li>
                                    <a class="has-arrow" href="<?php echo $row_module['page_url']; ?>" aria-expanded="false">
                                        <i class="<?php echo $row_module['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_module['page_title']; ?></span>
                                        <?php
                                            $select_count = "SELECT COUNT(*) AS total_submodule FROM tblpagetemp WHERE admin_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1'";
                                            $result_count = mysqli_query($conn,$select_count);
                                            $submodule_count = mysqli_fetch_assoc($result_count);
                                        ?>
                                        <span class="nav-label label label-primary"><?php echo $submodule_count['total_submodule']; ?></span>
                                    </a>
                                    <ul aria-expanded="false">
                                    <?php
                                        $sidebar_submodule = "SELECT * FROM tblpagetemp WHERE admin_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                        $run_submodule = mysqli_query($conn, $sidebar_submodule);
                                        while ($row_submodule = mysqli_fetch_assoc($run_submodule)){
                                    ?>
                                        <li> <a href='<?php echo $row_submodule['page_url']; ?>'><?php echo $row_submodule['page_title']; ?></a> </li>
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

                        <?php  
                            }
                            elseif($_SESSION['auth'] == "Manager"){
                        ?>

                        <div class="mb-4">
                            <ul class="metismenu" id="sidebarNav">
                                <?php
                                    $sidebar_moduleDash = "SELECT * FROM tblpagetemp WHERE manager_access='1' AND id='1' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_select_qry = mysqli_query($conn, $sidebar_moduleDash);
                                    while ($row_moduleDash = mysqli_fetch_assoc($run_select_qry)){
                                ?>
                                <li>
                                    <a href="<?php echo $row_moduleDash['page_url']; ?>" aria-expanded="false">
                                        <i class="nav-icon <?php echo $row_moduleDash['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_moduleDash['page_title']; ?></span>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    $sidebar_module = "SELECT * FROM tblpagetemp WHERE manager_access='1' AND id>='2' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_module = mysqli_query($conn, $sidebar_module);
                                    while ($row_module = mysqli_fetch_assoc($run_module)){
                                        $moduleID = $row_module['id'];
                                ?>
                                <li>
                                    <a class="has-arrow" href="<?php echo $row_module['page_url']; ?>" aria-expanded="false">
                                        <i class="<?php echo $row_module['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_module['page_title']; ?></span>
                                        <?php
                                            $select_count = "SELECT COUNT(*) AS total_submodule FROM tblpagetemp WHERE manager_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1'";
                                            $result_count = mysqli_query($conn,$select_count);
                                            $submodule_count = mysqli_fetch_assoc($result_count);
                                        ?>
                                        <span class="nav-label label label-primary"><?php echo $submodule_count['total_submodule']; ?></span>
                                    </a>
                                    <ul aria-expanded="false">
                                    <?php
                                        $sidebar_submodule = "SELECT * FROM tblpagetemp WHERE manager_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                        $run_submodule = mysqli_query($conn, $sidebar_submodule);
                                        while ($row_submodule = mysqli_fetch_assoc($run_submodule)){
                                    ?>
                                        <li> <a href='<?php echo $row_submodule['page_url']; ?>'><?php echo $row_submodule['page_title']; ?></a> </li>
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

                        <?php  
                            }
                            elseif($_SESSION['auth'] == "Renter"){
                        ?>

                        <div class="mb-4">
                            <ul class="metismenu" id="sidebarNav">
                                <?php
                                    $sidebar_moduleDash = "SELECT * FROM tblpagetemp WHERE renter_access='1' AND id='1' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_select_qry = mysqli_query($conn, $sidebar_moduleDash);
                                    while ($row_moduleDash = mysqli_fetch_assoc($run_select_qry)){
                                ?>
                                <li>
                                    <a href="<?php echo $row_moduleDash['page_url']; ?>" aria-expanded="false">
                                        <i class="nav-icon <?php echo $row_moduleDash['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_moduleDash['page_title']; ?></span>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    $sidebar_module = "SELECT * FROM tblpagetemp WHERE renter_access='1' AND id>='2' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_module = mysqli_query($conn, $sidebar_module);
                                    while ($row_module = mysqli_fetch_assoc($run_module)){
                                        $moduleID = $row_module['id'];
                                ?>
                                <li>
                                    <a class="has-arrow" href="<?php echo $row_module['page_url']; ?>" aria-expanded="false">
                                        <i class="<?php echo $row_module['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_module['page_title']; ?></span>
                                        <?php
                                            $select_count = "SELECT COUNT(*) AS total_submodule FROM tblpagetemp WHERE renter_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1'";
                                            $result_count = mysqli_query($conn,$select_count);
                                            $submodule_count = mysqli_fetch_assoc($result_count);
                                        ?>
                                        <span class="nav-label label label-primary"><?php echo $submodule_count['total_submodule']; ?></span>
                                    </a>
                                    <ul aria-expanded="false">
                                    <?php
                                        $sidebar_submodule = "SELECT * FROM tblpagetemp WHERE renter_access='1' AND parent_id='$moduleID' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                        $run_submodule = mysqli_query($conn, $sidebar_submodule);
                                        while ($row_submodule = mysqli_fetch_assoc($run_submodule)){
                                    ?>
                                        <li> <a href='<?php echo $row_submodule['page_url']; ?>'><?php echo $row_submodule['page_title']; ?></a> </li>
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

                        <?php  
                            }                            
                        ?>




                            <ul class="metismenu d-none" id="sidebarNav">
                                <?php
                                    $sidebar_moduleDash = "SELECT * FROM tblpagetemp WHERE id='1' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_select_qry = mysqli_query($conn, $sidebar_moduleDash);
                                    while ($row_moduleDash = mysqli_fetch_assoc($run_select_qry)){
                                ?>
                                <li>
                                    <a href="<?php echo $row_moduleDash['page_url']; ?>" aria-expanded="false">
                                        <i class="nav-icon <?php echo $row_moduleDash['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_moduleDash['page_title']; ?></span>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    $sidebar_module = "SELECT * FROM tblpagetemp WHERE id>='2' AND parent_id='0' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                    $run_module = mysqli_query($conn, $sidebar_module);
                                    while ($row_module = mysqli_fetch_assoc($run_module)){
                                        $moduleID = $row_module['id'];
                                ?>
                                <li>
                                    <a class="has-arrow" href="<?php echo $row_module['page_url']; ?>" aria-expanded="false">
                                        <i class="<?php echo $row_module['page_icon']; ?>"></i>
                                        <span class="nav-title"><?php echo $row_module['page_title']; ?></span>
                                        <?php
                                            $select_count = "SELECT COUNT(*) AS total_submodule FROM tblpagetemp WHERE parent_id='$moduleID' AND is_display='1' AND ysnactive='1'";
                                            $result_count = mysqli_query($conn,$select_count);
                                            $submodule_count = mysqli_fetch_assoc($result_count);
                                        ?>
                                        <span class="nav-label label label-primary"><?php echo $submodule_count['total_submodule']; ?></span>
                                    </a>
                                    <ul aria-expanded="false">
                                    <?php
                                        $sidebar_submodule = "SELECT * FROM tblpagetemp WHERE parent_id='$moduleID' AND is_display='1' AND ysnactive='1' ORDER BY id ASC";
                                        $run_submodule = mysqli_query($conn, $sidebar_submodule);
                                        while ($row_submodule = mysqli_fetch_assoc($run_submodule)){
                                    ?>
                                        <li> <a href='<?php echo $row_submodule['page_url']; ?>'><?php echo $row_submodule['page_title']; ?></a> </li>
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
                        
                        <div class="p-4 bg-gradient text-center rounded">
                            <p style="color:#fff;">Developed with <i class="fa fa-heart text-danger"></i> by <strong>B38</strong></p>
                        </div>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->