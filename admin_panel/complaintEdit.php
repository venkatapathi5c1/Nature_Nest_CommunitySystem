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
    $status = $_POST['IssueStatus'];

    $qry = "update complaint_issues set IssueStatus='$status' where id ='$id'";
    $result = mysqli_query($conn,$qry); //query executes

    if ($result) {
  
        echo "<script>alert('Complaint Request Updated Successfully');</script>";     
        echo "<script>window.location='complaintIssue.php';</script>";          
    }
    else{
        echo "<script>alert('Invalid Details Entered Please try again later.');</script>";  
        echo "<script>window.location='complaintIssue.php';</script>";                  
    }
}
?>

    <main>
        <div class="container mt-5">
            <div class="card p-3">
                <h5 class="card-title">
Complaint Details</h5>
                <div class="card-body">
                    <?php
                        $id = $_GET['editId'];
                        $sql = "SELECT * from complaint_issues WHERE id = '$id'";
                        $query = mysqli_query($conn,$sql);			  
                        $row=mysqli_fetch_array($query);       
                    ?>
                    <div class="table-responsive-md">
                    <form method="post">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr class="table-dark"><td colspan="10">Complaint Details</td></tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Title</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['title']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Subject</p></td>
                                    <td colspan="9"><p class="m-1"><?php echo $row['subject']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold m-1">Request Status: </p></td>
                                    <td colspan="9">
                                        <div class="form-group col-md-6 mb-2">
                                            <select class="form-select" name="IssueStatus" required="">
                                                <option value="">Select Status</option>
                                                <option value="0" <?php if( $rows['IssueStatus'] == 0){ echo 'selected="selected"'; } ?> >Active</option>
                                                <option value="1" <?php if( $rows['IssueStatus'] == 1){ echo 'selected="selected"'; } ?>>Resolve</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <button type="submit" class="btn btn-primary" name="submit">Update Request</button>
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