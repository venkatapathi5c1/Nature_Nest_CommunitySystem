<footer class="footer mt-auto py-4 bg-light text-center">
  <div class="container">
    <span class="text-muted">Natures Nest Community  System</span>
  </div>
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
    <script>
    // datatble script
    

    $(document).ready(function(){
      $('.pagination').pagination({
              items: <?php echo $total_records;?>,
              itemsOnPage: <?php echo $limit;?>,
              cssStyle: 'light-theme',
          currentPage : 1,
          onPageClick : function(pageNumber) {
            jQuery("#target-content").html('loading...');
            jQuery("#target-content").load("pro_pagination.php?page=" + pageNumber);
          },
          onInit :function() {
                jQuery("#target-content").html('loading...');
                jQuery("#target-content").load("pro_pagination.php?page=1");
            }
          });
      });

     
    </script>
      
  </body>
</html>