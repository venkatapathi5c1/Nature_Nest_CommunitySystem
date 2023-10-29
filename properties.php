<?php 

//header  included
include('include/header.php'); 
?>
<main>

    <section id="questions" class="p-5 my-5">
      <div class="container my-5">
        <h2 class="text-center mb-4">Rental Properties</h2>
            <div class="row" id="target-content">
                
            </div>
            <?php
                $limit = 6;
                //for total count data
                $countSql = mysqli_query($conn, "SELECT COUNT(pid) FROM  rent_property WHERE status = 'available' "); 
                $row = mysqli_fetch_row($countSql);
                
                $total_records = $row[0];  
                $total_pages = ceil($total_records / $limit);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                        if($i == 1):?>
                        <li class="page-item" id="<?php echo $i;?>"><a class="page-link" href='pro_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                        <?php else:?>
                        <li class="page-item" id="<?php echo $i;?>"><a class="page-link" href='pro_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                        <?php endif;?>          
                    <?php endfor;endif;?>
                    </ul>
                    </nav>
                </div>
            </div>
      </div>
    </section>

</main>

<?php 
//footer  included
include('include/footer.php'); 
?>
