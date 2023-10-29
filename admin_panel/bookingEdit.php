<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');
// insert into query
if(isset($_POST['submit']))
{
    $id = $_GET['editId'];
    $status = $_POST['bstatus'];

    $qry = "update bookings set bstatus='$status' where bid ='$id'";
    $result = mysqli_query($conn,$qry); //query executes

    if ($result) {
  
        echo "<script>alert('booking Request Updated Successfully');</script>";     
        echo "<script>window.location='bookingList.php';</script>";          
    }
    else{
        echo "<script>alert('Invalid Details Entered Please try again later.');</script>";  
        echo "<script>window.location='bookingList.php';</script>";                  
    }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">
Booking Details</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $sql = "SELECT * from bookings WHERE bid = '$id'";
                        $query = mysqli_query($conn,$sql);			  
                        $row=mysqli_fetch_array($query);       
                    ?>
                    <div class="table-responsive-md">
                    <form method="post">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr class="table-dark"><td colspan="10">Booking Details</td></tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Start Date</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['bstartdate']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">End Date</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['benddate']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Start Time</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['bstarttime']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">End Time</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['bendtime']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Special Message</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['message']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Request Status: </p></td>
                                    <td colspan="9">
                                        <div class="form-group col-md-6 mb-2">
                                            <select class="form-select" name="bstatus" required="">
                                                <option value="">Select Status</option>
                                                <option value="0" <?php if( $rows['bstatus'] == 0){ echo 'selected="selected"'; } ?> >Under Approval</option>
                                                <option value="1" <?php if( $rows['bstatus'] == 1){ echo 'selected="selected"'; } ?>>Approved</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <button type="submit" class="btn btn-primary" name="submit">Update Request</button>
                                    </td>
                                </tr>
                            <tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php');
?>                