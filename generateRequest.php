<?php
// database connection file include
include('include/dbconnection.php');
// user session check
if (strlen($_SESSION['userid'] == 0)) {
    echo "<script>alert('Sign In into your account first');</script>";
    echo "<script>window.location.href='signin.php'</script>";
}

// insert qry 
if(isset($_POST['submit']))
{
    $btype = $_POST['btype'];
    $tenant_id=$_POST['tenant_id'];
    $house_id=$_POST['house_id'];
    $bstartdate=$_POST['bstartdate'];
    $benddate=$_POST['benddate'];
    $bstarttime=$_POST['bstarttime'];
    $bendtime=$_POST['bendtime'];
    $message = $_POST['message'];

    if(empty($tenant_id) || empty($house_id) ||  empty($bstartdate) || empty($benddate) ||  empty($bstarttime) || empty($bendtime) ){
        echo "<script>alert('Please Enter all details.All feild are mandtory');</script>";
    }
    else{
       
      
         //insert qry
        $query = mysqli_query($conn,"insert into bookings(btype,tenant_id, house_id, bstartdate, benddate,bstarttime,bendtime,message) 
        values('$btype','$tenant_id','$house_id','$bstartdate','$benddate','$bstarttime','$bendtime','$message') ");
        if($query)
        {

        echo "<script>alert('Booking Request with detail has been sent.');</script>";
        echo "<script>window.location.href='my-bookings.php'</script>"; 
        } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
        echo "<script>window.location.href='propertyContracts.php'</script>";   
        }
    }
}?>