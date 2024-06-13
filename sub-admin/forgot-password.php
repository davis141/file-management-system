<?php include_once "inc/reg-check.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "component/style.php" ?>
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">
                <div class="auth-brand text-center text-lg-start">
                    <a href="#" class="logo-dark fw-bold fs-3">
                        <span>FileTrax</span>
                    </a>
                    <a href="#" class="logo-light fw-bold">
                        <span>FileTrax</span>
                    </a>
                </div>

                <div class="my-auto">
                    <h4 class="mt-0">Sign In</h4>
                    <div id="notificationContainer"></div>
                    <p class="text-muted mb-4">Please enter your credentials</p>
                    <form name="myForm" id="myForm" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress"  placeholder="Enter your email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input class="form-control" type="password" id="password" placeholder="Enter your new password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input class="form-control" type="password"  id="cpassword" placeholder="Confirm password" name="cpassword">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit" id="reset-btn"><i class="mdi mdi-login"></i> Submit </button>
                        </div>
                    </form>
                </div>
                <footer class="footer footer-alt">
                    <p class="text-muted">Go Back to <a href="login.php" class="text-muted ms-1"><b>Log In</b></a></p>
                </footer>
            </div>
        </div>
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">FileTrax</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Discover the wonders of effective file organization today! <i class="mdi mdi-format-quote-close"></i>
                </p>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            function validateForm() {
                let email = document.forms["myForm"]["emailaddress"].value;
                let password = document.forms["myForm"]["password"].value;
                let cpassword = document.forms["myForm"]["cpassword"].value;
            
                if (email === "") {
                    Swal.fire({
                        title: "The Email Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

             
                if (password.length < 6) {
                    Swal.fire({
                        title: "Error!",
                        text: "Password must be at least 8 characters long.",
                        icon: "error",
                    });
                    return false;
                }
                if (password !== cpassword) {
                    Swal.fire({
                        title: "Error!",
                        text: "The Two Passwords Do Not Match",
                        icon: "error",
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
                        url: "ajax/update-password",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Updating Forgot Password, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Submitted");
                                location.href="login.php";
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