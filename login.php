<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "style.php" ?>
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
                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email" name="email">
                        </div>
                        <div class="mb-3">
                            <a href="forgot-password.php" class="text-muted float-end"><small>Forgot your password?</small></a>
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit" id="reset-btn"><i class="mdi mdi-login"></i> Log In </button>
                        </div>
                    </form>
                </div>
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="sign-up.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
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
    <script src="auth.js"></script>
   
</body>

</html>