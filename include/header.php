<?php 
// Database connection page
include('dbconnection.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Natures Nest Community  System</title>    

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header class="d-flex justify-content-center">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Natures Nest Community  System </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0 fw-bolder">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="about-us.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="properties.php">Our Rental Property</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="contact.php">Contact Us</a>
          </li>
          <?php if(isset($_SESSION['userid'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo ucwords($_SESSION['username']); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="propertyContracts.php">Rental Property Contracts</a></li>
                <li><a class="dropdown-item" href="payRent.php">Pay Your Rent</a></li>
                <li><a class="dropdown-item" href="paymentHistory.php">Payment History</a></li>
                <li><a class="dropdown-item" href="complaints.php">Complaint History</a></li>
                <li><a class="dropdown-item" href="my-bookings.php">Booking History</a></li>
                <li><a class="dropdown-item" href="other-tenant.php">Contact Other Tenant</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="editProfile.php">Edit Profile</a></li>
                <li><a class="dropdown-item" href="changePWD.php">Change Password</a></li>
                <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
              </ul>
            </li>
          <?php } else {?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="signin.php">Sign In</a>
            </li>
            <?php } ?>
           
        </ul>
      </div>
      <div class="d-flex">
        <a class="btn btn-primary ms-3" aria-current="page" href="admin_panel/">Admin Panel</a>
        <a class="btn btn-secondary ms-3" aria-current="page" href="staff_panel/">Staff Panel</a></div>
    </div>
  </nav>
</header>