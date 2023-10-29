<?php 

//header  included
include('include/header.php'); 

// insert into query
if(isset($_POST['submit']))
{
    $name = $_POST['full_name']; // variable define for sname
    $email = $_POST['email_id'];
    $mobile_no = $_POST['mobile_no'];
    $pwd = md5($_POST['password']);

    $insertquery = mysqli_query($conn, "insert into  users(full_name, email_id,mobile_no ,password) value('$name','$email','$mobile_no','$pwd')");

  if ($insertquery) {
  
        echo "<script>alert('Your Account created Successfully');</script>";          
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
                <h1 class="display-5 fw-bold lh-1 mb-3 text-warning">Sign Up</h1>
                    
                    <form method="post" class="row border border-warning border-1 p-3" name="register" onsubmit="return checkpassword();">
                        
                    <div class="col-md-6 mb-3">
                            <label class="form-label">Tenant Full name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Tenant Full name" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tenant Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email_id" placeholder="Email Id" required="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Tenant Mobile no <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile_no" pattern="[1-9]{1}[0-9]{9}" minlength="10" placeholder="Tenant Mobile no" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="Password" class="form-control" name="password" id="password" placeholder="Password" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="Password" class="form-control" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
                        </div>

                    
                        <p>Alredy Have an Account ?<a href="signin.php"> Sign in now</a></p>
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
