<?php 

//header  included
include('include/header.php'); 

// login query
if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($conn,"select * from users where email_id='$email' AND password='$password' AND user_status='0' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['userid']=$ret['id'];
      $_SESSION['username']=$ret['full_name'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details or Profile Under Not Verify.";
    }
  }
?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3 text-warning">Sign In</h1>
                    <p style="font-size:16px; color:red"> <?php if(isset($msg)){
                        echo $msg;
                        }  ?> 
                    </p>
                    <form method="post" class="border border-warning border-1 p-3">
                        
                    <div class="form-outline mb-4">
                        <label class="form-label" >Email address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email Id" required="true"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" >Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required="true"/>
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit"  name="login">Sign in</button>
                    </div>

                    
                        <p>Don't Have an Account ? <a href="signup.php">Create an account</a></p>
                    </form> 
            </div>
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="image/house-rental.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
