<?php include_once "inc/reg-check.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once "component/style.php"?>
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">
                <div class="auth-brand text-center text-lg-start">
                    <a href="#" class="logo-dark fw-bold fs-3">
                        <span>FIleTrax</span>
                    </a>
                    <a href="#" class="logo-light fw-bold fs-3">
                        <span>FileTrax</span>
                    </a>
                </div>

                <div class="my-auto">
                    <h4 class="mt-3">Sign Up</h4>

                    <form name="myForm" id="myForm" method="post">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" required id="password" placeholder="Enter your password" name="password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                <label class="form-check-label">I accept Terms and Conditions</a></label>
                            </div>
                        </div>
                        <div class="mb-0 d-grid text-center">
                            <button class="btn btn-primary" type="submit" id="reset-btn"><i class="mdi mdi-account-circle"></i> Sign Up </button>
                        </div>
                    </form>
                </div>

                <footer class="footer footer-alt">
                    <p class="text-muted">Already have account? <a href="login.php" class="text-muted ms-1"><b>Log In</b></a></p>
                </footer>

            </div> 
        </div>
       
    </div>
    
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //validate email


        $(document).ready(function () {
            function validateForm() {
                let fullname = document.forms["myForm"]["fullname"].value;
                let email = document.forms["myForm"]["emailaddress"].value;
                let password = document.forms["myForm"]["password"].value;
            
                if (fullname === "") {
                    Swal.fire({
                        title: "Full Name is empty, please input your Full Name",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

             
                if (email === "") {
                    Swal.fire({
                        title: "Error!",
                        text: "Email is empty, input the needed feild",
                        icon: "error",
                    });
                    return false;
                }
                if (password.length < 6) {
                    Swal.fire({
                        title: "Error!",
                        text: "Password should of be 8 characters.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                // alert("eddwards");
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/register.php",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Registered, Successsfully",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Department Created!");
                                location.href="login.php"
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