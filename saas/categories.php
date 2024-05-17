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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Class Categories</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="add-categories.php" class="">
                                        <button class="btn btn-primary text-white fw-bold float-end mt-2">Add Categories</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Class Category</h4>
                                    <p class="text-muted font-14">
                                        We may examine and organise classes of information methodically through the lens of categorization, which makes understanding and analysis more effective. For a closer look at the categorised data, feel free to browse the table below.
                                    </p>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Category Name</th>
                                                                <th>Date Created</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action
                                                                        </a>

                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end row-->
                                        </div> <!-- end preview-->
                                    </div> <!-- end tab-content-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once "component/footer.php" ?>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="assets/js/hyper-syntax.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/js/pages/demo.datatable-init.js"></script>
</body>

</html>