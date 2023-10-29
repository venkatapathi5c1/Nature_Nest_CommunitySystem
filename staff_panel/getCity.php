<?php
// database connection file include
include('../include/dbconnection.php');
// staff session check
include('staff_includes/staff-permission.php');
if(isset($_POST['sateid'])){
    $sid=$_POST['sateid'];
   
     $query=mysqli_query($conn,"select * from city join state on state.sid=city.sid where city.sid='$sid'");
       while($rw=mysqli_fetch_array($query))
       {
        ?>      
    <option value="<?php echo $rw['cid'];?>"><?php echo $rw['cname'];?></option>
                     
   
   <?php } } ?>
   