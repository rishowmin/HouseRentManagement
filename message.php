<?php

if(isset($_SESSION['success_status'])){
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> <?php echo $_SESSION['success_status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
    unset($_SESSION['success_status']);
}

if(isset($_SESSION['failed_status'])){
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $_SESSION['failed_status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
    unset($_SESSION['failed_status']);
}

if(isset($_SESSION['warning_status'])){
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?php echo $_SESSION['warning_status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
    unset($_SESSION['warning_status']);
}

?>