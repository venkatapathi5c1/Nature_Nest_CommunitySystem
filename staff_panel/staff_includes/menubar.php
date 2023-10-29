<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">House Rental System </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>   <?php echo $_SESSION['username']; ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="staffchangePwd.php">Edit Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Management System </div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="complaintIssue.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Complaints Issues
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <a href="logout.php" class="nav-link">
                        <div class="bold">Log Out From Admin Panel</div>
                    </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">