<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA compatible" content="i.e=edge">
        <title>ELLINS HOSTEL AND ACCOMMODATION | RENTALS</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  
    </head>
        <!-- header content -->
        <div class="container bg-white">
                  <div class="text-center " mr-5>
                      
              <img src="images\Sekulogo.png" height=100px/>
                      <div class="text-success py-3">
               <h2 class="h1 heading-4">ELLINS HOSTEL AND ACCOMMODATION</h2>
                          </div class="bg-primary">
                      </div>
    <body>
      <section>
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else { echo 'none'; } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?></strong>
          </div>
        <h3 class="text-center">BOOKING DETAILS</h3>
      	<div class="table-responsive" id="order_table">
              <table class="table table-bordered">
                <tr>
                  <th width="20%">NAME OF ROOM</th>
                  <th width="10%">QUANTITY</th>
                  <th width="5%">PRICE</th>
                  <th width="5%">TOTAL</th>
                  <th width="2%"><a href="action.php?clear=all" style="text-decoration: none;color:#fff;" class="btn btn-danger" onclick="return confirm('Are you sure you want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a></th>
                </tr>
      <?php
          include_once 'admin/includes/db.php';
          $stmt = $connect->prepare("SELECT * FROM cart");
          $stmt->execute();
          $result = $stmt->get_result();
          $total = 0;
         	while($row = $result->fetch_assoc()):
            ?>
         		<tr>
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
        	 		<td><?php echo $row["product_name"]; ?></td>
        	 		<td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>"></td>
        	 		<td>Ksh. <?php echo $row["product_price"]; ?></td>
              <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
        	 		<td>Ksh. <?php echo number_format($row["qty"] * $row["product_price"], 2); ?></td>
        	 		<td align="center">
                <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger px-5 lead" onclick="return confirm('Are you sure you want to remove this item?');"><i class="fas fa-trash-alt"></i></a>  
              </td>
        	 	</tr>

            <?php 
         		   $total = $total + ($row["qty"] * $row["product_price"]);
         	endwhile;
          ?>
         		<tr>
                    <td align="center"><a href="meals.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue booking</a></td>
                    <td colspan="2" align="center"><strong>Total</strong></td>
                    <td align="left"><strong>Ksh. <?php echo number_format($total, 2); ?></strong></td>
                     <td align="center"><a href="checkout.php" class="btn btn-info mx-2 <?= ($total > 1) ?"":"disabled" ?>"<i class="far fa-credit-card"></i>&nbsp;&nbsp;Book</a></td>
                </tr>
         </table>
       </div>
      </section>
    </div>
 <script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <script type="text/javascript" src="js/update_cart_ajax.js"></script>
</body>
</html>

