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
            <h4 class="m-0">Health Report </h4>
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
        
        </div>
       
     <div id="makepdf1" class="">
        
        
       
          <div class="row ">
        

          <div class="col-lg-4">
           <!-- BAR CHART -->
           <div class="chart">     
              <div class="card card-outline">
          
                  <div class="card-body">
                    <div id="chart">
                    <canvas id="diseaseChart"   style="height:200px;max-height:200px;width: 100%;"></canvas>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>  
          </div>
          <div class="col-lg-8">
           <!-- BAR CHART -->
           <div class="chart">     
              <div class="card card-outline">
          
                  <div class="card-body">
                    <div id="chart">
                    <canvas id="pwdchart"   style="height:200px;max-height:200px;width:100%;"></canvas>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>  
          </div>
        </div>
          <div class="row" >
          <div class=" col-md-7 ">
           <div class="card">
             <div class="card-body p-0">
               <table id="example3" class="table table-head-fixed table-hover table-border   table-striped-columns  ">
               <thead>
               <tr>
               <th>Type</th>
               <th>Total</th>
               </tr>
               </thead>
               <tbody>
               <tr>
               <td>
               HMF submission
               </td>
               <td> <?php
                            $sql = "SELECT * from hmf ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?> </td>
               </tr>
               <tr>
               <td>
               Covid Requests
               </td>
               <td><?php
                            $sql = "SELECT * from covidbooster where category='Covid Vaccination' ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?></td> 
               </tr>
               <tr>
               <td>
               Booster Requests
               </td>
               <td><?php
                            $sql = "SELECT * from covidbooster where category='Booster' ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?></td>
               <td>     
               </td>
               </tr>
               <tr>
               <td>
               Pending Schedule Requests
               </td>
               <td><?php
                            $sql = "SELECT * from covidbooster where sched='' ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?></td>
               <td>     
               </td>
               </tr>
       

               
               </tbody>
               </table>
             </div>
             
           </div>
           
       
          </div>
          <div class="col-lg-5 ">
            <div class="card">
            <div class="card-header border-0">
            <h3 class="card-title">Covid Vaxx Sites </h3>

            </div>
            <div class="card-body">
            <?php 
                            $sql = " SELECT DISTINCT site FROM covidbooster where site!='';";
                            $query = $conn->query($sql);
                            
                            while($row = $query->fetch_assoc()){
                                $site = $row['site'];
                              
                          ?>
                          
            
            <div class="d-flex justify-content-between align-items-center  py-0 mb-0">
            <p class="text-success text-xl">
            <i class="ion ion-ios-refresh-empty"></i>
            </p>
            <p class="d-flex flex-column text-right">
            <span class="font-weight-bold">
            <?php echo $site;?>
            </span>
            <span class="text-muted">Vaccination Site</span>
            </p>
            </div>
            <?php }?></div>

            </div>    
          </div>
</div>
        <!--  <div class="html2pdf__page-break"></div>-->
          
     
         
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