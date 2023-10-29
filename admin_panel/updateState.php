<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');
// Update into query
if(isset($_POST['submit']))
{
    $id = $_GET['editId'];
    $sname = $_POST['sname']; // variable define for sname
    
    $updatequery = mysqli_query($conn, "update state set sname='$sname' where sid = '$id'");

  if ($updatequery) {
  
        echo "<script>alert('State Data Updated Successfully');</script>";     
        echo "<script>window.location='manageStates.php';</script>";     
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Update State</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $queryselect = mysqli_query($conn,"select * from state where sid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <form class="row g-3" method="post" >
                        <div class="col-md-12">
                            <label class="form-label">State Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sname" value="<?php echo $row['sname']; ?>" required="" min="3">
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update State</button>
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