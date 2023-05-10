
<?php
$con  = mysqli_connect("localhost","root","","barangaysystem");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM census";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $year[]  = $row['year']  ;
            $population[] = $row['population'];
        }
 
 
 }
 
 
?><script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 <script>
  // html2pdf js for printing report
    var button = document.getElementById("button1");
    var makepdf = document.getElementById("makepdf1");
    
    var opt = {
      margin:       [4,4],
      filename:     'myfile.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
      jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
      pagebreak: {
 // mode: ['avoid-all', 'css', 'legacy']
}
    };

    button.addEventListener("click", function () {
      html2pdf().from(makepdf).set(opt).toPdf().get('pdf').then(function (pdf) {
        var totalPages = pdf.internal.getNumberOfPages(); 
        console.log("getHeight:" + pdf.internal.pageSize.getHeight());
        console.log("getWidth:" + pdf.internal.pageSize.getWidth());
        for (var i = 1; i <= totalPages; i++) {
          pdf.setPage(i);
          pdf.setFontSize(10);
          pdf.setTextColor(150);
          pdf.text("Barangay Culiat - Resident Report", 16, 8);
          pdf.text("<?php echo "Date: " . date("Y/m/d") ;?>", pdf.internal.pageSize.getWidth()-32,8);
          pdf.addImage("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBkjv5SmWMbXDry4p-t7EAcC8kWKt-tHlDRiQqPn3dmA&s", "PNG", 5, 5, 5, 5);
          pdf.text('Page ' + i + ' of ' + totalPages, pdf.internal.pageSize.getWidth()/2, 
          pdf.internal.pageSize.getHeight()-4);
        } 
      }).save();
            
    });
    // end html2pdf js for printing report
    // dropdown js
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
</script>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<!--Purok Bar Graph -->
<script type="text/javascript">
      var ctx = document.getElementById("purok").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:[1,2,3,4,5,6],
                        datasets: [{
                            backgroundColor: 
                               "#f39c12",
                            label: 'Female',
                            data:[<?php
                        $sql = "SELECT * from residents where puroknumber =1 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>, <?php
                        $sql = "SELECT * from residents where puroknumber =2 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =3 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =4 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =5 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =6 and gender='Female'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?> ],
                        },{
                            backgroundColor: 
                               "#00a65a",
                            label: 'Male',
                            data:[<?php
                        $sql = "SELECT * from residents where puroknumber =1 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>, <?php
                        $sql = "SELECT * from residents where puroknumber =2 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =3 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =4 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =5 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?>,<?php
                        $sql = "SELECT * from residents where puroknumber =6 and gender='Male'";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?> ],
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Residents"
                            },
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                        
                    },
 
 
                }
                });
</script>




<!--Census Bar Graph -->
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($year); ?>,
                        datasets: [{
                            backgroundColor: 
                               "#601DCF",
                            label: 'residents',
                            data:<?php echo json_encode($population); ?>,
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Census"
                            },
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                        
                    },
 
 
                }
                });
</script>

<!--Age Pie Graph -->

<script>
        var xValues = [ 'Young', 'Adult', 'Senior'];
        var yValues = [ <?php
                            $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)<18";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>, <?php
                            $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)>=18 and (DATEDIFF(SYSDATE(), dob)/365)<=59 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                        ?>  , <?php
                        $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)>=60";
                        $query = $conn->query($sql);

                        echo $query->num_rows;
                        ?>    ];
        var barColors = [
            '#00a65a', '#f39c12','#611DD1' 
        ];

        new Chart("agechart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Age Demography"
            }
        }
        });
</script>


<!--Resident  Doughnut Graph -->

<script>
        var xValues = [ 'Registered', 'Non-Registered'];
        var yValues = [ <?php
                        $sql = "SELECT * from residents";
                        $query = $conn->query($sql);
                        $user= $query->num_rows;
                        echo $user;
                        ?> ,<?php
                        $sql = "SELECT population from census ORDER BY id DESC LIMIT 1";
                        $result = $conn->query($sql);
                        $data =  $result->fetch_assoc();
                        echo $data['population']-$user;
                        ?>  ];
        var barColors = [
            '#00a65a', '#611DD1', '#f39c12' 
        ];

        new Chart("residentchart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "User vs Residents"
            }
        }
        });
</script>


<!--Age line Graph -->
<script>
var xValues = ['young','adult','senior'];

new Chart("pwdchart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
        label:'pwd',
      data: [<?php
                            $sql = "SELECT * from hmf where pwd=1 and age<18 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>, <?php
                            $sql = "SELECT * from hmf where pwd=1 and age>18 and age < 60 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>,<?php
                            $sql = "SELECT * from hmf where pwd=1 and age> 60 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>],
      borderColor: "#00a65a",
      fill: false
    }, { 
        label:'pregnancy',
      data: [<?php
                            $sql = "SELECT * from hmf where pregnancies=1 and age<18 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>, <?php
                            $sql = "SELECT * from hmf where pregnancies=1 and age>18 and age < 60 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>,<?php
                            $sql = "SELECT * from hmf where pregnancies=1 and age> 60 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>],
      borderColor: "#F39C12",
      fill: false
    }, { 
        label:'resident',
      data: [<?php
                            $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)<18";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>, <?php
                            $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)>=18 and (DATEDIFF(SYSDATE(), dob)/365)<=59 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                        ?>  , <?php
                        $sql = "SELECT SYSDATE(),dob,DATEDIFF(SYSDATE(),dob)/365 AS AGE from residents WHERE(DATEDIFF(SYSDATE(), dob)/365)>=60";
                        $query = $conn->query($sql);

                        echo $query->num_rows;
                        ?>  ],
      borderColor: "#f6e7cf",
      fill: false
    }]
  },
  options: {
    legend: {display: true}
  }
});
</script>

