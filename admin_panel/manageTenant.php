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
    $id = $_GET['delId'];    
    $delquery = mysqli_query($conn,"DELETE from users where id = '$id'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Tenant</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Tenant
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Tenant Name</th>
                                <th>Tenant Email</th>
                                <th>Tenant Mobile No</th>
                                <th>Profile Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM users";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['full_name']; ?></td>
                                <td><?php echo $rows['email_id']; ?></td>
                                <td><?php echo $rows['mobile_no']; ?></td>
                                <?php if($rows['user_status'] == 0){ ?>
                                    <td><span class="badge bg-info">Active</span></td>
                                <?php } else { ?>
                                    <td><span class="badge bg-secondary">Deactive</span></td>
                                <?php } ?>
                                <td>
                                        <a class="btn btn-info" href="updateTenant.php?editId=<?php echo $rows['id']; ?>" style="font-size:12px"><i class="fas fa-pen-square"></i> Edit</a>
                                        <a class="btn btn-danger" href="manageTenant.php?delId=<?php echo $rows['id']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
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