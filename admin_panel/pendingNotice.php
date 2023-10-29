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
    $userid =  $_GET['t_id'];
    $conid =  $_GET['con_id'];
    $pay_month = $_POST['pay_month']; 
    
    $insertquery = mysqli_query($conn, "insert into pay_notification(con_id, t_id, pay_month) 
    value('$conid','$userid','$pay_month')");

  if ($insertquery) {
  
        echo "<script>alert('Pending Notification Created Successfully');</script>";          
    }
  else{
    echo "<script>alert('Invalid Details Entered Please try again later.');</script>";          
  }
}

?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Send Pending Payments Reminders</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                        $userid =  $_GET['t_id'];
                        $conid =  $_GET['con_id'];
                        
                        $queryselect = mysqli_query($conn,"SELECT  contract.*,rent_property.* FROM  contract
                        INNER JOIN rent_property ON rent_property.pid = contract.house_id
                        WHERE tenant_id = '$userid' AND contract_id='$conid' ");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <form class="row g-3 p-3" method="post">
                        
                        <div class="col-md-6">
                            <label class="form-label" >Property Name</label>
                            <input type="text" class="form-control"  value="<?php echo $row['title']; ?>" disabled/>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" >Property Type </label>
                            <input type="text" class="form-control" value="<?php echo $row['type']; ?>" disabled/>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" >Rent Amount (Monthly)</label>
                            <input type="text" class="form-control" value="<?php echo $row['rent_per_month']; ?>"   disabled/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Rent Pay for</label>
                            <select class="form-select" name="pay_month"  required="">
                                <option value="">Select Month to pay rent for</option>
                                <?php 
                                $duration = $row['duration_month'];
                                $cid = $row['contract_id'];
                                $pays = array();
                                $query2 = mysqli_query($conn,"select payment.*,users.* from payment
                                    join users on users.id = payment.tenant_id
                                    where tenant_id = '$userid' 
                                    AND pay_status = 'Payment completed' 
                                    AND booking_id = '$cid'");
                                    
                                    while($row2 = mysqli_fetch_array($query2)){
                                        $pay = $row2['pay_for'];
                                        $pays[] = $pay; // array form
                                    }
                                for($i = 1;$i <=  $duration;$i++) { ?>

                                    <option value="<?php echo $i; ?>" <?php if (in_array("$i", $pays, TRUE)) { echo 'disabled'; } ?> >
                                        <?php echo $i; ?> Month <?php if (in_array("$i", $pays, TRUE)) {echo 'Rent Paid'; } else{echo 'Rent Pending'; }?>
                                    </option>
                                 
                                <?php } ?>
                            </select>
                        </div>
                        
                        
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit"  name="submit">Send Pending Notification</button>
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