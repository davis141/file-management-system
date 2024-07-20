<?php
include_once "inc/checkers.php";
$random_number = mt_rand(100000, 999999);
$encoded_id = base64_encode($c_id . $random_number);
$rand = uniqid();
$user_id = uniqid();
$encode_user = base64_encode($user_id . $random_number);
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
                                <h4 class="page-title">Add New User</h4>
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
                                        <h4 class="header-title mt-1">Add New User</h4>
                                    </div>
                                    <p class="text-muted font-14">
                                    </p>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="input-types-preview">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mt-3">
                                                        <form method="post" name="myForm" id="myForm">
                                                            <input type="hidden" value="<?php echo $encode_user ?>" name="encrypt">
                                                            <input type="hidden" value="<?php echo $encoded_id ?>" name="encrypt_c">
                                                            <div class="form-group mt-2">
                                                                <div class="form-group mt-2">
                                                                    <label class="mb-1 fw-bold">Full Name</label>
                                                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <label class="mb-1 fw-bold">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                                </div>
                                                                <label class="mb-1 fw-bold mt-1">Select Access Level</label>
                                                                <div class="form-group">
                                                                    <select class="form-control form-select show-tick" id="dpt" name="dpt">
                                                                        <option value="0">Access Level</option>
                                                                        <option value="2">Sub-Admin</option>
                                                                        <option value="3">User</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="additional-input" class="mb-1 fw-bold">Password</label>
                                                                <input type="text" class="form-control" name="password" id="file-name" value="<?php echo $rand ?>" readonly>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary mt-2" id="reset-btn"><i class="ri-add-box-fill me-2 fs-5 mt-2"></i><span>Submit</span></button>
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
            </div>
            <?php include_once "component/footer.php" ?>
        </div>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="assets/js/hyper-syntax.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="up.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //validate email


        $(document).ready(function() {
            function validateForm() {
                let category_name = document.forms["myForm"]["full_name"].value;

                if (category_name === "") {
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
                        url: "ajax/user_add",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "User Created, Successsfully!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html("Created!");
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
</body>

</html>