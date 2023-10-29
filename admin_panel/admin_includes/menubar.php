<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">House Rental System </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>   <?php echo $_SESSION['name']; ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="changePwd.php">Edit Password</a></li>
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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStates" aria-expanded="false" aria-controls="collapseStates">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Manage States
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseStates" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addState.php">Add State</a>
                                    <a class="nav-link" href="manageStates.php">Manage States</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCity" aria-expanded="false" aria-controls="collapseCity">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-pin"></i></div>
                                Manage City
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCity" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addCity.php">Add City</a>
                                    <a class="nav-link" href="manageCity.php">Manage Cities</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStaff" aria-expanded="false" aria-controls="collapseStaff">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Manage Employee
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseStaff" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addStaff.php">Add Employee</a>
                                    <a class="nav-link" href="manageStaff.php">Manage Employee</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTenant" aria-expanded="false" aria-controls="collapseTenant">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Manage Tenant
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTenant" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addTenant.php">Add Tenant</a>
                                    <a class="nav-link" href="manageTenant.php">Manage Tenant</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProperty" aria-expanded="false" aria-controls="collapseProperty">
                                <div class="sb-nav-link-icon"><i class="fas fa-house-user"></i></div>
                                Rental Property
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProperty" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addProperty.php">Add Rental Property</a>
                                    <a class="nav-link" href="manageProperty.php">Manage Rental Property</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="propertyRentalReq.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-file-text"></i></div>
                                Property Rent Contracts
                            </a>
                            <a class="nav-link" href="paymentDetail.php">
                                <div class="sb-nav-link-icon"><i class="far fa-money-bill-alt"></i></div>
                                Payment Information
                            </a>
                            <a class="nav-link" href="pendingPayment.php">
                                <div class="sb-nav-link-icon"><i class="far fa-money-bill-alt"></i></div>
                                Send Pending Payment Reminders
                            </a>
                            <a class="nav-link" href="contactInquiries.php">
                                <div class="sb-nav-link-icon"><i class="far fa-money-bill-alt"></i></div>
                                Contact Inquiries
                            </a>
                            <a class="nav-link" href="complaintIssue.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Complaints Issue
                            </a>
                            <a class="nav-link" href="bookingList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Booking List
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