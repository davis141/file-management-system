<?php include_once "inc/checkers.php" ?>
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
                                <h4 class="page-title">Received Documents</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-aside-left">
                                        <div class="btn-group d-block mb-2">
                                            <button type="button" class="btn btn-success dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-plus"></i> Create New </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="upload-file.php"><i class="mdi mdi-upload me-1"></i>
                                                    Choose File</a>
                                            </div>
                                        </div>
                                        <div class="email-menu-list mt-3">
                                            <a href="file-manager.php" class="list-group-item border-0"><i class="mdi mdi-folder-outline font-18 align-middle me-2"></i>All
                                                Documents</a>
                                            <a href="upload-doc.php" class="list-group-item border-0"><i class="ri-file-upload-line font-18 align-middle me-2"></i>Uploaded
                                                Documents</a>
                                            <a href="pending.php" class="list-group-item border-0"><i class="ri-file-history-fill font-18 align-middle me-2"></i>Pending
                                                Document</a>
                                            <a href="approved.php" class="list-group-item border-0"><i class="ri-task-fill font-18 align-middle me-2"></i>Approved
                                                Documents</a>
                                            <a href="share.php" class="list-group-item border-0"><i class="ri-folder-received-line font-18 align-middle me-2"></i>Received Documents</a>
                                            <a href="shared.php" class="list-group-item border-0"><i class="mdi mdi-share-variant font-18 align-middle me-2"></i>Shared Documents</a>
                                            <a href="recent.php" class="list-group-item border-0"><i class="mdi mdi-clock-outline font-18 align-middle me-2"></i>Recent</a>
                                        </div>
                                    </div>
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
                                            <div class="">
                                                <a href="share-documents.php">
                                                    <button class="btn btn-primary">
                                                        Share Document
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="mb-2">Received Documents</h5>
                                        </div>
                                        <div class="mt-3">
                                            <div class="table-responsive">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="border-0">File Name</th>
                                                            <th class="border-0">Date</th>
                                                            <th class="border-0">Senders Name</th>
                                                            <th class="border-0" style="width: 80px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $file_sql = "SELECT fs.id, f.file_name, fs.date_time, u.full_name, fs.file_path, fs.add_input
                                                        FROM file_shares fs
                                                        JOIN file_table f ON fs.file_id = f.id JOIN user u on fs.user_id = u.user_id
                                                        WHERE fs.shared_with_user_id = '$user_id' AND fs.company_id = u.company_id";
                                                        $fetch_query = $app->fetch_query($file_sql);
                                                        foreach ($fetch_query as $value) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <img src="assets/images/file.png" class="me-1"><span class="ms-2 fw-semibold"><?php echo $value['file_name'] ?></span>
                                                                </td>
                                                                <td>
                                                                    <p class="mb-0"><?php echo $value['date_time'] ?></p>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['full_name'] ?>
                                                                </td>
                                                                <td class="">
                                                                    <div class="btn-group dropdown">
                                                                        <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-primary btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="../saas/doc_file/<?= $value['file_path']; ?>" download="<?= $value['file_path']; ?>"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="view_recieved?fid=<?php echo base64_encode($value['id']); ?>&cat_name=<?php echo base64_encode($value['file_name']); ?>&cat_date=<?php echo base64_encode($value['date_time']); ?>&full_name=<?php echo base64_encode($value['full_name']); ?>&cat_input=<?php echo base64_encode($value['add_input']); ?>"><i class=" ri-eye-fill me-1"></i>View</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include_once "component/footer.php" ?>

        </div>
    </div>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="up.js"></script>
</body>

</html>