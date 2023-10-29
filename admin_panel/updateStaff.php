<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');
// Update into query
if(isset($_POST['submit']))
{
    $id = $_GET['editId'];
    $emprole = $_POST['emprole'];
    $worktype = $_POST['worktype'];
    $username = $_POST['username']; // variable define for username
    $email = $_POST['email']; // variable define for email
    $status = $_POST['status']; 
   
    $insertquery = mysqli_query($conn, "update staff set emprole='$emprole', worktype='$worktype', username='$username',email='$email',status='$status' where sid = '$id'");

  if ($insertquery) {
  
        echo "<script>alert('Employee Updated Successfully');</script>";     
        echo "<script>window.location='manageStaff.php';</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Update Employee</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $queryselect = mysqli_query($conn,"SELECT * FROM staff where sid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                        $status = $row['status'];
                        $worktype = $row['worktype'];
                    ?>
                    <form class="row g-3" method="post" >
                        <div class="col-md-6">
                            <label class="form-label">Employee Role <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="emprole" placeholder="Employee Role" value="<?php echo $row['emprole']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Work Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="worktype"  required="">
                                <option value="">Select Work Type</option>
                                <option value="Compaint" <?php if ($worktype == 'Compaint') {echo 'selected="selected"';}?>>Handel Complaint</option>
                                <option value="Booking" <?php if ($worktype == 'Booking') {echo 'selected="selected"';}?>>Handel Booking</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employee UserName  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" placeholder="Employee Username" value="<?php echo $row['username']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employee Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Employee Email" value="<?php echo $row['email']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Profile Status <span class="text-danger">*</span></label>
                            <select class="form-select" name="status">
                                <option value="">Choose status</option>
                                <option value="1" <?php if ($status == '1') {echo 'selected="selected"';}?> >Deactive</option>
                                <option value="0" <?php if ($status == '0') {echo 'selected="selected"';}?>>Active</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php');
?>                