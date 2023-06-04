<?php
include_once 'includes/class.user.php'; 
$user=new User(); 
 

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $result=$user->add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price);
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('Room Added Succesfully');
         </script>";
    }
    else
    {
         echo $result;
    }
   
} 
?>

<body>
  <?php include 'includes/navigation.php';?>

  <div id="page-wrapper">
            <div class="container-fluid">
              <!-- Page heading -->
              <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        LODGINGS
                            </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-Home"></i>  <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> ADD LODGINGS
                            </li>
                        </ol>
                    </div>
                </div>
            <h2>Add Lodging Category</h2>
            <hr>
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="roomname">Lodging Type Name:</label>
                    <select name="roomname">
                      <option value="ONE BEDROOMED WITH A BALCONY">ONE BEDROOMED WITH A BALCONY</option>
                      <option value="ONE BEDROOMED WITHOUT BALCONY">ONE BEDROOMED WITHOUT BALCONY</option>
                      <option value="BED SITTERS WITH BALCONY">BED SITTERS WITH BALCONY</option>
                      <option value="BED SITTER WITHOUT BALCONY">BED SITTER WITHOUT BALCONY</option>
                    </select>
                    <!--<input type="text" class="form-control" name="roomname" placeholder="Executive Room" required>-->
                </div>
                 <div class="form-group">
                    <label for="qty">No of Lodgings:</label>&nbsp;
                    <select name="room_qnty">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bed">No of Bed:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="no_bed">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bedtype">Bed Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <select name="bedtype">
                    <option value="none">none</option>
                      <option value="single">single</option>
                      <option value="double">double</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Facility">Facility</label>
                    <textarea class="form-control" rows="5" name="facility"></textarea>
                </div>
               <div class="form-group">
                    <label for="price">Price Per Night:</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Room">Add</button>

               <br>

            </form>
        </div>
    </div>
    <?php include 'includes/footer.php';?>     
</body>
</html>
