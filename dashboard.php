<?php 

//header  included
include('include/header.php'); 
if (strlen($_SESSION['userid'] == 0)) {
  echo "<script>alert('Sign In into your account first');</script>";
  echo "<script>window.location.href='signin.php'</script>";
}
?>
<main>
    <div class="container py-5">
      <?php
        $userid =  $_SESSION['userid'];
        $noticequery = "SELECT  contract.*,users.*,pay_notification.* FROM  pay_notification
        INNER JOIN users ON users.id = pay_notification.t_id 
        INNER JOIN contract ON contract.contract_id = pay_notification.con_id
        WHERE t_id = '$userid' AND contract_status = '1' AND p_status='0'";
      
        $result = mysqli_query($conn, $noticequery);
        while($rows = mysqli_fetch_array($result)){ ?>
         <div class="alert alert-danger" role="alert">
          You have one pending notification for <b><?php echo $rows['pay_month']?> Month.</b> Please Pay your Monthy <a href="payRent.php" class="alert-link">Rent now </a>
        </div>
       <?php }?>

        
    <div class="card">
        <div class="card-header text-center">
            Welcome <b><?php echo ucwords($_SESSION['username']); ?></b>
        </div>
        <div class="card-body">
            <?php
                $userid =  $_SESSION['userid'];
                $query = "SELECT  contract.*,users.*,rent_property.* FROM  contract
                INNER JOIN users ON users.id = contract.tenant_id 
                INNER JOIN rent_property ON rent_property.pid = contract.house_id
                WHERE tenant_id = '$userid' AND contract_status = '1' ";
                $result1 = mysqli_query($conn, $query);
                $row=mysqli_fetch_assoc($result1);
                $numsrows = mysqli_num_rows($result1);
            ?>
            <?php if($numsrows > 0) { ?>
            <h5 class="card-title">You Occupy Property for Rent: <span class="badge bg-dark"><?php echo $row['title']; ?></span></h5>
            <p class="card-text">The information below shows the amount to be paid with respect with the Months stated and their respective due dates.</p>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Due Date</th>
                      <th>Rent to be Paid</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $total = 0;
                    do{
                      $hid = $row['house_id'];
                      $dur = $row['duration_month'];
                      $term = $row['duration_month'];
                      $div = $dur/$term;
                      $day = $row['start_day'];
                      $day1  = date("Y-m-d", strtotime($day. "+ 2 days"));
                      echo '<tr>';
                      echo '<td>'.$day1.'</td>';
                      echo '<td>$'.number_format($row['rent_per_term']).'/=</td>';
                      echo '</tr>';
                      for ($i = $div; $i < $dur; $i += $div) {
                        echo '<tr>';
                        $date  = date("Y-m-d", strtotime("+".$i." months" , strtotime("$day")));
                        $date1  = date("Y-m-d", strtotime($date. "+ 2 days"));
                        echo '<td>'.$date1.'</td>';
                        echo '<td>$'.number_format($row['rent_per_term']).'/=</td>';
                        echo '</tr>';
                      }

                      echo '<tr><td>TOTAL</td><td>$'.number_format($row['total_rent']).'/=</td></tr>';

                      $row1 = mysqli_fetch_assoc($result1);
                    } while ($row1); ?>

                  </tbody>
                </table>
              </div>
           
            <a href="payRent.php" class="btn btn-primary">Pay Rent</a>
            <?php } else {?>
                <h3>No rental property contract active now.</h3>
                <br>
                <h5>Please click <a href="properties.php">here</a> to see avaible rental options.</h3>
            <?php }?>
        </div>
        </div>
    </div>
</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
