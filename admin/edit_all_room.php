<?php
    include_once 'includes/class.user.php'; 
    $user=new User(); 

$id=$_GET['id'];

$sql="SELECT * FROM rooms WHERE room_id='$id'";
$query=mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);
 

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $result=$user->edit_all_room($checkin, $checkout, $amount, $name, $phone, $id);
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('".$result."');
         </script>";
    }

   
} 
?>


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
                                <i class="fa fa-file"></i> MENU
                            </li>
                        </ol>
                    </div>
                </div>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>  
      <div class="well">
            <h2>Edit <?php echo  $row['room_cat']?></h2>
            <hr>
            <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" class="datepicker" name="checkin" value="<?php echo $row['checkin']?>">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="date" class="datepicker" name="checkout" onChange="gettotal1()" value="<?php echo $row['checkout']?>">
                </div>
                <div class="form-group">
                    <label for="checkout">Price per room:</label>&nbsp;
                     <input id="a1" value="<?php echo $row['roomprice']?>" readonly="" >
                </div>
                <div class="form-group">
                    <label for="amount">Total Amount:</label>&nbsp;
                    <input type="price" name="amount" id="total1" value="<?php echo $row['amount']?>" readonly="" />
                </div>
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="Number" class="form-control" name="phone" value="<?php echo $row['phone']?>" required>
                </div>
                 
               
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Update</button>

               <br>
                <div id="click_here">
                    <a href="index.php">Back to Admin Panel</a>
                </div>


            </form>
        </div>
        
        



    </div>
    
   <script language="javascript" type="text/javascript">
       
        function gettotal1(){
            var date1 = new Date(document.getElementById('checkin').value);
            var date2 = new Date(document.getElementById('checkout').value);
            var diff = Math.abs(date2.getTime() - date1.getTime());
            var days = Math.ceil(diff / (1000*3600*24));

            var gender1=document.getElementById('a1').value;
            var gender3=parseFloat(gender1)* parseFloat(days);
                    
              document.getElementById('total1').value=gender3;
    
        }
    </script>

    <script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                         
</body>
</html>