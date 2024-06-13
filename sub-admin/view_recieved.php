<?php
include_once "inc/checkers.php";
$get_cat_id = base64_decode($app->get_request('fid'));
$get_cat_name = base64_decode($app->get_request('cat_name'));
$get_cat_date = base64_decode($app->get_request('cat_date'));
$get_full_name = base64_decode($app->get_request('full_name'));
$get_cat_in = base64_decode($app->get_request('cat_input'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "component/style.php" ?>
</head>

<body>
    <div class="wrapper">

        <?php include_once "component/top-bar.php" ?>

        <?php include_once "component/sidebar.php" ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Received</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <a href="share.php">
                                            <i class="ri-arrow-left-fill text-primary fs-4 me-2"></i>
                                        </a>
                                        <h4 class="header-title mt-1">Viewed Document</h4>
                                    </div>
                                    <p class="text-muted font-14">
                                    </p>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="mb-3">
                                                        <img src="assets/images/file.png" class="me-1"><span class="ms-2 fw-bold"><?php echo $get_cat_name ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold">Sent By :</p><span><?php echo $get_full_name ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold">Date and Time :</p> <span><?php echo $get_cat_date ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-bold">Comment :</p> <span><?php echo $get_cat_in ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once "component/footer.php" ?>
        </div>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="assets/js/hyper-syntax.js"></script>
    <script src="assets/js/app.min.js"></script>