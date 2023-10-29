<?php 
//header  included
include('include/header.php');

     
    // Retrieve transaction info from PayPal 
   
    $amount   = $_GET['amount']; 
    $booking_id = $_GET['booking_id'];
    $tenant_id = $_GET['user_id']; 
    $pay_for = $_GET['pay_for'];
    $ref_no = rand(000000,100000);
    $payment_status = 'Payment pending'; 

    //insert query

    $insert = "INSERT INTO payment(tenant_id, booking_id, ref_no, amount, pay_for, pay_status) 
         VALUES('$tenant_id','$booking_id','$ref_no','$amount','$pay_for','$payment_status')";
         mysqli_query($conn, $insert);
         
         $paylast_id = mysqli_insert_id($conn);
         $_SESSION['payment_id'] = $paylast_id; // added last id from db to session
        
        //  print_r($_SESSION);die;

?>