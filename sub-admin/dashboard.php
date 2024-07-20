<?php
include_once "inc/checkers.php";
$dash_sql = "SELECT f.id, f.company_id, f.user_id, f.file_name, NULL AS shared_admin FROM file_table f WHERE f.company_id = '$c_id' AND f.user_id = '$user_id' UNION SELECT f.id, f.company_id, ad.shared_admin AS user_id, f.file_name, ad.shared_admin FROM admin_share ad JOIN file_table f ON ad.file_id = f.id WHERE ad.shared_admin = '$user_id' AND f.company_id = '$c_id';";
$upload_sql = "SELECT * FROM `file_table`  WHERE `company_id` = '$c_id' AND `user_id` = '$user_id'";
$categories_sql = "SELECT * FROM category  WHERE company_id = '$c_id'";
$s_sql = "SELECT ad.id, ad.date, ad.file_path,ad.file_id, f.file_name, u.full_name, c.category_name FROM admin_share ad JOIN file_table f ON ad.file_id = f.id JOIN user u ON ad.user_id = u.user_id JOIN category c ON ad.company_id = c.company_id WHERE ad.shared_admin = '$user_id' AND ad.company_id = '$c_id' AND  f.to_admin = TRUE AND f.status = FALSE";
$app_sql = "SELECT ad.id, ad.date, ad.file_path,ad.file_id, f.file_name, u.full_name, c.category_name FROM admin_share ad JOIN file_table f ON ad.file_id = f.id JOIN user u ON ad.user_id = u.user_id JOIN category c ON ad.company_id = c.company_id WHERE ad.shared_admin = '$user_id' AND ad.company_id = '$c_id' AND  f.to_admin = TRUE AND f.status = TRUE";
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

                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted fw-normal mt-0" title="Total Number of Documents">Total Number of Documents
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
                                            <h5 class="text-muted fw-normal mt-0" title="Pending Document">Pending Document</h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($s_sql);
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
                                            <h5 class="text-muted fw-normal mt-0" title="Uploaded Document">Uploaded Document</h5>
                                            <h3 class="mt-3 mb-3"><?php $count = $app->fetch_query($upload_sql);
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
                                            <h5 class="text-muted fw-normal mt-0" title="Approved Document">Approved Document</h5>
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
                                            <h5 class="text-muted fw-normal mt-0" title="Categories">Categories</h5>
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
                                                <?php
                                                $r_sql = "SELECT f.file_name, f.date_time, u.full_name, c.category_name, f.file_path FROM file_table f JOIN user u ON f.user_id = u.user_id JOIN category c ON f.category = c.id WHERE f.company_id = u.company_id AND f.user_id = '$user_id'  ORDER BY f.date_time DESC LIMIT 5";
                                                $fetch_query = $app->fetch_query($r_sql);
                                                foreach ($fetch_query as $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal"> <img src="assets/images/file.png" class="me-1"><span class="ms-2 fw-semibold"><?php echo $value['file_name'] ?></span>
                                                            </h5>
                                                            <span class="text-muted font-13"><?php echo $value['date_time'] ?></span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal"><?php echo $value['category_name'] ?></h5>
                                                            <span class="text-muted font-13">Category</span>
                                                        </td>
                                                        <td>
                                                        <h5 class="font-14 my-1 fw-normal"><?php echo $value['full_name'] ?></h5>
                                                        <span class="text-muted font-13">Name</span>
                                                    </td>
                                                    </tr>
                                                <?php } ?>
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
        <script src="up.js"></script>
</body>

</html>