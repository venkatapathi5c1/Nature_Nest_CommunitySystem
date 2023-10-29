<?php 
//header  included
include('include/header.php'); 
if (strlen($_SESSION['userid'] == 0)) {
    echo "<script>alert('Sign In into your account first');</script>";
    echo "<script>window.location.href='signin.php'</script>";
}
?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-12">
                <h3 class="text-warning fw-bold mb-5">Raise Issue</h1>
                    <?php
                        $id = $_GET['PId'];
                        $queryselect = mysqli_query($conn,"SELECT * From rent_property where pid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <form method="post" class="row g-3 border border-warning border-1 p-3" action="generateIssue.php" >
                        <input type="hidden" name="tenant_id" value="<?php echo $_SESSION['userid']; ?>" >
                        <input type="hidden" name="house_id" value="<?php echo $_GET['PId']; ?>" >
                        
                    <div class="col-md-12">
                            <label class="form-label"> Complaint Type<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="ctype">
                                <option value="">Select Complaint type</option>
                                <?php
                                    $sql = "SELECT * FROM staff where worktype = 'Compaint'";
                                    $query = mysqli_query($conn,$sql);
                                    while($rows=mysqli_fetch_array($query))
                                        {			
                                ?>
                                    <option value="<?php echo $rows['emprole']; ?>"><?php echo $rows['emprole']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                                    
                        <div class="col-md-12">
                            <label class="form-label" >Compiant Title</label>
                            <input type="text" class="form-control" name="title" required="true"/>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" >Subject</label>
                            <textarea type="text" class="form-control" name="subject" required="true" ></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" required="true">
                            <label class="form-check-label" >
                                I Have check all details and agree with all terms and condition.I want to raise this complain.
                            </label>
                            </div>
                        </div>
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit"  name="submit">Save Request</button>
                        </div>

    
                    </form> 
            
            </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
<script>
    $(document).ready(function() {
    $('select').on('change', function() {
        var inputValue = $(this).val();
        var inputPrice = document.getElementById("Price").value;
        var totalPrice = parseInt(inputValue) * parseInt(inputPrice); 
        document.getElementById("finalPrice").setAttribute("value", totalPrice);
        document.getElementById("fPrice").setAttribute("value", totalPrice)
        console.log(totalPrice);
    });
});
</script>   