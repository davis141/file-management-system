<?php
include_once "inc/checkers.php";
$get_cat_id = base64_decode($app->get_request('fid'));
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
                                <h4 class="page-title">Edit User</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <a href="users.php">
                                            <i class="ri-arrow-left-fill text-primary fs-4 me-2"></i>
                                        </a>
                                        <h4 class="header-title mt-1">Edit User</h4>
                                    </div>
                                    <p class="text-muted font-14">
                                    </p>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-7 col-sm-12">
                                                    <form method="post" name="myForm" id="myForm">
                                                        <div class="mb-3">
                                                            <label class="mb-2"> Full Name</label>
                                                           <input type="text" name="name" placeholder="Full Name" id="name" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                        <label class="mb-2">Email</label>
                                                           <input type="email" name="email" placeholder="Email" id="email" class="form-control">
                                                        </div>
                                                        <input type="hidden" name="idc" value="<?php echo base64_encode($get_cat_id) ?>">
                                                        <div class="mb-3">
                                                            <input type="submit" value="Update User Profile" id="reset-btn" class="btn btn-primary text-white">
                                                        </div>
                                                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //validate email


        $(document).ready(function() {
            function validateForm() {
                let category_name = document.forms["myForm"]["name"].value;
                let email_name = document.forms["myForm"]["email"].value;

                if (category_name === "") {
                    Swal.fire({
                        title: "Field Is Empty, Please Input Needed Field",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (email_name === "") {
                    Swal.fire({
                        title: "Field Is Empty, Please Input Needed Field",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function(e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/update-user",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Updated, Successsfully!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html("Category Updated!");
                                    location.href = "users.php"
                                }, 3000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Posting Failed try again!",
                                    icon: "error",
                                });

                            }

                        },

                    });
                } else {

                }

            }));

        });
    </script>