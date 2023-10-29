<?php
// database connection file include
include('../include/dbconnection.php');
// admin session check
include('admin_includes/admin-permission.php');
// header include
include('admin_includes/header.php');
// menubar include
include('admin_includes/menubar.php');
// insert into query
if(isset($_POST['submit']))
{
    $id = $_GET['editId'];
    $status = $_POST['contract_status'];

    $qry = "update contract set contract_status='$status' where contract_id ='$id'";
    $result = mysqli_query($conn,$qry); //query executes

    if ($result) {
  
        echo "<script>alert('Contract Request Updated Successfully');</script>";     
        echo "<script>window.location='propertyRentalReq.php';</script>";          
    }
    else{
        echo "<script>alert('Invalid Details Entered Please try again later.');</script>";  
        echo "<script>window.location='propertyRentalReq.php';</script>";                  
    }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">Contract Request Details for Rental Property</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $sql = "SELECT  contract.*,users.*,rent_property.*,city.*,state.* FROM  contract
                        INNER JOIN users ON users.id = contract.tenant_id 
                        INNER JOIN rent_property ON rent_property.pid = contract.house_id
                        INNER JOIN state ON  state.sid=rent_property.state 
                        INNER JOIN city ON  city.cid=rent_property.city 
                        WHERE contract_id = ' $id'";
                        $query = mysqli_query($conn,$sql);			  
                        $row=mysqli_fetch_array($query);       
                    ?>
                    <div class="table-responsive-md">
                    <form method="post">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr class="table-dark"><td colspan="10">Properties Details</td></tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Property Title:</p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['title']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Property Type:</p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['type']; ?></p></td>
                                    <td><p class="fw-bold m-1">Property Status:</p></td>
                                    <td colspan="2">
                                    <?php if($rows['status'] == 'available'){ ?>
                                       <span class="badge rounded-pill bg-success fs-6">Available</span>
                                    <?php } else { ?>
                                       <span class="badge rounded-pill bg-secondary fs-6">Occupied</span>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Description</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['pcontent']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Property Floor:</p></td>
                                    <td colspan="3"><p class="m-1"><?php echo $row['floor']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Property Area:</p></td>
                                    <td colspan="4"><p class="m-1"><?php echo $row['size']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Number of Bedroom:</p></td>
                                    <td><p class="badge bg-primary"><?php echo $row['bedroom']; ?></p></td>
                                    <td><p class="fw-bold m-1">Number of Bathroom:</p></td>
                                    <td><p class="badge bg-primary"><?php echo $row['bathroom']; ?></p></td>
                                    <td><p class="fw-bold m-1">Number of Balcony:</p></td>
                                    <td><p class="badge bg-primary"><?php echo $row['balcony']; ?></p></td>
                                    <td><p class="fw-bold m-1">Number of Kitchen</p></td>
                                    <td><p class="badge bg-primary"><?php echo $row['kitchen']; ?></p></td>
                                    <td><p class="fw-bold m-1">Number of Hall</p></td>
                                    <td><p class="badge bg-primary"><?php echo $row['hall']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">City:</p></td>
                                    <td colspan="3"><p class="m-1"><?php echo $row['cname']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">State:</p></td>
                                    <td colspan="4"><p class="m-1"><?php echo $row['sname']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Property location Address:</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['location']; ?></p></td>
                                </tr>
                                <tr class="table-dark"><td colspan="10">Tenant Details</td></tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Tenant Full name: </p></td>
                                    <td colspan="3"><p class="m-1"><?php echo $row['full_name']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Tenant Email:</p></td>
                                    <td colspan="4"><p class="m-1"><?php echo $row['email_id']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Tenant Mobile no: </p></td>
                                    <td colspan="3"><p class="m-1"><?php echo $row['mobile_no']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Profile Status:</p></td>
                                    <td colspan="4">
                                    <?php if($rows['user_status'] == 0){ ?>
                                    <span class="badge rounded-pill bg-info fs-6">Active</span>
                                    <?php } else { ?>
                                    <span class="badge rounded-pill  bg-secondary fs-6">Deactive</span>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <tr class="table-dark"><td colspan="10">Contract Request Details</td></tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Duration of Months: </p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['duration_month']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Rent Per Month:</p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['rent_per_term']; ?></p></td>
                                    <td><p class="fw-bold m-1">Contract Request Status: </p></td>
                                    <td colspan="2">
                                    <?php if($rows['contract_status'] == 0){ ?>
                                        <span class="badge rounded-pill bg-danger fs-6">Inactive</span>
                                    <?php } else { ?>
                                        <span class="badge rounded-pill bg-success fs-6">Active</span>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Total Rent: </p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['total_rent']; ?></p></td>
                                    <td colspan="2"><p class="fw-bold m-1">Start of Contract:</p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['start_day']; ?></p></td>
                                    <td><p class="fw-bold m-1">End of Contract: </p></td>
                                    <td colspan="2"><p class="m-1"><?php echo $row['end_day']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Contract Request Status: </p></td>
                                    <td colspan="9">
                                        <div class="form-group col-md-6 mb-2">
                                            <select class="form-select" name="contract_status" required="">
                                                <option value="">Select Status</option>
                                                <option value="0" <?php if( $rows['contract_status'] == 0){ echo 'selected="selected"'; } ?> >Inactive</option>
                                                <option value="1" <?php if( $rows['contract_status'] == 1){ echo 'selected="selected"'; } ?>>Active</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <button type="submit" class="btn btn-primary" name="submit">Update Contract Request</button>
                                    </td>
                                </tr>
                            <tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php 
// footer include
include('admin_includes/footer.php');
?>                