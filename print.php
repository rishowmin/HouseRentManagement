<?php
    include('config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/custom-style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print" />
</head>


                        <body>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button onclick="window.print()" id="print-btn" class="btn btn-icon btn-dark float-left" data-toggle="tooltip" data-placement="top" data-original-title="Print"><i class="fa fa-print"></i></button>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                    <?php

                                        if(isset($_GET['print'])){
                                    ?>

                                    <?php
                                        include('Admin/ExpenseReport.php#expense-report');
                                    ?>

                                    <?php
                                            unset($_SESSION['success_status']);
                                        }
                                    ?>
                                    </div>
                                </div>
                            </body>

</html>