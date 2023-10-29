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
    $cname = $_POST['cname']; // variable define for cname
    $sid = $_POST['sid']; // variable define for state id

    $insertquery = mysqli_query($conn, "insert into city(cname,sid) value('$cname','$sid')");

  if ($insertquery) {
  
        echo "<script>alert('New City Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Add City</h5>
                <div class="card-body">
                    <form class="row g-3" method="post" >
                        <div class="col-md-12">
                            <label class="form-label">City Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="cname" required="" min="3">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select class="form-select" name="sid" required>
                                <option value="">Select State</option>
                                <?php
                                    $sql ="select * from  state";
                                    $res = mysqli_query($conn, $sql); 
                                    while($row=mysqli_fetch_array($res)){
                                ?>
                                    <option value="<?php echo $row['sid']; ?>"><?php echo $row['sname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Create City</button>
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