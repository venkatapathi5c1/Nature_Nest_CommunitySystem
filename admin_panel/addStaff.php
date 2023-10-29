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
    $emprole = $_POST['emprole'];
    $worktype = $_POST['worktype'];
    $name = $_POST['username']; // variable define for sname
    $email = $_POST['email'];
    $pwd = md5($_POST['password']);

    $insertquery = mysqli_query($conn, "insert into staff(emprole,worktype,username, email, password) value('$emprole','$worktype','$name','$email','$pwd')");

  if ($insertquery) {
  
        echo "<script>alert('New Employee Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Add Employee</h5>
                <div class="card-body">
                    <form class="row g-3" method="post" name="staffadd" onsubmit="return checkpassword();">
                        <div class="col-md-6">
                            <label class="form-label">Employee Role <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="emprole" placeholder="Employee Role" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Work Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="worktype"  required="">
                                <option value="">Select Work Type</option>
                                <option value="Compaint">Handle Complaint</option>
                                <option value="Booking">Handle Booking</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employee UserName  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" placeholder="Employee Username" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employee Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Employee Email" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="Password" class="form-control" name="password" id="password" placeholder="Password" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="Password" class="form-control" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" required="">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Create Employee</button>
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