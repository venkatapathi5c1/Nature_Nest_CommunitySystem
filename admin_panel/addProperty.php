
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
    if(empty($housepic1)){
        $insertquery = "INSERT INTO rent_property(title, pcontent, type, bedroom, bathroom, balcony, kitchen, hall, floor, size, rent_per_month, location, city, state, pimage, status, totalfloor, staff_id)
        value('$title','$pcontent','$type','$bedroom','$bathroom','$balcony','$kitchen','$hall','$floor','$size','$rent_per_month','$location','$city','$state','$housepic','$status','$totalfloor','$staff_id' )";
    }else{
        $insertquery = "INSERT INTO rent_property(title, pcontent, type, bedroom, bathroom, balcony, kitchen, hall, floor, size, rent_per_month, location, city, state, pimage, pimage1, status, totalfloor, staff_id)
        value('$title','$pcontent','$type','$bedroom','$bathroom','$balcony','$kitchen','$hall','$floor','$size','$rent_per_month','$location','$city','$state','$housepic','$housepic1','$status','$totalfloor','$staff_id' )";
    }
    mysqli_query($conn, $insertquery);
  if ($insertquery) {
  
        echo "<script>alert('New Rental Property Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Add Rental Property</h5>
                <div class="card-body">
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label class="form-label">Rental Property Name  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" required="" min="3">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Property Description  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="pcontent" required=""></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Property Type  <span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option value="">select Property Type</option>
                                <option value="House">House</option>
                                <option value="Flat">Flat</option>
                                <option value="2 Stroy House">2 Stroy House</option>
                                <option value="Duplex">Duplex</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Floor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="floor" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Bedroom  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="bedroom">
                                <option value="">Please Choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Bathroom  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="bathroom">
                                <option value="">Please Choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Balcony  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="balcony">
                                <option value="">Please Choose</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Kitchen  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="kitchen">
                                <option value="">Please Choose</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Hall  <span class="text-danger">*</span></label>
                            <select class="form-select"  name="hall">
                                <option value="">Please Choose</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Property Area<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="size" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Rent Per Month<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="rent_per_month" required="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State<span class="text-danger">*</span></label>
                            <select class="form-select" name="state" id="state" onChange="getCity(this.value);" required="">
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
                        <div class="col-md-4">
                            <label class="form-label">Choose City</label>
                            <select class="form-select" name="city" id="city" required="">
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Property location Address  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="location" required=""></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Property Image</label>
                            <input type="file" class="form-control" name="pimage" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Property Image 2</label>
                            <input type="file" class="form-control" name="pimage1" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Total Property Floor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="totalfloor" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Property Manage Employee<span class="text-danger">*</span></label>
                            <select class="form-select" name="staff_id"  required="">
                                <option value="">Select Employee</option>
                                <?php
                                    $sql ="select * from staff where status = 0";
                                    $res = mysqli_query($conn, $sql); 
                                    while($row=mysqli_fetch_array($res)){
                                ?>
                                    <option value="<?php echo $row['sid']; ?>"><?php echo $row['username']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Property Status<span class="text-danger">*</span></label>
                            <select class="form-select" name="status">
                                <option value="">Choose status</option>
                                <option value="occupied">Occupied</option>
                                <option value="available">available</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Create Rental Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php'); ?>