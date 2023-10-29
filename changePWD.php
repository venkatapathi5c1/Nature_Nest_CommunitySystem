<?php 

//header  included
include('include/header.php'); 

if(isset($_POST['submit']))
{
    $id = $_SESSION['userid'];
    $cpassword=md5($_POST['currentpassword']);
    $newpassword=md5($_POST['newpassword']);

    $query=mysqli_query($conn,"select * from users where id='$id' and  password='$cpassword'");
    $row=mysqli_fetch_array($query);

    if($row>0){
            $ret=mysqli_query($conn,"update users set password='$newpassword' where id='$id'");
            echo "<script>alert('Your password successully changed');</script>";
        } 
        else {
            echo "<script>alert('Your current password is wrong');</script>";
        }  
}

?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-8">
                <h3 class="fw-bold  mb-3 text-warning">Update your Password</h3>
                
                    <form class="border border-warning border-1 p-3" method="post" name="changepassword" onsubmit="return chnagecheckpassword();" >
                        <div class="form-outline mb-4">
                        <label for="formGroupExampleInput" class="form-label">Existing Password <span class="errmsg">*</span></label>
                            <input type="password" id="currentpassword" name="currentpassword" class="form-control"  placeholder="Enter Current Password" required>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="inputEmail4" class="form-label">New Password <span class="errmsg">*</span></label>
                            <input type="password"  class="form-control" id="newpassword" name="newpassword"  placeholder="Enter New Password" required>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="inputPassword4" class="form-label">Confirm Password <span class="errmsg">*</span></label>
                            <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirmpassword" name="confirmpassword" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update Password</button>
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
