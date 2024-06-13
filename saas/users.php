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
                        <div class="col-lg-6 col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Users</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="user_add.php" class="">
                                        <button class="btn btn-primary text-white fw-bold float-end mt-2">Add
                                            Users</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Full Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $categories_sql = "SELECT * FROM user WHERE company_id = '$c_id'";
                                                            $fetch_query = $app->fetch_query($categories_sql);
                                                            $count = 1;
                                                            foreach ($fetch_query as $value) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $count++; ?></td>
                                                                    <td><?php echo $value['full_name']; ?></td>
                                                                    <td> <?php if ($value['is_active'] == 1) { ?>
                                                                            <span class="badge bg-success p-1">Active</span>
                                                                        <?php } else { ?>
                                                                            <span class="badge bg-danger p-1">Disabled</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                Action
                                                                            </a>

                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item" href="user_view?fid=<?php echo base64_encode($value['id']); ?>&cat_name=<?php echo base64_encode($value['full_name']); ?>&cat_email=<?php echo base64_encode($value['email']); ?>"><i class=" ri-eye-fill me-1"></i>View</a>
                                                                                <a class="dropdown-item" href="user_edit?fid=<?php echo base64_encode($value['id']); ?>"><i class=" ri-eye-fill me-1"></i>Edit</a>
                                                                                <a class="dropdown-item enable_user" href="#" data-id="<?php echo $value['id']; ?>" data-cat="<?php echo $value['full_name'] ?>"><i class=" ri-shield-cross-fill fs-5 me-2"></i>Enable User</a>
                                                                                <a class="dropdown-item disable_user" href="#" data-id="<?php echo $value['id']; ?>" data-cat="<?php echo $value['full_name'] ?>"><i class=" ri-shield-fill fs-5 me-2"></i>Disable User</a>
                                                                                <a class="dropdown-item delete_emp" href="#" data-id="<?php echo $value['id']; ?>" data-cat="<?php echo $value['full_name'] ?>"><i class=" ri-delete-bin-2-fill fs-5 me-2"></i>Delete User</a>
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
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
                // If it is, destroy it
                $('#datatable-buttons').DataTable().destroy();
            }
            $('#datatable-buttons').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column (Action column)
                    }
                }]
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.enable_user', function() {

            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-cat");

            $("#enable").val(emp_name);
            $("#enables").val(id);


            $('#enable-modal').modal('show');

            $("#enable_btn").click(function() {
                const emp_name_del = $("#enable").val();
                const id_del = $("#enables").val();
                const btn = $("#enable_btn");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                if (id_del === '' || id_del === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/enable_use",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function(data) {

                            if (data.trim() == 'success') {
                                $('#enable-modal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Enabled, Please wait redirecting...!",
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
        $(document).on('click', '.disable_user', function() {

            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-cat");

            $("#disable").val(emp_name);
            $("#disables").val(id);


            $('#disable-modal').modal('show');
            $("#disable_btn").click(function() {
                const emp_name_del = $("#disable").val();
                const id_del = $("#disables").val();
                const btn = $("#disable_btn");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                if (id_del === '' || id_del === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/disable_use",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function(data) {

                            if (data.trim() == 'success') {
                                $('#disable-modal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Disabled, Please wait redirecting...!",
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
        $(document).on('click', '.delete_emp', function() {

            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-cat");

            $("#emp_name").val(emp_name);
            $("#id").val(id);


            $('#delete-modal').modal('show');

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
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/delete_use",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function(data) {

                            if (data.trim() == 'success') {
                                $('#delete-modal').modal('hide');

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
    <div id="enable-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <form method="post" class=" pe-3">
                        <span class="text-danger fw-bold">Please note that this action is irreversible. Are you sure you want to proceed?</span>
                        <div class="mb-3 mt-3">
                            <label for="" class="mb-2">Full Name</label>
                            <input class="form-control" type="text" id="enable" readonly>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="enables" name="id_del">
                        </div>

                        <div class="mb-3">
                            <button class="btn rounded-pill btn-success float-end ms-2" id="enable_btn" type="submit">Enable User</button>
                            <button class="btn rounded-pill btn-primary float-end" data-bs-dismiss="modal" aria-hidden="true">X</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="disable-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <form method="post" class=" pe-3">
                        <span class="text-danger fw-bold">Please note that this action is irreversible. Are you sure you want to proceed?</span>
                        <div class="mb-3 mt-3">
                            <label for="" class="mb-2">Full Name</label>
                            <input class="form-control" type="text" id="disable" readonly>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="disables" name="id_del">
                        </div>

                        <div class="mb-3">
                            <button class="btn rounded-pill btn-danger float-end ms-2" id="disable_btn" type="submit">Disable User</button>
                            <button class="btn rounded-pill btn-primary float-end" data-bs-dismiss="modal" aria-hidden="true">X</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <form method="post" class=" pe-3">
                        <span class="text-danger fw-bold">Please note that this action is irreversible. Are you sure you want to proceed?</span>
                        <div class="mb-3 mt-3">
                            <label for="" class="mb-2">Full Name</label>
                            <input class="form-control" type="text" id="emp_name" readonly>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="id" name="id_del">
                        </div>

                        <div class="mb-3">
                            <button class="btn rounded-pill btn-danger float-end ms-2" id="delete_emp" type="submit">Delete User</button>
                            <button class="btn rounded-pill btn-primary float-end" data-bs-dismiss="modal" aria-hidden="true">X</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>