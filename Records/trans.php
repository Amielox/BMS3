
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
<?php include 'includes/header.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/slugify.php'; ?>

<form method="post" action="transreport.php">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Transaction Reports
            </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reports </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<style>
  .anychart-credits-text{
    color:white;
  }
</style>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="dropdown mb-4">
          <a  class="btn-success btn-sm btn-flat float-left button mx-2" id="button1">Print</a> 
        </div>
        <div class="dropdown mb-4">
          <button class=" d-sm-inline-block btn btn-sm btn-light shadow-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Year
          </button>
          <ul class="dropdown-menu">
          <?php
          $key = date("Y");
          $sql = " SELECT DISTINCT(Year(di)) as year1 FROM bmss;";
          $query = $conn->query($sql);
         
          while($row = $query->fetch_assoc()){
            $year1 = $row['year1'];
            ?>
            <li><a  href="#"><input type="submit" class="dropdown-item" name="<?php echo $row['year1'];?>" value="<?php echo $year1;?>"></a></li>
            
        <?php  } 
        
        foreach ($_POST as $key ) {
     
         // echo $key;
         
      }
        
        //print_r($_POST);?>
          </ul>

       

        </div>
        </div>
     
        
   
  
        
        
        <div id="makepdf1">
        
          <div class="row">
              <div class="col-lg-12">
              <div class="card card-outline">
                <div class="card-header">
                  <h3 class="card-title">Revenue Summary <?php echo $key;?></h3>
                </div>
                <div class="card-body">
                <div id="container" style="height:30vh;">
                  </div>
                </div>
            </div>
              </div>
          
        </div>
            
          <div class="row">
           
            <div class=" col-md-7 ">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Monthly Overview</h3>
                
              </div>
              <div class="card-body p-0">
                <table id="example3" class="table table-head-fixed table-hover table-border   table-striped-columns  ">
                <thead>
                <tr>
                <th>Service</th>
                <th>Last Month</th>
                <th>This Month</th>    
                
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>
               
                Barangay Certificate
                </td>
                <td><?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = (month(CURRENT_TIMESTAMP)-1)  and  YEAR(di)= $key   and  purpose='Baranggay Certificate' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00";

                     $lastm = $data['total'];
                    ?></td>
                <td>           
                    
                    
                     
                   
                <?php  $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP) and  YEAR(di)= $key   and  purpose='Baranggay Certificate' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     $thism = $data['total'];
                     echo "P".$thism.".00";
                     if ($thism > $lastm){
                     $per = ($thism - $lastm )/ $lastm * 100;
                      if ($per==0){
                        echo "<small class='text-warning mr-1 float-right'><i class='fas fa-arrow-up'></i>".number_format($per,2)."%";
                      }
                      else if ($per > 0){
                        echo "<small class='text-success mr-1 float-right'><i class='fas fa-arrow-up'></i>".number_format($per,2)."%";
                      } 
                    }
                     else if ($thism < $lastm){
                      $per = ($lastm - $thism )/ $lastm * 100; 
                     echo "<small class='text-danger mr-1 float-right'><i class='fas fa-arrow-down'></i>"."-".number_format($per,2)."%";
                    }
                ?>
                </small>

                </td>
               
                
                </tr>
                <tr>
                <td>
        
                Certificate of Indigency
                </td>
                <td><?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = (month(CURRENT_TIMESTAMP)-1)  and  YEAR(di)= $key   and  purpose='Certificate of Indigency' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00";
                     $lastmin = $data['total'];
                    ?></td>
                <td>
       
                
                <?php  $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP) and  YEAR(di)= $key   and  purpose='Certificate of Indigency' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     $thismin = $data['total'];
                     echo "P".$thismin.".00";
                     if ($thismin > $lastmin){
                     $per = ($thismin - $lastmin )/ $lastmin * 100;
                 
                       if ($per>0){
                        echo "<small class='text-success mr-1 float-right'><i class='fas fa-arrow-down'></i>".number_format($per,2)."%";
                      } 
                    }
                     else if ($thismin < $lastmin){
                      $per = ($lastmin - $thismin )/ $lastmin * 100; 
                     
                     echo "<small class='text-danger mr-1 float-right'><i class='fas fa-arrow-down'></i>"."-".number_format($per,2)."%";
                    }
                    else{

                    }

                 ?>
                </small>

                </td>
                
                </tr>
                <tr>
                <td>
               
                Barangay Clearance
                </td>
                <td><?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = (month(CURRENT_TIMESTAMP)-1)  and  YEAR(di)= $key   and  purpose='Certificate of Residency' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00";
                     $lastm = $data['total'];
                    ?></td>
                <td>      <?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP) and  YEAR(di)= $key   and  purpose='Certificate of Residency' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00 ";
                    ?>
                <?php  $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP) and  YEAR(di)= $key   and  purpose='Certificate of Residency' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     $thism = $data['total'];
                     if ($thism > $lastm){
                     $per = ($thism - $lastm )/ $lastm * 100;
                      if ($per==0){
                        echo "<small class='text-warning mr-1 float-right'><i class='fas fa-arrow-up'></i>".number_format($per,2)."%";
                      }
                      else if ($per > 0){
                        echo "<small class='text-success mr-1 float-right'><i class='fas fa-arrow-down'></i>".number_format($per,2)."%";
                      } 
                    }
                     else if ($thism < $lastm){
                      $per = ($lastm - $thism )/ $lastm * 100; 
                     echo "<small class='text-danger mr-1 float-right'><i class='fas fa-arrow-down'></i>"."-".number_format($per,2)."%";
                    }
                ?>
                </small>
           
                </td>
               
                </tr>
                <tr>
                <td>
                
                Barangay ID
                </td>
                <td><?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = (month(CURRENT_TIMESTAMP)-1)  and  YEAR(di)= $key   and  purpose='Barangay ID' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00";
                     $lastmin = $data['total'];
                    ?></td>
                <td>
                <?php
                     $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP)  and  YEAR(di)= $key   and  purpose='Barangay ID' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     echo "P".$data['total'].".00 ";
                    ?>
                <?php  $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP) and  YEAR(di)= $key   and  purpose='Barangay ID' ";
                     $result = $conn->query($sql);
                     $data =  $result->fetch_assoc();
                     $thismin = $data['total'];
                     if ($thismin > $lastmin){
                     $per = ($thismin - $lastmin )/ $lastmin * 100;
                      if ($per==0){
                        echo "<small class='text-warning mr-1 float-right'><i class='fas fa-arrow-down'></i>".number_format($per,2)."%";
                      }
                      else if ($per>0){
                        echo "<small class='text-success mr-1 float-right'><i class='fas fa-arrow-down'></i>".number_format($per,2)."%";
                      } 
                    }
                     else if ($thismin < $lastmin){
                      $per = ($lastmin - $thismin )/ $lastmin * 100; 
                     echo "<small class='text-danger mr-1 float-right'><i class='fas fa-arrow-down'></i>"."-".number_format($per,2)."%";
                    }

                 ?>
                </small>

                </td>
               
                </tr>
                
                </tbody>
                </table>
              </div>
            </div>

            </div>


            <div class="col-md-5 ">
            <div class="card">
