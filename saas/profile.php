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
        <?php include_once "component/sidebar.php"?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Profile</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    <h4 class="mb-0 mt-2"><?= $full_name?></h4>
                                    <p class="text-muted font-14">Founder</p>

                                    <div class="text-start mt-3">
                                        <h4 class="font-13 text-uppercase">About Me :</h4>
                                        <p class="text-muted font-13 mb-3">
                                            <?= $about ?>
                                        </p>
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2"><?= $full_name ?></span></p>


                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 "><?= $email ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div  id="settings">
                                            <form name="myForm" id="myForm" method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" class="form-control" id="fullname" placeholder="Enter Full name" name="full_name">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" value="<?php echo base64_encode($user_id); ?>" name="idp" readonly>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Bio</label>
                                                            <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..." name="bio"></textarea>
                                                        </div>
                                                    </div> 
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success mt-2" id="reset-btn"><i class="mdi mdi-content-save"></i> Save</button>
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
          <?php include_once "component/footer.php"?>
        </div>
    </div>
 
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            function validateForm() {
                let full_name = document.forms["myForm"]["fullname"].value;
            
            
                if (full_name === "") {
                    Swal.fire({
                        title: "The Full Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
             
                return true; // Form is valid
            }

            $("#myForm").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/update-pr",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Updated Profile, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Submitted");
                                location.reload();
                            }, 2000);     
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