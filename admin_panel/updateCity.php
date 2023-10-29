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
    $cname = $_POST['cname']; // variable define for cname
    $sid = $_POST['sid']; // variable define for state id
   
    $insertquery = mysqli_query($conn, "update city set cname='$cname',sid='$sid' where cid = '$id'");

  if ($insertquery) {
  
        echo "<script>alert('City Updated Successfully');</script>";     
        echo "<script>window.location='manageCity.php';</script>";          
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
                    <?php
                        $id = $_GET['editId'];
                        $queryselect = mysqli_query($conn,"SELECT state.*,city.*,city.sid AS stateID FROM city
                        inner join state on state.sid = city.sid where cid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                        $sid = $row['stateID'];
                    ?>
                    <form class="row g-3" method="post" >
                        <div class="col-md-12">
                            <label class="form-label">City Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="cname" value="<?php echo $row['cname']; ?>" required="" min="3">
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
                                    <option value="<?php echo $row['sid']; ?>"  <?php if ($sid == $row['sid']) {echo 'selected="selected"';}?> ><?php echo $row['sname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update City</button>
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