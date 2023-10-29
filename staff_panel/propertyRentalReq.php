<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('staff_includes/staff-permission.php');
// header include
include('staff_includes/header.php');
// menubar include
include('staff_includes/menubar.php');

//Code for deletion of Record
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
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Contracts Request for Rent Property</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Contracts to Rent Property
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Tenant Name</th>
                                <th>Tenant Contact Information</th>
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
                                $staff_id = $_SESSION['staff_id'];
                                $sql = "SELECT  contract.*,users.*,rent_property.* FROM  contract
                                INNER JOIN users ON users.id = contract.tenant_id 
                                INNER JOIN rent_property ON rent_property.pid = contract.house_id
                                WHERE staff_id = ' $staff_id'";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['full_name']; ?></td>
                                <td>
                                    <b>Email Id: </b><?php echo $rows['email_id']; ?><br>
                                    <b>Mobile No: </b><?php echo $rows['mobile_no']; ?>
                                </td>
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
                                        <a class="btn btn-info" href="editContract.php?editId=<?php echo $rows['contract_id']; ?>" style="font-size:12px"><i class="fas fa-pen-square"></i> Edit Contract</a>
                                        <a class="btn btn-danger" href="propertyRentalReq.php?delId=<?php echo $rows['contract_id']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px;margin:15px"><i class="fas fa-trash-alt"></i> Delete</a>
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
include('staff_includes/footer.php');
?>                