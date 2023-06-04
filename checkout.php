<?php
include_once 'admin/includes/db.php';

$total = 0;
$allItems = '';
$items = array();

$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(", ", $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ELLINS HOSTEL AND ACCOMMODATION | RENTALS</title>
    <link rel="stylesheet" type="text/css" href="css\bootstrap.css" />
    <link rel="stylesheet" type="text/javascript" href="js\bootstrap.js" />
    <link rel="stylesheet" href="css/signup.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<body>
    <!-- header content -->
    <div class="container bg-white">
        <header>
            <div class="text-center " mr-5>

                <img src="images\Sekulogo.png" height=100px />
                <div class="text-success py-3">
                    <h2 class="h1 heading-4">ELLINS HOSTEL AND ACCOMMODATION</h2>
                </div>
            </div>

        </header>
        <!-- navigation-standard menu -->
        <div class="">

            <!-- - navigation-standard menu -- -->
            <nav class="navbar navbar-expand-lg navbar-dark badge-success">
                <a class="navbar-brand" href="#">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-google-plus-g"></i>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="nav">
                    <div class="navbar-nav pr-lg">
                        <a class="nav-item nav-link" href="index.php">HOME</a>
                        <a class="nav-item nav-link" href="about.php">ABOUT US</a>
                        <a class="nav-item nav-link active" href="rentals.php">RENTALS</a>
                        <a class="nav-item nav-link" href="Rooms.php">LODGINGS</a>
                        <a class="nav-item nav-link" href="contacts.php">CONTACTS</a>
                        <a class="nav-item nav-link" href="admin/adminlog.php">ADMIN</a>
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 px-4 pb-4" id="order">
                        <h4 class="text-center text-success p-2">Complete your booking!</h4>
                        <div class="jumbotron p-3 mb-2 text-center">
                            <h6 class="lead"><b>House(s) : </b><?= $allItems; ?></h6>
                            <h5><b>Total Amount Payable : </b>Ksh. <?= number_format($total, 2) ?></h5>
                        </div>
                        <form action="" method="post" id="placeOrder">
                            <input type="hidden" name="products" value="<?= $allItems; ?>">
                            <input type="hidden" name="total" value="<?= $total; ?>">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Book" class="btn btn-success btn-block" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <script type="text/javascript" src="js/checkout_ajax.js"></script>
</body>

</html>