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
                <h3 class="text-center fw-bold mb-5">Booking list </h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Bookings
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Booking Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userid =  $_SESSION['userid'];
                                    $sql = "SELECT * from bookings
                                    WHERE tenant_id = '$userid'";
                                    $query = mysqli_query($conn,$sql);			
                                        $i = 1;	// sr no
                                        while($rows=mysqli_fetch_array($query))
                                        {
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows['btype']; ?></td>
                                    <td><?php echo $rows['bstartdate']; ?></td>
                                    <td><?php echo $rows['benddate']; ?></td>
                                    <td><?php echo $rows['bstarttime']; ?></td>
                                    <td><?php echo $rows['bendtime']; ?></td>
                                    <td><?php echo $rows['message']; ?></td>

                                    <?php if($rows['bstatus'] == 0){ ?>
                                        <td><span class="badge bg-secondary">Under Approval</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    <?php } ?>
                                    
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