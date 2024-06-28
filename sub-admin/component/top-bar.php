<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">
            <div class="logo-topbar">
                <a href="dashboard.php" class="logo-light">
                    <span class="logo-lg fw-bold">
                        FileTrax
                    </span>
                    <span class="logo-sm fw-bold">
                        FileTrax
                    </span>
                </a>
                <a href="dashboard.php" class="logo-dark">
                    <span class="logo-lg fw-bold">
                        FileTrax
                    </span>
                    <span class="logo-sm fw-bold">
                        FileTrax
                    </span>
                </a>
            </div>
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="app-search dropdown d-none d-lg-block">
            </div>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">

            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                    <span class="align-middle d-none d-lg-inline-block">English</span>
                </a>
            </li>

            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="assets/images/users/user.png" alt="user-image" width="32" class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0"><?= $full_name ?></h5>
                        <h6 class="my-0 fw-normal">
                            <?php
                            if ($access_level_id == 1) {
                                echo "Admin";
                            } elseif ($access_level_id == 2) {
                                echo "Sub-admin";
                            }elseif ($access_level_id == 3){
                                echo "User";
                            }
                            ?>
                        </h6>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>
                    <a href="profile.php" class="dropdown-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="logout/logout.php" class="dropdown-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>