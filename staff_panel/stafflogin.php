<?php

// header include
include('staff_includes/header.php');

// login query
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=md5($_POST['password']);

  $ret=mysqli_query($conn,"SELECT * FROM staff WHERE email='$email' and password='$password' AND status='0'");
  
  $num=mysqli_fetch_array($ret);
  //print_r($num);die;
    if($num>0)
    {
      
      $_SESSION['username']=$num['username'];
      $_SESSION['staff_id']=$num['sid'];
      $_SESSION['emprole']=$num['emprole'];

      echo "<script>alert('Welcome to Employee Panel');</script>";
      echo "<script>window.location='index.php';</script>";

    }
    else
    {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>
    <body class="bg-danger">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="../image/id.png" height="100" width="100"  class="rounded mx-auto d-block">
                                        <p class="text-center fs-4 my-2">Natures Nest Community </p>
                                        <h3 class="text-center font-weight-light my-4">Employee Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="d-flex  justify-content-center mt-4 mb-0">
                                                <button name="submit" type="submit" class="btn btn-success" >Log In</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php">Go Back to System</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
