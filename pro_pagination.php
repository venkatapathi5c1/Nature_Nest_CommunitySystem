<?php  
//connection file
include('include/dbconnection.php'); 

$limit = 6;
        
//for first time load data  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

$sql = mysqli_query($conn, "SELECT * FROM rent_property WHERE status = 'available' 
ORDER BY pid DESC LIMIT $start_from, $limit");
while($row = mysqli_fetch_array($sql)){
?>
<div class="col-lg-4">
    <div class="card border-warning border-3 mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <img src="PropertyImages/<?php echo $row['pimage']; ?>" class="img-fluid rounded-start" alt="..." style="height:220px;">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['pcontent']; ?></p>
                <p class="card-text"><b>Monthly Rent:</b>  $<?php echo $row['rent_per_month']; ?></p>
                <p class="card-text"><b>Property Type:</b> <?php echo $row['type']; ?></p>
                <a href="property_details.php?pid=<?php echo $row['pid']; ?>" class="btn btn-primary">View Property Details</a>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>
