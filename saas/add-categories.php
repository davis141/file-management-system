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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Categories</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <a href="categories.php">
                                            <i class="ri-arrow-left-fill text-primary fs-4 me-2"></i>
                                        </a>
                                        <h4 class="header-title mt-1">Add Categories</h4>
                                    </div>
                                    <p class="text-muted font-14">
                                    </p>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="simpleinput" class="form-label"> Class Category Name</label>
                                                            <input type="text" id="simpleinput" class="form-control" placeholder="Category Name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="submit" value="Add" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div> <!-- end col -->

                                            </div>
                                            <!-- end row-->
                                        </div> <!-- end preview-->
                                    </div> <!-- end tab-content-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include_once "component/footer.php" ?>

        </div>

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Code Highlight js -->
    <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="assets/js/hyper-syntax.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 May 2024 09:57:51 GMT -->

</html>