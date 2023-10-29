<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');

//Code for deletion of Record
if (isset($_GET['delId'])) {
    $sid = $_GET['delId'];    
    $delquery = mysqli_query($conn,"DELETE from staff where sid = '$sid'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Employee</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Employee
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Employee Role</th>
                                <th>Employee Name</th>
                                <th>Employee Email</th>
                                <th>Profile Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM staff";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['emprole']; ?></td>
                                <td><?php echo $rows['username']; ?></td>
                                <td><?php echo $rows['email']; ?></td>
                                <?php if($rows['status'] == 0){ ?>
                                    <td><span class="badge bg-info">Active</span></td>
                                <?php } else { ?>
                                    <td><span class="badge bg-secondary">Deactive</span></td>
                                <?php } ?>
                                <td>
                                        <a class="btn btn-info" href="updateStaff.php?editId=<?php echo $rows['sid']; ?>" style="font-size:12px"><i class="fas fa-pen-square"></i> Edit</a>
                                        <a class="btn btn-danger" href="manageStates.php?delId=<?php echo $rows['sid']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php');
?>                