<?php 

//header  included
include('include/header.php'); 
?>
<main>
    <?php
        $pid = $_GET['pid'];
        $sql="SELECT * FROM rent_property 
        INNER JOIN state ON  state.sid=rent_property.state 
        INNER JOIN city ON  city.cid=rent_property.city 
        WHERE pid = $pid";
        $query=mysqli_query($conn,$sql);			
        $row=mysqli_fetch_array($query);
        ?>
    <div class="container my-5 px-4 py-5">
        <h2 class="text-center mb-4">Rental Properties Details</h2>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="PropertyImages/<?php echo $row['pimage']; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="PropertyImages/<?php echo $row['pimage1']; ?>" class="d-block w-100" alt="...">
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                </div>
                <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo $row['pcontent']; ?></p>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-dark"><b>Property Details:</b></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Property Type:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['type']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Property Floor:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['floor']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Property Type:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['type']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Bedroom:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['bedroom']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Bathroom:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['bathroom']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Balcony:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['balcony']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Kitchen:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['kitchen']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Hall:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['hall']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Property Area:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['size']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Rent Per Month:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['rent_per_month']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            State:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['sname']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            City:
                            <span class="badge bg-primary rounded-pill"><?php echo $row['cname']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Property location Address :</div>
                            <?php echo $row['location']; ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="rentProperty.php?pid=<?php echo $row['pid']; ?>" type="button" class="btn btn-success">Rent Now</a>
                        </li>
                    </ul>
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
