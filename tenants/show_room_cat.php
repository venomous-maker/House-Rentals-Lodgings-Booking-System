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
                                <i class="fa fa-file"></i> ROOMS
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
        
        
        
        <?php
        
        $sql="SELECT * FROM room_category";
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
                                <h4>".$row['roomname']."</h4><hr>
                                <h6>No of Beds: ".$row['no_bed']." ".$row['bedtype']." bed.</h6>
                                <h6>Facilities: ".$row['facility']."</h6>
                                <h6>Price: ".$row['price']." sh per/night.</h6>
                            </div>
                            &nbsp;&nbsp;
                            <a href='edit_room_cat.php?roomname=".$row['roomname']."'><button class='btn btn-primary button'>Edit</button></a>
                            </div>
                            
                        
                    
                         ";
                }             
            }
            else
            {
                echo "No Room Added";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        ?>
    </div>
    <?php include 'includes/footer.php';?>     
</body>
</html>