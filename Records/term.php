  
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Manage Officials</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Officials</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";  
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

      <div class="card-header">   
        <a href="#addnew" data-toggle="modal" class="btn-info btn-sm btn-flat float-left "><i class="fa fa-plus"></i> New</a>       
      </div>
      <br>
      <div class="row">

    <?php
          $sql = "SELECT * FROM term ORDER BY term ASC";
          $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){     
    ?> 
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 cardc">
            <div class="card">
            <img src="images/transaction.png"style="height:150px;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Barangay Officials</h5>
                  <p class="card-text"><?php echo $row['term']; ?></p>  
                  <hr>
                  <form action="officials.php" method="post">
                  <input type='hidden' style="display:none;"  name='submit' class='ss' id='submit' value='<?php echo $row['term']; ?>' ?>
                  <button type="submit" class='btn-primary btn-sm btn-flat float-left' style="background-color:white; border: none; color:#1aa3ff"><i class="fas fa-fw fa-eye"></i><b>View</b></button>
                  <button class='btn-danger btn-sm delete btn-flat float-right' data-id=<?php echo $row['id']; ?> style="background-color:white; border: none; color:red"><i class='fa fa-trash'></i> <b>Delete</b></button>
                  </form>
                </div>
            </div>
          </div>
            <?php } ?>
        </div>
      </div>
    </div>
</div>
</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/term_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
</div>

<script>

    $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


  function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'term_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('.term').html(response.term);
    }
  });
}


</script>

</body>
</html>
