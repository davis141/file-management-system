<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "component/style.php" ?>
</head>

<body>
    <!-- Begin page -->
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
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                        <li class="breadcrumb-item active">File Manager</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">File Manager</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <!-- Right Sidebar -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Left sidebar -->
                                    <div class="page-aside-left">

                                        <div class="btn-group d-block mb-2">
                                            <button type="button" class="btn btn-success dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-plus"></i> Create New </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-folder-plus-outline me-1"></i> Folder</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-file-plus-outline me-1"></i> File</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-file-document me-1"></i> Document</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-upload me-1"></i> Choose File</a>
                                            </div>
                                        </div>
                                        <div class="email-menu-list mt-3">
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-folder-outline font-18 align-middle me-2"></i>All Files</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-google-drive font-18 align-middle me-2"></i>Pending Document</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-dropbox font-18 align-middle me-2"></i>Approved Documents</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-share-variant font-18 align-middle me-2"></i>Share with me</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-clock-outline font-18 align-middle me-2"></i>Recent</a>
                                        </div>

                                    </div>
                                    <!-- End Left sidebar -->

                                    <div class="page-aside-right">

                                        <div class="d-lg-flex justify-content-between align-items-center">
                                            <div class="app-search">
                                                <form>
                                                    <div class="mb-2 position-relative">
                                                        <input type="text" class="form-control" placeholder="Search files...">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- <div>
                                                <button type="submit" class="btn btn-sm btn-light"><i class="mdi mdi-format-list-bulleted"></i></button>
                                                <button type="submit" class="btn btn-sm"><i class="mdi mdi-view-grid"></i></button>
                                                <button type="submit" class="btn btn-sm"><i class="mdi mdi-information-outline"></i></button>
                                            </div> -->
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="mb-2">All Files</h5>


                                        </div> <!-- end .mt-3-->


                                        <div class="mt-3">

                                            <div class="table-responsive">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="border-0">File Name</th>
                                                            <th class="border-0">Date</th>
                                                            <th class="border-0">Creators Name</th>
                                                            <th class="border-0">Status</th>
                                                            <th class="border-0" style="width: 80px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">App Design & Development</a></span>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">Jan 03, 2020</p>
                                                            </td>
                                                            <td>
                                                                Danielle Thompson
                                                            </td>
                                                            <td id="tooltip-container">
                                                                <div class="avatar-group">
                                                                    <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                                        <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                                    </a>

                                                                    <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                                    </a>

                                                                    <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                                    </a>

                                                                    <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                                        <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="btn-group dropdown">
                                                                    <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>View</a>
                                                                        <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> <!-- end .mt-3-->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end card-box -->
                        </div> <!-- end Col -->
                    </div><!-- End row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include_once "component/footer.php" ?>

        </div>
    </div>
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>