<?php 
//header  included
include('include/header.php');
// paypal connection file
include('paypalConfiguration.php');  

if (strlen($_SESSION['userid'] == 0)) {
    echo "<script>alert('Sign In into your account first');</script>";
    echo "<script>window.location.href='signin.php'</script>";
}

?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-12">
                <h3 class="text-center fw-bold mb-5">Pay Your Monthly Rent</h3>
                <?php
                        $userid =  $_SESSION['userid'];
                        $queryselect = mysqli_query($conn,"SELECT  contract.*,rent_property.* FROM  contract
                        INNER JOIN rent_property ON rent_property.pid = contract.house_id
                        WHERE tenant_id = '$userid' AND contract_status= '1'");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <?php if(mysqli_num_rows($queryselect) > 0){ ?>
                    <form class="row g-3 border border-warning border-1 p-3" action="<?php echo PAYPAL_URL; ?>" method="post" id="paypalPaymentForm">
                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">	
                        <!-- Specify a Buy Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">
                        <!-- Specify details about the item that buyers will purchase. -->
                        <input type="hidden" name="tenant_id" id="userId" value="<?php echo $_SESSION['userid']; ?>" >
                        <input type="hidden" name="booking_id" id="bid" value="<?php echo $row['contract_id']; ?>" >
                        <input type="hidden" name="item_name"  value="<?php echo $row['title']; ?>" >   
                        <input type="hidden" name="amount" id="PriceVal" value="<?php echo $row['rent_per_month']; ?>" >   
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
                            <select class="form-select" name="contractDur"  id="contractDuration" required="">
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

                                <option value="<?php echo $i; ?>" <?php if (in_array("$i", $pays, TRUE)) { echo 'disabled'; } ?> ><?php echo $i; ?> Month</option>
                                 
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" required="true">
                            <label class="form-check-label" >
                                I Have check all details and want pay monthy rent.
                            </label>
                            </div>
                        </div>
                        <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                        <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit"  name="submit">Pay Rent Now</button>
                        </div>

    
                    </form> 
                    <?php }  else {?>
                        <div class="card">
                            <div class="card-body">
                                <h3>No rental property contract active now.</h3>
                                <br>
                                <h5>Please click <a href="properties.php">here</a> to see avaible rental options.</h3>
                            </div>
                        </div>
                    <?php }?>
            </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>