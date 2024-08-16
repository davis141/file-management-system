<?php 
include_once "inc/checkers.php";
$get_cat_id = base64_decode($app->get_request('fid'));
$file_name = base64_decode($app->get_request('cat_name'));
$cat_id = base64_decode($app->get_request('cat_id'));
$random_number = mt_rand(100000, 999999);
$encoded_id = base64_encode($c_id . $random_number);
$use_id = base64_encode($user_id . $random_number);
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
                                <h4 class="page-title">Shared Documents</h4>
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
                                                <a href="upload-doc.php">
                                                    <button class="btn btn-primary">
                                                        Back
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="mb-2">Shared Documents</h5>
                                        </div>
                                        <div class="mt-3">
                                            <form method="post" name="myForm" id="myForm" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php echo $use_id  ?>" name="encrypt">
                                            <input type="hidden" value="<?php echo $encoded_id ?>" name="encrypt_c">
                                            <input type="hidden" value="<?php echo $get_cat_id ?>" name="shares">
                                            <input type="hidden" value="<?php echo $cat_id ?>" name="cat">
                                    
                                                <div class="form-group mt-2">
                                                    <label>Share To admin</label>
                                                    <div class="form-group">
                                                        <select class="form-control form-select show-tick" id="shr" name="shr">
                                                            <option value="0">Select a User</option>
                                                            <?php
                                                            $sql = "SELECT * FROM user WHERE company_id = '$c_id' AND access_level_id = '1'";
                                                            $dpt = $app->fetch_query($sql);
                                                            foreach ($dpt as $cat) {
                                                            ?>
                                                                <option value="<?= $cat['user_id']; ?>"><?= $cat['full_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="additional-input">Shared file</label>
                                                    <input type="text" class="form-control" value="<?php echo $file_name ?>" readonly>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="additional-input">Additional Note</label>
                                                    <input type="text" class="form-control" name="add_name" id="file-name" placeholder="Please insert document name">
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary mt-2" id="reset-btn"><i class="ri-upload-2-fill me-2 fs-5"></i>Share</button>
                                            </form>
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
    <script src="assets/vendor/select2/js/select2.min.js"></script>
    <script src="assets/vendor/dropzone/min/dropzone.min.js"></script>
    <script src="up.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //validate email


        $(document).ready(function() {
            function validateForm() {
                let category_name = document.forms["myForm"]["file-name"].value;
               

                if (category_name === "") {
                    Swal.fire({
                        title: " Empty, Please Input Needed Field",
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
                        url: "ajax/shared_admin",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Completed, Successsfully!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html(" Shared Successsfully!");
                                    location.href = "pending.php"
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