<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('staff_includes/staff-permission.php');
// header include
include('staff_includes/header.php');
// menubar include
include('staff_includes/menubar.php');

//Code for deletion of Record
if (isset($_GET['delId'])) {
    $pid = $_GET['delId'];    
    $delquery = mysqli_query($conn,"DELETE from rent_property where pid = '$pid'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Property</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Property
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Property Name </th>
                                <th>Property Type </th>
                                <th>Property Area</th>
                                <th>Rent Per Month</th>
                                <th>Property Image</th>
                                <th>Property Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $staff_id = $_SESSION['staff_id'];
                                $sql = "SELECT * FROM rent_property WHERE staff_id = '$staff_id'";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['title']; ?></td>
                                <td><?php echo $rows['type']; ?></td>
                                <td><?php echo $rows['size']; ?></td>
                                <td><?php echo $rows['rent_per_month']; ?></td>
                                <td><img src="../PropertyImages/<?php echo $rows['pimage']; ?>" alt="" height="100px" width="100px" ></td>
                                <?php if($rows['status'] == 'available'){ ?>
                                    <td><span class="badge bg-success">Available</span></td>
                                <?php } else { ?>
                                    <td><span class="badge bg-secondary">Occupied</span></td>
                                <?php } ?>
                                
                                <td>
                                        <a class="btn btn-info" href="updateProperty.php?editId=<?php echo $rows['pid']; ?>" style="font-size:12px"><i class="fas fa-pen-square"></i> Edit</a>
                                        <a class="btn btn-danger" href="manageProperty.php?delId=<?php echo $rows['pid']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
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
include('staff_includes/footer.php');
?>                