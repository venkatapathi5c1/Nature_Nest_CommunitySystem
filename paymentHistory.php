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
                <h3 class="text-center fw-bold mb-5">My Rent Payment History</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All My Rent Payment Information
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Payment Reference Number</th>
                                    <th>Rent Amount Paid</th>
                                    <th>Rent Paid For</th>
                                    <th>Paid Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userid =  $_SESSION['userid'];
                                    $sql = "SELECT payment.*,contract.* FROM payment
                                    INNER JOIN contract ON contract.contract_id = payment.booking_id
                                    WHERE payment.tenant_id = '$userid' AND contract_status = '1'";
                                    // print_r($sql);die;
                                    $result = mysqli_query($conn, $sql);
                                    $numrows = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);
                                    if($numrows > 0){
                                    $total = 0;
                                    do{
                                   
                                        $cid = $row['contract_id'];
                                        $ref = $row['ref_no'];
                                        $amount = $row['amount'];
                                        $month = $row['pay_for'];
                                        $date = new DateTime($row['date']);
                                       
                                        echo '<tr>';
                                        echo '<td>'.$ref.'</td>';
                                        echo '<td>$'.number_format($amount).'</td>';
                                        echo '<td>'.$month.' Month</td>';
                                        echo '<td>'.$date->format('Y-m-d').'</td>';
                                        echo '</tr>';
                                        $total += $amount;
                                       
                                        $row = mysqli_fetch_assoc($result);
                                    }while ($row);
                                    echo "<tr><td class='fw-bold fs-5'>Total Amount Paid</td><td colspan='3' class='fw-bold fs-5 text-success'>$ ".number_format($total)."</td></tr>";
                                    ?>

                                </tbody>
                            </table>
                            <hr>
                            <br/>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <?php
                                    $sql1 = "SELECT * FROM contract WHERE tenant_id = '$userid' AND contract_status = '1'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    do{
                                    $total_rent = (int)$row1['total_rent'];
                                    $row1 = mysqli_fetch_assoc($result1);
                                    }while($row1);

                                    echo '<tr class="table-primary">';
                                    echo '<td class="fw-bold fs-5">Total Rent To be Pay:</td>';
                                    echo "<td><span class='badge bg-success fs-5'>$".number_format($total_rent)."</span></td>";
                                    echo '</tr>';
                                    $diff = $total_rent - $total;

                                    echo '<tr class="table-danger">';
                                    echo "<td class='fw-bold fs-5'>Total Remaing Rent to Pay:</td>";
                                    echo "<td><span class='badge bg-danger fs-5'>$".number_format($diff)."</span></td>";
                                    echo '</tr>';
                                    }?>

                                </tbody>
                            </table>
                        </div>
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