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
    $name = $_POST['full_name']; // variable define for sname
    $email = $_POST['email_id'];
    $mobile_no = $_POST['mobile_no'];
    $pwd = md5($_POST['password']);

    $insertquery = mysqli_query($conn, "insert into  users(full_name, email_id,mobile_no ,password) value('$name','$email','$mobile_no','$pwd')");

  if ($insertquery) {
  
        echo "<script>alert('New Tenant Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Add Tenant</h5>
                <div class="card-body">
                    <form class="row g-3" method="post" name="staffadd" onsubmit="return checkpassword();">
                        <div class="col-md-6">
                            <label class="form-label">Tenant Full name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Tenant Full name" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tenant Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email_id" placeholder="Email Id" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tenant Mobile no <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" placeholder="Tenant Mobile no" required="">
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
                            <button type="submit" name="submit" class="btn btn-primary">Create Tenant</button>
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