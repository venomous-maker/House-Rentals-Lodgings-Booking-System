<?php
include_once 'includes/class.user.php'; 
$user=new User();


?>



<body>
  <?php include 'includes/navigation.php';?>

  <div id="page-wrapper">
            <div class="container-fluid">
              <!-- Page heading -->
              <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        ROOMS
                            </h1>
                        <ol class="breadcrumb">
                            <li>
                               <i class="fa fa-Home"></i>  <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> BOOKED ROOMS
                            </li>
                        </ol>
                    </div>
                </div>
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        } 
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }


    </style>
    
    
</head>
        
        
        
        <?php
        
        $sql="SELECT * FROM rooms WHERE book='true'";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    
                    echo "
                        <div class='row'>
                            <div class='col-md-2'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['room_cat']."</h4><hr>
                                <h6>Checkin: ".$row['checkin']." and checkout: ".$row['checkout']."</h6>
                                <h6>Name: ".$row['name']."</h6>
                                <h6>Phone: ".$row['phone']."</h6>
                                <h6>Amount: ".$row['amount']."</h6>
                                <h6>Booking Condition: ".$row['book']."</h6>
                            </div>
                            &nbsp;&nbsp;
                            <a href='edit_all_room.php?id=".$row['room_id']."'><button class='btn btn-primary button'>Edit</button></a><br/><br/>&nbsp;&nbsp
                            <a href='../Invoices/room.php?rid=".$row['room_id']."'><button class='btn btn-primary button'>Print</button></a>
                            </div>
                            
                         ";
                    
                    
                }
                
                
                          
            }
            else
            {
                echo "No Booked Room";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        
        
        
        
        ?>


    </div>
  </div>
  <?php include 'includes/footer.php';?>     
</body>
</html>