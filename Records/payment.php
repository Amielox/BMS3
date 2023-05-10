

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
            <h4 class="m-0">Manage Certificate/ Barangay ID Payment</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Residents</li>
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
      <div class="row">
          <div class="col-12 ">
              <div class="card-header">   
                     <a href="archive.php" style="text-align:right;"><button class="btn-secondary btn-sm btn-flat float-right"> Ready to Pick up</button></a>
                </div>

                <div class="card-body">
                  <table id="example1" class="table table-head-fixed table-hover bg-light  ">
                <thead>
                <th>Tracking Number</th>
                <th>Document Type</th>
                <th>Fullname</th>
                <th>Date Issued</th>
                <th>Status</th>
                  <th width="10%">Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM bmss WHERE status='Acknowledged'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/profile.jpg';
                      echo "
                          <tr>
                          <td>".$row['trackingno']."</td>
                          <td>".$row['purpose']."</td>
                          <td>".$row['sname'].", " .$row['fname']." ".$row['mname']."</td>
                          <td>".$row['di']."</td>
                          <td>".$row['status']."</td>
                          <td>  
                            <button class=' btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            </form>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
</div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/payment_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>
</div>


<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'payment_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_trackingno').val(response.trackingno);
      $('#edit_purpose').val(response.purpose);
      $('#edit_status').val(response.status);
      $('#edit_residentid').val(response.residentid);
      $('#edit_fname').val(response.fname);
      $('#edit_sname').val(response.sname);
      $('#edit_mname').val(response.mname);
      $('#edit_purokno').val(response.purokno);
      $('#edit_contno').val(response.contno);
      $('#edit_email').val(response.email);
      $('#edit_address').val(response.address);

    }
  });
}


</script>



</body>
</html>
