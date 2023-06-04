<body>
    <!-- Navigation -->
    <?php include 'includes/navigation.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            <img src="images/Sekulogo.png" height=70>
                            <h4>WELCOME <strong><?php echo strtoupper($_SESSION['usname'])?></strong> TO THE ADMIN PANEL</h4>
                            </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Home</a>
                            </li>
                           
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bed fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
                        $query="SELECT * FROM rooms WHERE book='true'";
                        $select_booked= mysqli_query($connect,$query);
                        $book_counts= mysqli_num_rows($select_booked);
                                echo"<div class='huge'>{$book_counts}</div>"
                        
                        ?>
                        <div>Lodging Bookings</div>
                    </div>
                </div>
            </div>
            <a href="adminrooms.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-fw fa-home fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query="SELECT*FROM orders";
                        $select_all_orders= mysqli_query($connect,$query);
                        $order_counts= mysqli_num_rows($select_all_orders);
                                echo"<div class='huge'>{$order_counts}</div>"
                        
                        ?>
                      <div>Renting Houses</div>
                    </div>
                </div>
            </div>
            <a href="orders.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-fw fa-phone fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        
                      <?php
                        $query="SELECT*FROM contact";
                        $select_all_contacts= mysqli_query($connect,$query);
                        $contact_counts= mysqli_num_rows($select_all_contacts);
                                echo"<div class='huge'>{$contact_counts}</div>"
                        
                        ?>
                        <div> Contacts</div>
                    </div>
                </div>
            </div>
            <a href="admincontacts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div> 
            </a>
        </div>
    </div>

                <!-- /.row -->
            <div class="row">
                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php

            $element_text=["Lodgings","Rentings","Contacts"];
            $element_count=[$book_counts,$order_counts,$contact_counts];

            for($i=0; $i<3; $i++){
                echo"['{$element_text[$i]}'".","."{$element_count[$i]}],";
            }



          ?>
         
        ]);

        var options = {
          chart: {
            title: 'ELLINS HOSTEL AND ACCOMMODATION OVERALL PERFORMANCE',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

            </div>
            <!-- /.container-fluid -->
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>

    </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
</body>

    <!-- Footer -->
    <?php include 'includes/footer.php';?>
  
