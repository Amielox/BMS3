<?php include 'includes/header.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/slugify.php'; ?>
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
          <a  class="btn-success btn-sm btn-flat float-right button mx-2" href="report.php" >View Report</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      <style>
  .anychart-credits-text{
    color:white;
  }
</style>

      <div class="row">
        <div class='col-md-12'>
          <?php
            if(isset($_SESSION['error'])){
              echo "
              
                <div class=' alert-dismissible'>
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
        </div>
      </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box  lb">
              <div class="inner px-3 py-2">
              
                <?php
                  $sql = "SELECT * FROM residents";
                  $query = $conn->query($sql);

                  echo "<h3 class='p-0 m-0'>".$query->num_rows."</h3>";
                ?>

                <p class='p-0 m-0'>Total Users </p>
              </div>
              
              
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-xs-6">
            
            <div class="small-box gy">
            <div class="inner px-3 py-2">
                <?php
                  $sql = "SELECT * FROM admin";
                  $query = $conn->query($sql);

                  echo "<h3 class='p-0 m-0'>".$query->num_rows."</h3>";
                ?>

                <p class='p-0 m-0'>Total Admin</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box  gr">
              <div class="inner px-3 py-2">
                <?php
                  $sql = "SELECT * FROM bmss where status='Pending'";
                  $query = $conn->query($sql);

                  echo "<h3 class='p-0 m-0'>".$query->num_rows."</h3>";
                ?>
              
                <p class='p-0 m-0'>Ongoing Transactions</p>
              </div>
              
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box  gg">
              <div class="inner px-3 py-2">
                <?php
                   
                   $sql = "SELECT SUM(total) AS total from bmss   WHERE   YEAR(di)= YEAR(CURRENT_TIMESTAMP)  ";
                   $result = $conn->query($sql);
                   $data =  $result->fetch_assoc();
                 
                   echo "<h3 class='p-0 m-0'>"."P".$data['total'].".00"."</h3>";
                    
                   ?>

                <p class='p-0 m-0'>Overall Revenue  </p>
              </div>
              
            
            </div>
          </div>
          <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline">
                
                <div class="card-body">
                  <div id="container"  style="height:30vh;max-height:30vh; max-width: 100%;">
                  </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
           <!-- BAR CHART -->
           <div class="chart">     
              <div class="card card-outline">
          
                  <div class="card-body">
                    <div id="chart">
                    <canvas id="agechart"  style="height:600px;max-height:600px;width: 60%;"></canvas>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>  

         
          </div>
         
          <div class="col-lg-3">
            <!-- BAR CHART -->
            <div class="chart">     
              <div class="card card-outline">
              
                  <div class="card-body">
                    <div id="chart">
                    <canvas  id="chartjs_bar"  style="height:600px;max-height:600px;width: 60%;"></canvas> 
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div> 
        </div> 
        </div>
        <div class="col-lg-3 d-none">
            <!-- BAR CHART -->
            <div class="chart">     
              <div class="card card-outline">
              
                  <div class="card-body">
                    <div id="chart">
                    <canvas  id="diseaseChart"  style="height:600px;max-height:600px;width: 40%;"></canvas> 
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div> 
        </div> 
        </div>

    <?php include 'chartscript.php'; ?>