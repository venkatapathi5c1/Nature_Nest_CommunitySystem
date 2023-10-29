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
    $tenant_id=$_POST['tenant_id'];
    $house_id=$_POST['house_id'];
    $total_rent=$_POST['total_rent'];
    $rent_per_term=$_POST['rent_per_month'];
    $duration_month=$_POST['duration_month'];
    $start_day=$_POST['start_day'];
    $end_day = date('Y-m-d', strtotime("+3 months", strtotime($start_day)));
   

    if(empty($tenant_id) || empty($house_id) ||  empty($total_rent) || empty($duration_month) ||  empty($start_day)){
        echo "<script>alert('Please Enter all details.All feild are mandtory');</script>";
    }
    else{
       
        //image 1 to save
       $pimage = $_FILES["proofID"]["name"];
       $extension = substr($pimage,strlen($pimage)-4,strlen($pimage));
       // allowed extensions
       $allowed_extensions = array(".jpg","jpeg",".png",".JPG",".JPEG",".PNG");
       // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(!in_array($extension,$allowed_extensions))
        {
        echo "<script>alert('Invalid format for image 1. Only jpg /jpeg/ png  format allowed');</script>";
        }
        else
        {
        //store
        $proofID= $pimage;
        move_uploaded_file($_FILES["proofID"]["tmp_name"],"ProofImages/".$proofID);
        }
         //insert qry
        $query = mysqli_query($conn,"insert into contract(tenant_id, house_id, duration_month, total_rent, rent_per_term, start_day, end_day, proofID) 
        values('$tenant_id','$house_id','$duration_month','$total_rent','$rent_per_term','$start_day','$end_day','$proofID') ");
        if($query)
        {

        echo "<script>alert('Booking Request with detail has been sent.');</script>";
        echo "<script>window.location.href='propertyContracts.php'</script>"; 
        } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
        echo "<script>window.location.href='rentProperty.php?pid=$tenant_id</script>";   
        }
    }
}?>