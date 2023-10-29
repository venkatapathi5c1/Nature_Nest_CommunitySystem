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
    $name = $_POST['full_name']; // variable define for name
    $email = $_POST['email_id'];
    $mobile_no = $_POST['mobile_no'];
    $pwd = md5($_POST['password']);
    $status = $_POST['status']; 
    
    $insertquery = mysqli_query($conn, "update users set full_name='$name',email_id='$email',mobile_no='$mobile_no',user_status='$status' where id = '$id'");

  if ($insertquery) {
  
        echo "<script>alert('Tenant Updated Successfully');</script>";    
        echo "<script>window.location='manageTenant.php';</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Update Tenant</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $queryselect = mysqli_query($conn,"SELECT * FROM users where id = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                        $status = $row['user_status'];
                    ?>
                    <form class="row g-3" method="post" >
                        <div class="col-md-6">
                            <label class="form-label">Tenant Full name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Tenant Full name" value="<?php echo $row['full_name']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tenant Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email_id" placeholder="Email Id" value="<?php echo $row['email_id']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tenant Mobile no <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" value="<?php echo $row['mobile_no']; ?>" placeholder="Tenant Mobile no" required="">
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
                            <button type="submit" name="submit" class="btn btn-primary">Update Tenant</button>
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