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
                <h3 class="text-center fw-bold mb-5">Other Tenant to conatct </h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Other Tenant to conatct 
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userid =  $_SESSION['userid'];
                                    $sql = "SELECT users.*,contract.* from users
                                    INNER JOIN contract on contract.tenant_id = users.id 
                                    WHERE tenant_id != '$userid' and contract_status = '1' ";
                                    $query = mysqli_query($conn,$sql);			
                                        $i = 1;	// sr no
                                        while($rows=mysqli_fetch_array($query))
                                        {
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows['full_name']; ?></td>
                                    <td><?php echo $rows['mobile_no']; ?></td>
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