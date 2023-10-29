<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');
?>

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <?php
                        $cqry1=mysqli_query($conn,"SELECT * FROM  rent_property ");
                        $num1=mysqli_num_rows($cqry1);
                        ?>
                        <div class="card-body">Total Rental properties</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3><?php echo  $num1; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <?php
                        $cqry2=mysqli_query($conn,"SELECT * FROM  contract ");
                        $num2=mysqli_num_rows($cqry2);
                        ?>
                        <div class="card-body">Total Rent Contracts</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3><?php echo  $num2; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <?php
                        $cqry3=mysqli_query($conn,"SELECT * FROM  contract where contract_status='1' ");
                        $num3=mysqli_num_rows($cqry3);
                        ?>
                        <div class="card-body">Total Active Contracts</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3><?php echo  $num3; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php');
?>                