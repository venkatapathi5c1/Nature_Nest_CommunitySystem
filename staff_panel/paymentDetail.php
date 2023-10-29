<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('staff_includes/staff-permission.php');
// header include
include('staff_includes/header.php');
// menubar include
include('staff_includes/menubar.php');

?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Payments Information</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Payments Information
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Tenant Information</th>
                                <th>Rental Property Name</th>
                                <th>Reference Number</th>
                                <th>Rent Paid For</th>
                                <th>Amount Paid</th>
                                <th>Payment Status</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $staff_id = $_SESSION['staff_id'];
                                $sql = "SELECT payment.*,contract.*,rent_property.*,users.* FROM payment
                                INNER JOIN contract ON contract.contract_id = payment.booking_id
                                INNER JOIN users ON users.id = contract.tenant_id
                                INNER JOIN rent_property ON rent_property.pid = contract.house_id
                                WHERE staff_id = '$staff_id' AND  pay_status = 'Payment completed'";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <b>Name: </b> <?php echo $rows['full_name']; ?><br>
                                    <b>Email Id: </b><?php echo $rows['email_id']; ?><br>
                                    <b>Mobile No: </b><?php echo $rows['mobile_no']; ?>
                                </td>
                                <td><?php echo $rows['title']; ?></td>
                                <td><?php echo $rows['ref_no']; ?></td>
                                <td><?php echo $rows['pay_for']; ?> Month</td>
                                <td><span class="badge bg-primary fs-6">$<?php echo $rows['amount']; ?></span></td>
                               
                                <td><span class="badge bg-secondary"><?php echo $rows['pay_status']; ?></span></td>
                                
                                <td><?php echo $rows['date']; ?></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('staff_includes/footer.php');
?>                