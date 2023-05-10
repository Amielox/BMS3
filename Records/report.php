<?php include 'includes/header.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/slugify.php'; ?>
<style>
  .card{
    border-radius:10 !important;
    padding:12px;
  }
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Resident Report </h4>
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9 dropdown mb-4">
            <a  class="btn-success btn-sm btn-flat float-left button mx-2" id="button1">Print</a> 
          </div>
          <div class="col-lg-3">
            
            <a  class="btn-light btn-sm btn-flat float-right button mx-2" href="blotter.php">Log-in Trail</a> 
            <a  class="btn-light btn-sm btn-flat float-right button mx-2" href="residents.php">Resident's List</a> 
          </div>
        </div>
       
     <div id="makepdf1" class="">
        
        
       
          <div class="row ">
        

          <div class="col-lg-3">
           <!-- BAR CHART -->
           <div class="chart">     
              <div class="card card-outline">
          
                  <div class="card-body">
                    <div id="chart">
                    <canvas id="residentchart"   style="min-height:height:600px;max-height:600px;width: 60%;"></canvas>
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
                    <canvas id="agechart"   style="height:600px;max-height:600px;width: 60%;"></canvas>
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
                    <canvas id="purok"   style="height:600px;max-height:600px;width: 60%;"></canvas>
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
          
        
        <!--  <div class="html2pdf__page-break"></div>-->
          
        <div class="card">      
          <div class="row">
           
            <div class=" col-md-3 ">
              <div class="card-body">  
                <table id="example3" class="table table-head-fixed table-hover table-border   table-striped-columns   ">
                  <thead>
                    <th>Purok</th>
                    <th>Population</th>
                  </thead>
                  <tbody>
                    <tr>
                      
                      <td>Purok 1</td>
                      <td>   
                          <?php
                          $sql = "SELECT * FROM residents WHERE puroknumber = 1 ";
                          $query = $conn->query($sql);

                          echo $query->num_rows;
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>Purok 2</td>
                      <td> 
                          <?php
                          $sql = "SELECT * FROM residents WHERE puroknumber = 2 ";
                          $query = $conn->query($sql);

                          echo $query->num_rows;
                          ?>
                      </td>
                    </tr>
                    <tr>
                     
                      <td> Purok 3</td>
                      <td>
                      <?php
                     
                     $sql = "SELECT * FROM residents WHERE puroknumber = 3 ";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Purok 4</td>
                      <td> 
                      <?php
                      
                      $sql = "SELECT * FROM residents WHERE puroknumber = 4 ";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Purok 5</td>
                      <td>  <?php
                      
                      $sql = "SELECT * FROM residents WHERE puroknumber = 5 ";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?></td>
                    </tr>

                    <tr>
                     
                      <td>Purok 6</td>
                      <td> <?php
                      
                      $sql = "SELECT * FROM residents WHERE puroknumber = 6 ";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?></td>
                    </tr>
                                       
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-9 ">
              <div class="card-body">  
              <div class="text-bold text-muted"><h6>More Details</h6></div>
              <div class="row">
                <div class="alert alert-light mr-2" style="height:80px; width:32%" >
                <i class="nav-icon fas fa-chart-area" style="color:#b9abcf"></i> System-based number of Residents:  
                <?php
                      
                      $sql = "SELECT * FROM residents ";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
              </div>
              <div class="alert alert-light mr-2" style="height:80px; width:32%;" >
              <i class="nav-icon fas fa-chart-area" style="color:#b9abcf"></i>  Census-based number of Residents:
              <?php
                      
                      $sql = "SELECT population from census ORDER BY id DESC LIMIT 1";
                      $result = $conn->query($sql);
                      $data =  $result->fetch_assoc();
                      echo $data['population'];
              ?>
              </div>
              <div class="alert alert-light" style="height:80px; width:32%;" >
              <i class="nav-icon fas fa-chart-area" style="color:#b9abcf"></i>  Total number of User Login: 
              </div></div>
              
              </div>
              <table id="example3" class="table table-head-fixed table-hover table-border   table-striped-columns   ">
                  <thead>
                    <th>Age Group</th>
                    <th>Population</th>
                 
                    
                  </thead>
                  <tbody>
                
                    <tr>
                     
                      <td>Young</td>
                      <td>
                      <?php
                     
                      $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)<21";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Adult</td>
                      <td> 
                      <?php
                      
                      $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)<60";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
                      </td>
                      <td></td>
                      <tr>
                      <td>Senior</td>
                      <td> 
                      <?php
                      
                      $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)<60";
                      $query = $conn->query($sql);

                      echo $query->num_rows;
                    ?>
                      </td>
                      <td></td>
                    </tr>
                    
                                       
                  </tbody>
                </table>
            </div>
          </div>
        </div>
         
</div></div>

        </div>
      </div><?php include 'includes/footer.php'; ?>
    </div><?php include 'chartscript.php'; ?>
    <!-- /.content -->
  </div>
</form> 
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->



<!---------------------------------
---------- scripts ------------->
<?php include 'includes/scripts.php'; ?>



</body>

</html>