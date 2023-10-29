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
    $delquery = mysqli_query($conn,"DELETE from city where cid = '$sid'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Cities</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Cities
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>City Name</th>
                                <th>State Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT state.*,city.* FROM city
                                inner join state on state.sid = city.sid";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['sname']; ?></td>
                                <td><?php echo $rows['cname']; ?></td>
                                <td>
                                        <a class="btn btn-info" href="updateCity.php?editId=<?php echo $rows['cid']; ?>" style="font-size:12px"><i class="fas fa-pen-square"></i> Edit</a>
                                        <a class="btn btn-danger" href="manageCity.php?delId=<?php echo $rows['cid']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
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