<?php 
//header  included
include('include/header.php'); 
// paypal connection file
include('paypalConfiguration.php');

if (strlen($_SESSION['userid'] == 0)) {
    echo "<script>alert('Sign In into your account first');</script>";
    echo "<script>window.location.href='signin.php'</script>";
}
// If transaction data is available in the Paypal payment URL
$pid = $_SESSION['payment_id'];
// if found
if (isset($_GET['PayerID'])) {
    $payment_id = $_GET['PayerID'];
    // Upadate booking
    $insert = mysqli_query($conn, "UPDATE payment SET pay_status='Payment completed',txn_id='$payment_id' where payment_id ='" . $pid . "'");
    // Get puchase info from the database
    $payResult = mysqli_query($conn, "SELECT * FROM payment WHERE payment_id = " . $pid);
    $row = mysqli_fetch_array($payResult);
    $price = $row['amount'];
    $month = $row['pay_for'];
    $payment_status = $row['pay_status'];

    // Upadate Active pending pay rent notification as deactive
    $insert = mysqli_query($conn, "UPDATE pay_notification SET p_status='1'
    where con_id ='" . $row['booking_id']. "' AND  t_id ='" . $row['tenant_id']. "' AND pay_month = '" . $row['pay_for']. "'");
    // close and remove session of payment_id
    unset($_SESSION['payment_id']);
}
?>
<main>
    <div class="container col-xxl-8 px-4 py-5 text-center">
        <div class="row py-2">
            <div class="col-lg-12">
                <?php if (!empty($payment_id)) {?>
                    <h3 class="text-center text-success fw-bold mb-5">Your Rent Payment has been Successfully Done.</h3>
                    <h4 class="text-primary">Paid Rent Payment Information:-</h4><br>
                    <p><b>Transaction ID:</b> <?php echo $payment_id; ?></p>
                    <p><b>Paid Amount:</b><span class="badge bg-light text-dark">$ <?php echo $price; ?> /-</span></p>
                    <p><b>Paid Month for: Month </b> <?php echo $month; ?></p>
                    <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>

                    <?php } else {?>
                        <h1 class="text-danger">Your Payment has Failed</h1>
                    <?php }?>
                    <br>
                <a href="index.php" class="btn btn-primary btn-md">Back to Home</a>
            </div>
        </div>
    </div>
<?php 
//footer  included
include('include/footer.php'); 
?>