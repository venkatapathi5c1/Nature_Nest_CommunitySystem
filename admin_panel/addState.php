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
    $sname = $_POST['sname']; // variable define for sname
    
    $insertquery = mysqli_query($conn, "insert into state(sname) value('$sname')");

  if ($insertquery) {
  
        echo "<script>alert('New State Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Add State</h5>
                <div class="card-body">
                    <form class="row g-3" method="post" >
                        <div class="col-md-12">
                            <label class="form-label">State Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sname" required="" min="3">
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Create State</button>
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