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
                <h3 class="text-warning fw-bold mb-5">Send Request to Rent Propety</h1>
                    <?php
                        $id = $_GET['pid'];
                        $queryselect = mysqli_query($conn,"SELECT * From rent_property where pid = '$id' ");
                        $row = mysqli_fetch_array($queryselect);
                    ?>
                    <form method="post" class="row g-3 border border-warning border-1 p-3" action="saveContract.php" enctype="multipart/form-data">
                        <input type="hidden" name="tenant_id" value="<?php echo $_SESSION['userid']; ?>" >
                        <input type="hidden" name="house_id" value="<?php echo $_GET['pid']; ?>" >
                        <input type="hidden" name="rent_per_month" value="<?php echo $row['rent_per_month']; ?>" >
                        <input type="hidden" id="fPrice"  name="total_rent"/>
                        <div class="col-md-6">
                            <label class="form-label" >Property Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['title']; ?>" disabled/>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" >Property Type </label>
                            <input type="text" class="form-control" value="<?php echo $row['type']; ?>" disabled/>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" >Rent Per Month </label>
                            <input type="text" class="form-control" value="<?php echo $row['rent_per_month']; ?>" id="Price" disabled/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Duration Of Rent</label>
                            <select id="inputState" class="form-select" name="duration_month" id="durationMonth" required="">
                                <option value="">Select Months duration to rent Property</option>
                                <option value="3">3 Months</option>
                                <option value="6">6 Months</option>
                                <option value="12">12 Months</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Start Date of Moving Month </label>
                            <input type="date" class="form-control" name="start_day" min="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" required=""/>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" >Upload Proof Id <b class="text-danger">(Uplod Proof Id like Driver's License (with photo)/Green Card/Student Id Card/Visa Photo only)</b> </label>
                            <input type="file" class="form-control" name="proofID" required=""/>
                            <div id="emailHelp" class="form-text">We'll never share your Proofs with anyone else.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Total Rent of Property</label>
                            <input type="number" class="form-control" id="finalPrice" disabled/>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" required="true">
                            <label class="form-check-label" >
                                I Have check all details and agree with all terms and condition.I want to Rent this Property as given data above.
                            </label>
                            </div>
                        </div>
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit"  name="submit">Save Book Request</button>
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