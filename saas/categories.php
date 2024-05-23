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
                                                            <?php

                                                            $fetch_query = $app->fetch_query($categories_sql);
                                                            // Create for each employee loop in php
                                                            $count = 1;
                                                            foreach ($fetch_query as $value) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $count++; ?></td>
                                                                    <td><?php echo $value['category_name']; ?></td>
                                                                    <td><?php echo $value['date']; ?></td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                Action
                                                                            </a>

                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                <a class="dropdown-item delete_emp" href="#" data-bs-toggle="modal"  data-id="<?= $value['id']; ?>" data-cat="<?php echo ($value['category_name']); ?>">Delete</a>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on('click', '.delete_emp', function () {
        //fetch data from data attribute
        const id = $(this).attr("data-id");
        const emp_name = $(this).attr("data-cat");

        // show in text field
        $("#emp_name").val(emp_name);
        $("#id").val(id);

        //call  modal
        $('#login-modal').modal('show');

        $("#delete_emp").click(function () {
            const emp_name_del = $("#emp_name").val();
            const id_del = $("#id").val();

            //disable the button
            const btn = $("#delete_emp");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
            //validate
            //call Ajax
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
                    url: "ajax/delete-cat",
                    method: "POST",
                    data: {
                        id_del: id_del
                    },
                    success: function (data) {

                        if (data.trim() == 'success') {

                            //hide  modal
                            $('#login-modal').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Category Deleted, Please wait redirecting...!",
                                icon: "success",
                            });

                            setTimeout(function () {
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

                        <div class="mb-3">

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


</body>

</html>