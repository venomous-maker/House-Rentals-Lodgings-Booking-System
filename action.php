<?php 
	session_start();
	require 'admin/includes/db.php';
	require 'includes/cookies_gen.php';
	$sess_id = get_onload_cookie();

	if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pcode = $_POST['pcode'];
		$pqty = 1;
		
		$stmt = $connect->prepare("SELECT product_code FROM cart WHERE product_code=? AND sess_id = ?");
		$stmt->bind_param("ss",$pcode,$sess_id);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		
		$validator = mysqli_query($connect,"SELECT * FROM orders WHERE products LIKE '%$pname%' AND status = 'confirmed'");
		
		if ($validator->num_rows<1){
			
			if(!$r){
				$query = $connect->prepare("INSERT INTO cart(product_name,product_price,qty,total_price,product_code,sess_id) VALUES 	(?,?,?,?,?,?)");
				$query->bind_param("ssisss",$pname,$pprice,$pqty,$pprice,$pcode, $sess_id);
				$query->execute();
					echo '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>House added to your cart!</strong>
						</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>House already added to your cart!</strong>
						</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>House already booked!</strong>
				</div>';
		}
	}

	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
		$stmt  = $connect->prepare("SELECT * FROM cart WHERE sess_id = ?");
		$stmt->bind_param("s", $sess_id);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		echo $rows;
	}

	if (isset($_GET['remove'])){
		$id = $_GET['remove'];

		$stmt = $connect->prepare("DELETE FROM cart WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'House removed from the cart!';
		header('location:order-cart.php');
	}

	if(isset($_GET['clear'])){
		$stmt = $connect->prepare("DELETE FROM cart WHERE sess_id = ?");
		$stmt->bind_param('s', $sess_id);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All houses removed from the cart!';
		header('location:order-cart.php');
	}

	if (isset($_POST['qty'])) {
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];

		$tprice = $qty * $pprice;

		$stmt = $connect->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
		$stmt->bind_param('isi',$qty,$tprice,$pid);
		$stmt->execute();
	}

	if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$products = $_POST['products'];
		$total = $_POST['total'];
		$status = 'Not confirmed';
		$data = '';

		$stmt = $connect->prepare("INSERT INTO orders (firstname,lastname,email,contact,products,amount_paid,status) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('sssisss',$fname,$lname,$email,$phone,$products,$total,$status);
		$stmt->execute();

		$data .= '<div class="text-center">
						<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
						<h2 class="text-success">Your Booking Is Successful!</h2>
						<h2 class="text-danger">Admin Will Contact You For More Information!</h2>
						<h4 class="bg-info text-light rounded p-2">House(s) Booked : '.$products.'</h4>
						<h4>Your First Name: '.$fname.'</h4>
						<h4>Your Last Name: '.$lname.'</h4>
						<h4>Your Email: '.$email.'</h4>
						<h4>Your Phone Number: '.$phone.'</h4>
						<h4>Total Amount Paid: '.number_format($total,2).'</h4><br><br>
						<a href="Invoices/meal.php" class="btn btn-primary align-self-center mb-1" target="_blank">Generate Invoice</a>
						<a href="index.php" class="btn btn-success btn-block">Back To Home</a>
					</div>';

		echo $data;

		$stmt = $connect->prepare("DELETE FROM cart");
		$stmt->execute();
	}
?>
