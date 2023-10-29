
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
    $title = $_POST['title']; 
    $pcontent = $_POST['pcontent'];
    $type = $_POST['type']; 
    $floor = $_POST['floor'];
    $bedroom = $_POST['bedroom']; 
    $bathroom = $_POST['bathroom'];
    $balcony = $_POST['balcony']; 
    $kitchen = $_POST['kitchen'];
    $hall = $_POST['hall']; 
    $size = $_POST['size']; 
    $rent_per_month = $_POST['rent_per_month'];
    $location = $_POST['location']; 
    $city = $_POST['city'];
    $state = $_POST['state']; 
    $status = $_POST['status'];
    $totalfloor = $_POST['totalfloor'];
    $staff_id = $_POST['staff_id'];

    //image 1 to save
    if(!empty($_FILES['pimage']['name'])){
        $pimage = $_FILES["pimage"]["name"];
        $extension = substr($pimage,strlen($pimage)-4,strlen($pimage));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(!in_array($extension,$allowed_extensions))
        {
        echo "<script>alert('Invalid format for image 1. Only jpg / jpeg/ png  format allowed');</script>";
        }
        else
        {
        //store
        $housepic=md5($pimage).$extension;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],"../PropertyImages/".$housepic);
        }
    }
   
    //if image 2 is uplaoded then need to save
    if(!empty($_FILES['pimage1']['name'])){
        $pimage1 = $_FILES["pimage1"]["name"];
        $extension1 = substr($pimage1,strlen($pimage1)-4,strlen($pimage1));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(!in_array($extension1,$allowed_extensions))
        {
        echo "<script>alert('Invalid format image 1. Only jpg / jpeg/ png  format allowed');</script>";
        }
        else
        {
        //store
        $housepic1=md5($pimage1).$extension;
        move_uploaded_file($_FILES["pimage1"]["tmp_name"],"../PropertyImages/".$housepic1);
        }
    }
        $insertquery = "UPDATE rent_property SET title='$title',pcontent='$pcontent',type='$type',bedroom='$bedroom'
        ,bathroom='$bathroom',balcony='$balcony',kitchen='$kitchen',hall='$hall',floor='$floor',size='$size',rent_per_month='$rent_per_month',
        location='$location',city='$city',state='$state',status='$status',totalfloor='$totalfloor',staff_id='$staff_id'";
		if($_FILES['pimage']['name'] != "")
		{
        $insertquery = $insertquery . ",pimage='$housepic'";
		}
        if($_FILES['pimage1']['name'] != "")
		{
        $insertquery = $insertquery . ",pimage1='$housepic1'";
		}
		$insertquery = $insertquery  . " WHERE pid='$_GET[editId]'";
   
        mysqli_query($conn, $insertquery);
        if ($insertquery) {
        
                echo "<script>alert('Record Updated Successfully');</script>";          
            }
        else{
            echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
        }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Update Rental Property</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $queryselect = mysqli_query($conn,"SELECT * From rent_property where pid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                        $status = $row['status'];
                    ?>
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label class="form-label">Rental Property Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>" required="" min="3">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Property Description  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="pcontent" required=""><?php echo $row['pcontent']; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Property Type  <span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option value="">select Property Type</option>
                                <option value="House"  <?php if ($row['type'] == 'House') {echo 'selected="selected"';}?>>House</option>
                                <option value="Flat" <?php if ($row['type'] == 'Flat') {echo 'selected="selected"';}?>>Flat</option>
                                <option value="2 Stroy House" <?php if ($row['type'] == '2 Stroy House') {echo 'selected="selected"';}?>>2 Stroy House</option>
                                <option value="Duplex" <?php if ($row['type'] == 'Duplex') {echo 'selected="selected"';}?>>Duplex</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Floor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="floor" value="<?php echo $row['floor']; ?>" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Bedroom  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="bedroom">
                                <option value="">Please Choose</option>
                                <option value="1" <?php if ($row['bedroom'] == '1') {echo 'selected="selected"';}?>>1</option>
                                <option value="2" <?php if ($row['bedroom'] == '2') {echo 'selected="selected"';}?>>2</option>
                                <option value="3" <?php if ($row['bedroom'] == '3') {echo 'selected="selected"';}?>>3</option>
                                <option value="4" <?php if ($row['bedroom'] == '4') {echo 'selected="selected"';}?>>4</option>
                                <option value="5" <?php if ($row['bedroom'] == '5') {echo 'selected="selected"';}?>>5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Bathroom  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="bathroom">
                                <option value="">Please Choose</option>
                                <option value="1" <?php if ($row['bathroom'] == '1') {echo 'selected="selected"';}?>>1</option>
                                <option value="2" <?php if ($row['bathroom'] == '2') {echo 'selected="selected"';}?>>2</option>
                                <option value="3" <?php if ($row['bathroom'] == '3') {echo 'selected="selected"';}?>>3</option>
                                <option value="4" <?php if ($row['bathroom'] == '4') {echo 'selected="selected"';}?>>4</option>
                                <option value="5" <?php if ($row['bathroom'] == '5') {echo 'selected="selected"';}?>>5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Balcony  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="balcony">
                                <option value="">Please Choose</option>
                                <option value="0" <?php if ($row['balcony'] == '0') {echo 'selected="selected"';}?>>0</option>
                                <option value="1" <?php if ($row['balcony'] == '1') {echo 'selected="selected"';}?>>1</option>
                                <option value="2" <?php if ($row['balcony'] == '2') {echo 'selected="selected"';}?>>2</option>
                                <option value="3" <?php if ($row['balcony'] == '3') {echo 'selected="selected"';}?>>3</option>
                                <option value="4" <?php if ($row['balcony'] == '4') {echo 'selected="selected"';}?>>4</option>
                                <option value="5" <?php if ($row['balcony'] == '5') {echo 'selected="selected"';}?>>5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Kitchen  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="kitchen">
                                <option value="">Please Choose</option>
                                <option value="0" <?php if ($row['kitchen'] == '0') {echo 'selected="selected"';}?>>0</option>
                                <option value="1" <?php if ($row['kitchen'] == '1') {echo 'selected="selected"';}?>>1</option>
                                <option value="2" <?php if ($row['kitchen'] == '2') {echo 'selected="selected"';}?>>2</option>
                                <option value="3" <?php if ($row['kitchen'] == '3') {echo 'selected="selected"';}?>>3</option>
                                <option value="4" <?php if ($row['kitchen'] == '4') {echo 'selected="selected"';}?>>4</option>
                                <option value="5" <?php if ($row['kitchen'] == '5') {echo 'selected="selected"';}?>>5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Hall  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="hall">
                                <option value="">Please Choose</option>
                                <option value="0" <?php if ($row['hall'] == '0') {echo 'selected="selected"';}?>>0</option>
                                <option value="1" <?php if ($row['hall'] == '1') {echo 'selected="selected"';}?>>1</option>
                                <option value="2" <?php if ($row['hall'] == '2') {echo 'selected="selected"';}?>>2</option>
                                <option value="3" <?php if ($row['hall'] == '3') {echo 'selected="selected"';}?>>3</option>
                                <option value="4" <?php if ($row['hall'] == '4') {echo 'selected="selected"';}?>>4</option>
                                <option value="5" <?php if ($row['hall'] == '5') {echo 'selected="selected"';}?>>5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Property Area<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="size" value="<?php echo $row['size']; ?>" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Rent Per Month<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="rent_per_month" value="<?php echo $row['rent_per_month']; ?>" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State<span class="text-danger">*</span></label>
                            <select class="form-select" name="state" id="state" onChange="getCity(this.value);" required="">
                                <option value="">Select State</option>
                                <?php
                                    $sql ="select * from  state";
                                    $res = mysqli_query($conn, $sql); 
                                    while($rows=mysqli_fetch_array($res)){
                                ?>
                                    <option value="<?php echo $rows['sid']; ?>" <?php if ($row['state'] == $rows['sid']) {echo 'selected="selected"';}?>><?php echo $rows['sname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Choose City</label>
                            <select class="form-select" name="city" id="city" required="">
                            <option value="">Select City</option>
                                <?php
                                    $sql ="select * from  city";
                                    $res = mysqli_query($conn, $sql); 
                                    while($rows1=mysqli_fetch_array($res)){
                                ?>
                                    <option value="<?php echo $rows1['cid']; ?>" <?php if ($row['city'] == $rows1['cid']) {echo 'selected="selected"';}?>><?php echo $rows1['cname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Property location Address  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="location" required=""><?php echo $row['location']; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload New Property Image</label>
                            <input type="file" class="form-control" name="pimage" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Property Image</label>
                            <img src="../PropertyImages/<?php echo $row['pimage']; ?>" alt="" height="100px" width="100px" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload New Property Image 2</label>
                            <input type="file" class="form-control" name="pimage1" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Property Image</label>
                            <img src="../PropertyImages/<?php echo $row['pimage1']; ?>" alt="" height="100px" width="100px" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Total Property Floor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="totalfloor" value="<?php echo $row['totalfloor']; ?>" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Property Manage Employee<span class="text-danger">*</span></label>
                            <select class="form-select" name="staff_id"  required="">
                                <option value="">Select Employee</option>
                                <?php
                                    $sql ="select * from staff where status = 0";
                                    $res = mysqli_query($conn, $sql); 
                                    while($srow=mysqli_fetch_array($res)){
                                ?>
                                    <option value="<?php echo $srow['sid']; ?>" <?php if ($row['staff_id'] == $srow['sid']) {echo 'selected="selected"';}?>><?php echo $srow['username']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Property Status<span class="text-danger">*</span></label>
                            <select class="form-select" name="status">
                                <option value="">Choose status</option>
                                <option value="occupied" <?php if ($status == 'occupied') {echo 'selected="selected"';}?>>Occupied</option>
                                <option value="available" <?php if ($status == 'available') {echo 'selected="selected"';}?>>available</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php'); ?>