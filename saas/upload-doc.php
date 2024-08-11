<?php
include_once "inc/checkers.php";

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
                                <h4 class="page-title">Uploaded Document</h4>
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
                                            <a href="share.php" class="list-group-item border-0"><i class="ri-folder-received-line font-18 align-middle me-2"></i>Received
                                                Documents</a>
                                            <a href="shared.php" class="list-group-item border-0"><i class="mdi mdi-share-variant font-18 align-middle me-2"></i>Shared
                                                Documents</a>
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
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="mb-2">Uploaded Documents</h5>
                                        </div>
                                        <div class="mt-3">
                                            <div class="table-responsive">
                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="input-types-preview">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="border-0">File Name</th>
                                                                            <th class="border-0">Category</th>
                                                                            <th class="border-0">Date</th>
                                                                            <th class="border-0">Status</th>
                                                                            <th class="border-0">Creators Name</th>
                                                                            <th class="border-0" style="width: 80px;">
                                                                                Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $s_sql = "SELECT f.id, f.file_name, f.date_time, u.full_name, c.category_name, f.file_path, f.to_admin FROM file_table f JOIN user u ON f.user_id = u.user_id LEFT JOIN category c ON f.category = c.id WHERE f.user_id = '$user_id' AND f.company_id = '$c_id'";
                                                                        $fetch_query = $app->fetch_query($s_sql);
                                                                        foreach ($fetch_query as $value) {
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <img src="assets/images/file.png" class="me-1"><span class="ms-2 fw-semibold"><?php echo $value['file_name'] ?></span>
                                                                                </td>
                                                                                <td> <?php if ($value['category_name'] == '') { ?>
                                                                                        <span class="badge bg-danger fw-bold p-1">
                                                                                            Null</span>
                                                                                    <?php } else { ?>
                                                                                        <?php echo $value['category_name'] ?>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="mb-0">
                                                                                        <?php echo $value['date_time'] ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($value['to_admin'] == 1) { ?>
                                                                                        <span class="badge bg-success p-1">Official
                                                                                            Document</span>
                                                                                    <?php } else { ?>
                                                                                        <span class="badge bg-warning p-1">Unofficial
                                                                                            Document</span>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $value['full_name'] ?>
                                                                                </td>
                                                                                <td class="">
                                                                                    <div class="btn-group dropdown">
                                                                                        <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-primary btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                                            <a class="dropdown-item" href="doc_file/<?= $value['file_path']; ?>" download="<?= $value['file_path']; ?>"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                                                            <a class="dropdown-item delete_emp" href="#" data-id="<?= $value['id']; ?>" data-cat="<?php echo $value['file_name'] ?>"><i class="ri-delete-bin-line me-2 text-muted vertical-middle"></i>Delete
                                                                                                Document</a>
                                                                                            <?php if (!empty($value['category_name'])) : ?>
                                                                                                <a class="dropdown-item delete_emps" href="#" data-id="<?= $value['id']; ?>" data-cat="<?= $value['file_name']; ?>"><i class="ri-refresh-line me-2 text-muted vertical-middle"></i>Convert to Official</a>
                                                                                            <?php endif; ?>
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
        <script src="up.js"></script>
        <script>
            $(document).ready(function() {
                if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
                  
                    $('#datatable-buttons').DataTable().destroy();
                }
                $('#datatable-buttons').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'print',
                        text: 'Print',
                        exportOptions: {
                            columns: ':not(:last-child)' 
                        }
                    }]
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).on('click', '.delete_emp', function() {

                const id = $(this).attr("data-id");
                const emp_name = $(this).attr("data-cat");

                $("#emp_name").val(emp_name);
                $("#id").val(id);


                $('#login-modal').modal('show');

                $("#delete_emp").click(function() {
                    const emp_name_del = $("#emp_name").val();
                    const id_del = $("#id").val();
                    const btn = $("#delete_emp");
                    btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                    if (id_del === '' || id_del === 0) {
                        Swal.fire({
                            title: "success!",
                            text: "Invalid request, Please wait redirecting...!",
                            icon: "success",
                        });
                        const btn = $("#del_stf");
                        btn.attr('disabled', false).html(
                            '<i class="fa fa-spin fa-spinner"></i> Try Again...');
                    } else {
                        $.ajax({
                            url: "ajax/delete-up",
                            method: "POST",
                            data: {
                                id_del: id_del
                            },
                            success: function(data) {

                                if (data.trim() == 'success') {
                                    $('#login-modal').modal('hide');

                                    Swal.fire({
                                        title: "success!",
                                        text: "Deleted, Please wait redirecting...!",
                                        icon: "success",
                                    });

                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);


                                }
                            }
                        });

                    }

                });

            });
        </script>
        <script>
            $(document).on('click', '.delete_emps', function() {

                const id = $(this).attr("data-id");
                const emp_name = $(this).attr("data-cat");

                $("#emp_names").val(emp_name);
                $("#ids").val(id);


                $('#login-modals').modal('show');

                $("#delete_emps").click(function() {
                    const emp_name_del = $("#emp_names").val();
                    const id_del = $("#ids").val();
                    const btn = $("#delete_emps");
                    btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Sharing...');
                    if (id_del === '' || id_del === 0) {
                        Swal.fire({
                            title: "success!",
                            text: "Invalid request, Please wait redirecting...!",
                            icon: "success",
                        });
                        const btn = $("#del_stf");
                        btn.attr('disabled', false).html(
                            '<i class="fa fa-spin fa-spinner"></i> Try Again...');
                    } else {
                        $.ajax({
                            url: "ajax/send_admin",
                            method: "POST",
                            data: {
                                id_del: id_del
                            },
                            success: function(data) {

                                if (data.trim() == 'success') {
                                    $('#login-modal').modal('hide');

                                    Swal.fire({
                                        title: "success!",
                                        text: "Processed Successfuly, Please wait redirecting...!",
                                        icon: "success",
                                    });

                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);


                                }
                            }
                        });

                    }

                });

            });
        </script>
        <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" class=" pe-3">
                            <span class="text-danger fw-bold">Please note that this action is irreversible. Are you sure
                                you want to proceed?</span>
                            <div class="mb-3 mt-3">
                                <label for="" class="mb-2">File Name</label>
                                <input class="form-control" type="text" id="emp_name" readonly>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="id" name="id_del">
                            </div>

                            <div class="mb-3">
                                <button class="btn rounded-pill btn-danger float-end ms-2" id="delete_emp" type="submit">Delete</button>
                                <button class="btn rounded-pill btn-primary float-end" data-bs-dismiss="modal" aria-hidden="true">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="login-modals" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" class=" pe-3">
                            <span class="text-danger fw-bold">Please note that this action is irreversible. Are you sure
                                you want to proceed?</span>
                            <div class="mb-3 mt-3">
                                <label for="" class="mb-2">File Name</label>
                                <input class="form-control" type="text" id="emp_names" readonly>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="ids" name="id_del">
                            </div>

                            <div class="mb-3">
                                <button class="btn rounded-pill btn-success float-end ms-2" id="delete_emps" type="submit">Share To Admin</button>
                                <button class="btn rounded-pill btn-primary float-end" data-bs-dismiss="modal" aria-hidden="true">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>