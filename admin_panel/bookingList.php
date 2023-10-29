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
    $delquery = mysqli_query($conn,"DELETE from bookings where bid = '$id'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Booking list</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Booking
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Person Name</th>
                                <th>Person Email</th>
                                <th>Person Mobile No</th>
                                <th>Property</th>
                                <th>Booking Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $sql = "SELECT bookings.*,rent_property.pid,rent_property.title as Ptitle,users.* FROM bookings
                                INNER JOIN rent_property ON rent_property.pid = bookings.house_id
                                INNER JOIN users ON users.id = bookings.tenant_id";
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
                                <td><?php echo $rows['Ptitle']; ?></td>
                                <td><?php echo $rows['btype']; ?></td>
                                <td><?php echo $rows['bstartdate']; ?></td>
                                <td><?php echo $rows['benddate']; ?></td>
                                <td><?php echo $rows['bstarttime']; ?></td>
                                <td><?php echo $rows['bendtime']; ?></td>
                                <td><?php echo $rows['message']; ?></td>
                                <?php if($rows['bstatus'] == 0){ ?>
                                        <td><span class="badge bg-secondary">Under Approval</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    <?php } ?>
                                <td>  
                                    <a class="btn btn-danger" href="bookingList.php?delId=<?php echo $rows['bid']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
                                    <a class="btn btn-success" href="bookingEdit.php?editId=<?php echo $rows['bid']; ?>" style="font-size:12px"><i class="fas fa-edit"></i> Edit</a>
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