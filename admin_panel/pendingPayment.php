<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');

//Code for deletion of Record

?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Pending Payments Reminders</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Pending Payments Reminders
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Tenant Information</th>
                                <th>Rental Property Name</th>
                                <th>Duration of Months</th>
                                <th>Total Paid Months</th>
                                <th>Total Pending Months</th>
                                <th>Rent Amount</th>
                                <th>Start of Contract</th>
                                <th>End of Contract</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $sql = "SELECT payment.*,contract.*,rent_property.*,users.* FROM payment
                                INNER JOIN contract ON contract.contract_id = payment.booking_id
                                INNER JOIN users ON users.id = contract.tenant_id
                                INNER JOIN rent_property ON rent_property.pid = contract.house_id
                                WHERE contract_status='1' AND pay_status='Payment completed'";
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
                                <td><?php echo $rows['duration_month']; ?> Months</td>
                                <?php
                               
                                  $duration = $rows['duration_month'];
                                  			
                                  $num_rows=mysqli_num_rows($query);
                                  $remaing = $duration - $num_rows;
                                ?>
                                <td><?php echo $num_rows; ?></td>
                                <td><?php echo $remaing; ?></td>
                                <td>$<?php echo $rows['rent_per_term']; ?></td>
                                <td><?php echo $rows['start_day']; ?></td>
                                <td><?php echo $rows['end_day']; ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="pendingNotice.php?con_id=<?php echo $rows['contract_id']; ?>&t_id=<?php echo $rows['tenant_id']; ?>"><i class="fas fa-exclamation-triangle"></i> Send Pending Notification</a>   
                                </td>
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
include('admin_includes/footer.php');
?>                