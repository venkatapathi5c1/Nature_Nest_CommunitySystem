<?php 
//header  included
include('include/header.php'); 
if (strlen($_SESSION['userid'] == 0)) {
    echo "<script>alert('Sign In into your account first');</script>";
    echo "<script>window.location.href='signin.php'</script>";
}

if (isset($_GET['delId'])) {
    $id = $_GET['delId'];    
    $delquery = mysqli_query($conn,"DELETE from contract where contract_id  = '$id'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>
<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row py-2">
            <div class="col-lg-12">
                <h3 class="text-center fw-bold mb-5">Contract Requests to Rent Propety</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Contract Requests to Rent Propety
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Duration of Months</th>
                                    <th>Rent Per Month</th>
                                    <th>Total Rent</th>
                                    <th>Start of Contract</th>
                                    <th>End of Contract</th>
                                    <th>Contract Request Status</th>
                                    <th>Date of the Contract</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userid =  $_SESSION['userid'];
                                    $sql = "SELECT  contract.*,users.*,rent_property.* FROM  contract
                                    INNER JOIN users ON users.id = contract.tenant_id 
                                    INNER JOIN rent_property ON rent_property.pid = contract.house_id
                                    WHERE users.id = '$userid'";
                                    $query = mysqli_query($conn,$sql);			
                                        $i = 1;	// sr no
                                        while($rows=mysqli_fetch_array($query))
                                        {
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows['duration_month']; ?> Months</td>
                                    <td>$<?php echo $rows['rent_per_term']; ?></td>
                                    <td>$<?php echo $rows['total_rent']; ?></td>
                                    <td><?php echo $rows['start_day']; ?></td>
                                    <td><?php echo $rows['end_day']; ?></td>

                                    <?php if($rows['contract_status'] == 0){ ?>
                                        <td><span class="badge bg-secondary">Inactive</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-success">Active</span></td>
                                    <?php } ?>
                                    <td><?php echo $rows['date_contract_sign']; ?></td>
                                    <td>
                                        <?php if($rows['contract_status'] == 0){ ?>
                                            <a class="btn btn-danger" href="propertyContracts.php?delId=<?php echo $rows['contract_id']; ?>" onClick="return confirm('Are sure to want Cancel this contract request and delete this Contract!');" >Cancel & Remove Request</a>
                                        <?php } else { ?>
                                            <a class="btn btn-dark">Contract is Approved Can't Cancel</a>
                                            <a class="btn btn-warning m-3 mb-0" href="sendBookingRqt.php?BId=<?php echo $rows['house_id']; ?>" >Booking Request</a>
                                            <a class="btn btn-danger m-3" href="sendIssueRqt.php?PId=<?php echo $rows['house_id']; ?>" >Raise complain</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>