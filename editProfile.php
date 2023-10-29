<?php 

//header  included
include('include/header.php'); 

if(isset($_POST['submit']))
{
    $id = $_SESSION['userid'];
    $name = $_POST['full_name']; // variable define for name
    $email = $_POST['email_id'];
    $mobile_no = $_POST['mobile_no'];
    $pwd = md5($_POST['password']);
    
    
    $insertquery = mysqli_query($conn, "update users set full_name='$name',email_id='$email',mobile_no='$mobile_no' where id = '$id'");

  if ($insertquery) {
  
        echo "<script>alert('Your Profile has benn Updated Successfully');</script>";    
       
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}

?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-8">
                <h3 class="fw-bold  mb-3 text-warning">Update your Profile</h3>
                <?php
                        $id = $_SESSION['userid'];
                        $queryselect = mysqli_query($conn,"SELECT * FROM users where id = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <form class="border border-warning border-1 p-3" method="post" >
                        <div class="form-outline mb-4">
                            <label class="form-label">Tenant Full name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Tenant Full name" value="<?php echo $row['full_name']; ?>" required="">
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Tenant Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email_id" placeholder="Email Id" value="<?php echo $row['email_id']; ?>" required="">
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Tenant Mobile no <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" value="<?php echo $row['mobile_no']; ?>" placeholder="Tenant Mobile no" required="">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
            </div>
            <div class="col-lg-4">
                <img src="image/house-rental.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
