<?php 

//header  included
include('include/header.php'); 

//insert inquiry
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  $mobile=$_POST['mobilenum'];
  
  $query=mysqli_query($conn, "insert into contact( name, email, phone, subject, message)
   value('$name','$email','$mobile','$subject','$message')");
  if ($query) {
 echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
}
else
  {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }


}
?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <h3 class="fw-bold  mb-3 text-warning">Contact Us</h3>
        <form class="border border-warning border-1 p-3"  method="post" >
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Your name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" placeholder="Your name" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Email ID</label>
                <div class="col-sm-10">
                    <input type="email" name="email" placeholder="Email address" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="10" minlength="10" name="mobilenum" placeholder="Mobile Number" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Your Subject</label>
                <div class="col-sm-10">
                    <input type="text" name="subject" placeholder="Your Subject" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                        <textarea name="message" class="form-control" placeholder="message"  required></textarea>
                </div>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Send Contact Inquiry</button>
            
            
        </form>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
