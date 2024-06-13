
<!DOCTYPE html>
<html lang="en">
<head>
       <?php include_once "component/style.php"?>
    </head>

    <body class="authentication-bg">

        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <!-- <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100'/>
                </g>
            </svg> -->
        </div>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header py-4 text-center bg-primary">
                                <a href="index.html">
                                    <span class="fw-bold fs-4 text-white">FileTrax</span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h1 class="text-error"><i class="mdi mdi-account-lock"></i></h1>
                                    <h4 class="text-uppercase text-danger mt-3">Access Denied</h4>
                                    <p class="text-muted mt-3">Access is currently unavailable. Please ensure you are logged in and have the necessary permissions. If issues persist, contact our support team for assistance or to check your account status. We apologize for any inconvenience.</p>

                                    <a class="btn btn-info mt-3" href="index.php"><i class="mdi mdi-reply"></i> Return Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
