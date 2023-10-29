<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('staff_includes/staff-permission.php');
// header include
include('staff_includes/header.php');
// menubar include
include('staff_includes/menubar.php');
// insert into query
if(isset($_POST['submit']))
{
  $id = $_SESSION['staff_id'];
  $cpassword=md5($_POST['currentpassword']);
  $newpassword=md5($_POST['newpassword']);

  $query=mysqli_query($conn,"select * from staff where sid='$id' and  password='$cpassword'");
  $row=mysqli_fetch_array($query);

  if($row>0){
        $ret=mysqli_query($conn,"update staff set password='$newpassword' where sid='$id'");
        echo "<script>alert('Your password successully changed');</script>";
    } 
    else {
        echo "<script>alert('Your current password is wrong');</script>";
    }  
  

}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Edit Password</h5>
                <div class="card-body">
                    <form  method="post" name="changepassword" onsubmit="return chnagecheckpassword();">
                        <div class="row g-3">
                            <div class="col-md-12">
                            <label for="formGroupExampleInput" class="form-label">Existing Password <span class="errmsg">*</span></label>
                                <input type="password" id="currentpassword" name="currentpassword" class="form-control"  placeholder="Enter Current Password" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">New Password <span class="errmsg">*</span></label>
                                <input type="password"  class="form-control" id="newpassword" name="newpassword"  placeholder="Enter New Password" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Confirm Password <span class="errmsg">*</span></label>
                                <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirmpassword" name="confirmpassword" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" value="submit" name="submit" class="btn btn-primary btn-lg">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('staff_includes/footer.php');
?>                