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
    $delquery = mysqli_query($conn,"DELETE from complaint_issues where id = '$id'");
        if ($delquery) {
         echo "<script>alert('Record deleted Successfully.');</script>";
      } else {
        echo "<script>alert('Something Went Wrong Please try again later.');</script>";
        }
    }
?>

    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Manage Complaint list</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Complaints
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Person Name</th>
                                <th>Person Email</th>
                                <th>Person Mobile No</th>
                                <th>Property</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $sql = "SELECT complaint_issues.*,complaint_issues.id as CID,rent_property.pid,rent_property.title as Ptitle,users.* FROM complaint_issues
                                INNER JOIN rent_property ON rent_property.pid = complaint_issues.house_id
                                INNER JOIN users ON users.id = complaint_issues.tenant_id";
                                $query = mysqli_query($conn,$sql);			
                                    $i = 1;	// sr no
                                    while($rows=mysqli_fetch_array($query))
                                    {
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['full_name']; ?></td>
                                <td><?php echo $rows['email_id']; ?></td>
                                <td><?php echo $rows['mobile_no']; ?></td>
                                <td><?php echo $rows['Ptitle']; ?></td>
                                <td><?php echo $rows['title']; ?></td>
                                <td><?php echo $rows['subject']; ?></td>
                                <?php if($rows['IssueStatus'] == 0){ ?>
                                        <td><span class="badge bg-secondary">Active</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-success">Issue Resolve</span></td>
                                    <?php } ?>
                                <td>  
                                    <a class="btn btn-danger" href="complaints.php?delId=<?php echo $rows['id']; ?>" onclick="return confirm('Are sure to want delete this Record!');" style="font-size:12px"><i class="fas fa-trash-alt"></i> Delete</a>
                                    <a class="btn btn-success" href="complaintEdit.php?editId=<?php echo $rows['CID']; ?>" style="font-size:12px"><i class="fas fa-edit"></i> Edit</a>
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