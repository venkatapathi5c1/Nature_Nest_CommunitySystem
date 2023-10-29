<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('staff_includes/staff-permission.php');
// header include
include('staff_includes/header.php');
// menubar include
include('staff_includes/menubar.php');
?>

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Employee Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome <?php echo $_SESSION['username']; ?></li>
            </ol>
            <div class="row">
            <div class="col-xl-12 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <?php
                        $staff_id = $_SESSION['emprole'];
                        $cqry1=mysqli_query($conn,"SELECT * FROM  complaint_issues WHERE ctype = '$staff_id'");
                        $num1=mysqli_num_rows($cqry1);
                        ?>
                        <div class="card-body">Total Rental properties to manage</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3><?php echo  $num1; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('staff_includes/footer.php');
?>                