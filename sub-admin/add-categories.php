<?php include_once "inc/checkers.php"?>
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
                                <h4 class="page-title">Add Categories</h4>
                            </div>
                        </div>
                    </div>
                  
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
                                                    <form name="myForm" id="myForm" method="post">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Category Name</label>
                                                            <input type="text" id="category_name" class="form-control" placeholder="Category Name" name="category_name">
                                                        </div>
                                                        <input type="hidden" class="form-control" value="<?php echo base64_encode($c_id); ?>" name="c_id" readonly>
                                                        <div class="mb-3">
                                                            <input type="submit" value="Add" id="reset-btn" class="btn btn-primary">
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
    <script>
            setInterval(function() {
                fetch('/file-management-system/sub-admin/update-sess.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.cookie = `session_key=${data.newKey}; path=/`;
                        } else {
                            window.location.href = "/file-management-system/login.php";
                        }
                    });
            }, 10000);
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //validate email


        $(document).ready(function () {
            function validateForm() {
                let category_name = document.forms["myForm"]["category_name"].value;
            
                if (category_name === "") {
                    Swal.fire({
                        title: "Category Name Is Empty, Please Input Needed Field",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add-categories",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Category Created, Successsfully!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Category Created!");
                                location.href="categories.php"
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