<div class="card-header border-0">
<h3 class="card-title">Summary (<?php echo Date('M'); ?> <?php echo $key; ?>  )</h3>

</div>
<div class="card-body">
<div class="d-flex justify-content-between align-items-center  py-0 mb-0">
<p class="text-success text-xl">
<i class="ion ion-ios-refresh-empty"></i>
</p>
<p class="d-flex flex-column text-right">
<span class="font-weight-bold">
 <?php
                   
                  
                   $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = month(CURRENT_TIMESTAMP)  and  YEAR(di)= $key   ";
                   $result = $conn->query($sql);
                   $data =  $result->fetch_assoc();
                   echo "P".$data['total'].".00";
                    
                   ?>
</span>
<span class="text-muted">Current Month Sale</span>
</p>
</div>

<div class="d-flex justify-content-between align-items-center border-bottom mb-3">
<p class="text-warning text-xl">
<i class="ion ion-ios-cart-outline"></i>
</p>
<p class="d-flex flex-column text-right">
<span class="font-weight-bold">
 <?php
                   
                  
                   $sql = "SELECT * from bmss WHERE MONTH(di) = MONTH(CURRENT_TIMESTAMP)  and  YEAR(di)= $key   ";
                   $query = $conn->query($sql);
                   
                   echo $query->num_rows." transactions";
                    
                   ?>
</span>
 <span class="text-muted">Successful Transactions </span>
</p>
</div>

<div class="d-flex justify-content-between align-items-center  mb-0">
<p class="text-danger text-xl">
<i class="ion ion-ios-people-outline"></i>
</p>
<p class="d-flex flex-column text-right ">
<span class="font-weight-bold">
 <?php
                   
                  
                   $sql = "SELECT SUM(total) AS total from bmss   WHERE   YEAR(di)= $key   ";
                   $result = $conn->query($sql);
                   $data =  $result->fetch_assoc();
                   echo "P".$data['total'].".00";
                    
                   ?>
</span>
<span class="text-muted">Annual Revenue  </span>
</p>
</div>

</div>    </div>
</div>
            </div>
          </div>
        </div>
        
      </div>
</div>
    <!-- /.content -->
  </div>

                  
 
</form> 
  <!-- /.content-wrapper -->
  <?php include 'chartscript.php'; ?>
  <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->