<!--Disease Pie Graph -->

<script>
        var xValues = [ 'Asthma', 'Cancer', 'Diabetes','Hypertension','Epilepsy'];
        var yValues = [ <?php
                            $sql = "SELECT * from hmf where asthma=1 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>,
                            <?php
                            $sql = "SELECT * from hmf where cancer=1 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?> ,
                            <?php
                            $sql = "SELECT * from hmf where diabetes=1 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?> ,
                            <?php
                            $sql = "SELECT * from hmf where hypertension=1 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>,
                            <?php
                            $sql = "SELECT * from hmf where epilepsy=1 ";
                            $query = $conn->query($sql);

                            echo $query->num_rows;
                            ?>  ];
        var barColors = [
            '#00a65a', '#f39c12','#611DD1' ,'#dbd0ec','#f6e7cf'
        ];

        new Chart("diseaseChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Health Summary"
            }
        }
        });
</script>

<!--Transaction Line Graph -->
<script>
    <?php
            $key = date("Y");
            $sql = " SELECT DISTINCT(Year(di)) as year1 FROM bmss;";
            $query = $conn->query($sql);
            
            while($row = $query->fetch_assoc()){
                $year1 = $row['year1'];
                ?>
             //<li><a  href="#"><input type="submit" class="dropdown-item" name="<?php echo $row['year1'];?>" value="<?php echo $year1;?>"></a></li>-->
                
            <?php  } 
            
            foreach ($_POST as $key ) {
        
            // echo $key;
            
        }
            
            //print_r($_POST);?>
        anychart.onDocumentReady(function () {

        // create a data set on our data
        var dataSet = anychart.data.set(getData());

        // map data for the first series,
        // take x from the zero column and value from the first column
        var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

        // map data for the second series,
        // take x from the zero column and value from the second column
        var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

        // map data for the third series,
        // take x from the zero column and value from the third column 
        var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });

        // map data for the fourth series,
        // take x from the zero column and value from the fourth column
        var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });

        // create a line chart
        var chart = anychart.line();

        // turn on the line chart animation
        chart.animation(true);

        // configure the chart title text settings
        chart.title(' Revenue Report');

        // set the y axis title
        chart.yAxis().title('Revenue Rate');

        // turn on the crosshair
        chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        // create the first series with the mapped data
        var firstSeries = chart.line(firstSeriesData);
        firstSeries
          .name('Barangay Certificate')
          .stroke('2 #611dd1')
          .tooltip()
          .format("Barangay Certificate : P{%value}");

        // create the second series with the mapped data
        var secondSeries = chart.line(secondSeriesData);
        secondSeries
          .name('Certificate of Indigency')
          .stroke('1 #F39C12')
          .tooltip()
          .format("Certificate of Indigency : P{%value}");

        // create the third series with the mapped data
        var thirdSeries = chart.line(thirdSeriesData);
        thirdSeries
          .name('Certificate of Residency')
          .stroke('1 #00A65A')
          .tooltip()
          .format("Certificate of Residency : P{%value}");

        // turn the legend on
        chart.legend().enabled(true);

        // set the container id for the line chart
        chart.container('container');

        // draw the line chart
        chart.draw();

        });

        function getData() {
        return [
        ['Jan',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 1  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 1 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 1 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                        
        ?>],
        ['Feb',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 2  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 2 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 2 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],
        ['Mar',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 3  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 3 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 3 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Apr',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 4  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 4 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 4 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['May',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 5  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 5 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 5 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Jun',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 6  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 6 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 6 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Jul',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 7  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 7 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 7 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
          ['Aug',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 8  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 8 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 8 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Sep',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 9  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 9 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 9 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
          ['Oct',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 10  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 10 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 10 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Nov',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 11  and  YEAR(di)= $key  and  purpose='Baranggay Certificate' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 11 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 11 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        ['Dec',<?php
                          
                          
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 12  and  YEAR(di)= $key  and  purpose='Barangay Clearance' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 12 and  YEAR(di)=$key  and  purpose='Certificate of Indigency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                            
                          ?>,<?php
                          $sql = "SELECT SUM(total) AS total from bmss   WHERE MONTH(di) = 12 and  YEAR(di)= $key and  purpose='Certificate of Residency' ";
                          $result = $conn->query($sql);
                          $data =  $result->fetch_assoc();
                          echo $data['total'];
                          
          ?>],  
        
        
        ];
        }
</script>
