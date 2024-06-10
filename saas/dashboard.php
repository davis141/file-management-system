<?php
include_once "inc/checkers.php";
$categories_sql = "SELECT * FROM category c JOIN user u ON c.company_id = u.company_id WHERE c.company_id = '$c_id'";
$s_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id  WHERE f.status = FALSE AND f.company_id = u.company_id";
$app_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id  WHERE f.status = TRUE AND f.company_id = u.company_id";
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
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                                            <span class="input-group-text bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                            <i class="mdi mdi-filter-variant"></i>
                                        </a>
                                    </form>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Number of Documents
                                            </h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($dash_sql);
                                                                    echo number_format(count($count)); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-cart-plus widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Pending Document</h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($s_sql);
                                                                    echo number_format(count($count)); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-currency-usd widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Approved Document</h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($app_sql);
                                                                    echo number_format(count($count)); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-pulse widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0">Categories</h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($categories_sql);
                                                                    echo number_format(count($count)); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
                            <div class="card">
                                <div class="d-flex card-header justify-content-between align-items-center">
                                    <h4 class="header-title">Activity Timeline</h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                                        <span class="text-muted font-13">07 April 2018</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                                        <span class="text-muted font-13">Price</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">82</h5>
                                                        <span class="text-muted font-13">Quantity</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                                        <span class="text-muted font-13">Amount</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php include_once "component/footer.php" ?>
        </div>

        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <script src="assets/js/app.min.js"></script>

</body>

</html>