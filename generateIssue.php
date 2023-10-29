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
    $ctype = $_POST['ctype'];
    $tenant_id=$_POST['tenant_id'];
    $house_id=$_POST['house_id'];
    $title=$_POST['title'];
    $subject=$_POST['subject'];

    if(empty($tenant_id) || empty($house_id) ||  empty($title) || empty($subject) ){
        echo "<script>alert('Please Enter all details.All feild are mandtory');</script>";
    }
    else{
       
      
         //insert qry
        $query = mysqli_query($conn,"insert into complaint_issues(ctype,tenant_id, house_id, title, subject) 
        values('$ctype','$tenant_id','$house_id','$title','$subject') ");
        if($query)
        {

        echo "<script>alert('Complainr Request with detail has been sent.');</script>";
        echo "<script>window.location.href='complaints.php'</script>"; 
        } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
        echo "<script>window.location.href='propertyContracts.php'</script>";   
        }
    }
}?>