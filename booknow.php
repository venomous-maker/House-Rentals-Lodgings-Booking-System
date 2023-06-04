<?php
include_once 'admin/includes/class.user.php';
include_once 'admin/includes/db.php';
$user = new User();

$roomname = $_GET['roomname'];

$sql = "SELECT * FROM rooms WHERE room_cat='$roomname'";
$query = mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $result = $user->booknow($checkin, $checkout, $name, $phone, $roomname, $amount, $days);
    if ($result) {
        echo "<script type='text/javascript'>
                  alert('" . $result . "');
             </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEKU GUEST HOUSE | ROOMS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/rooms style.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
</head>

<script>
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>


</head>

<body>
    <div class="container bg-white">
        <header>
            <div class="text-center " mr-5>
                <img src="images\Sekulogo.png" height=100px />
                <div class="text-success py-3">
                    <h2 class="h1 heading-4">SEKU GUEST HOUSE</h2>
                </div class="bg-primary">
            </div>
        </header>
        <!-- navigation-standard menu -->
        <div class="">
            <nav class="navbar navbar-expand-lg navbar-dark badge-success">
                <a class="navbar-brand" href="#">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-google-plus-g"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="mynav">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">HOME</a>
                        <a class="nav-item nav-link" href="about.php">ABOUT US</a>
                        <a class="nav-item nav-link" href="rentals.php">MEALS</a>
                        <a class="nav-item nav-link active" href="Rooms.php">ROOMS <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="contacts.php">CONTACTS</a>
                        <a class="nav-item nav-link" href="admin/adminlog.php">ADMIN</a>
                    </div>
                </div>
            </nav>
            <div class="well">
                <h2>Book Now: <?php echo $row['room_cat']; ?> </h2>
                <hr>
                <form action="" method="post" name="room_category">
                    <div class="form-group">
                        <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                        <input type="date" id="checkin" class="datepicker" name="checkin">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check Out:</label>&nbsp;
                        <input type="date" id="checkout" class="datepicker" onChange="gettotal1()" name="checkout">
                    </div>
                    <div class="form-group">
                        <input id="days" type="hidden" name="days" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="days">Price per room:</label>&nbsp;
                        <input id="a1" value="<?php echo $row['roomprice']; ?> " readonly="">
                    </div>
                    <div class="form-group">
                        <label for="amount">Total Amount:</label>&nbsp;
                        <input type="price" name="amount" id="total1" readonly="" />
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Your Full Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="victor oduor" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Enter Your Phone Number:</label>
                        <input type="phone" class="form-control" name="phone" placeholder="0790942014" required>
                    </div>


                    <button type="submit" class="btn btn-lg btn-success button" name="submit">Book Now</button>

                    <br>
                    <div id="click_here">
                        <a href="index.php">Back to Home</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script language="javascript" type="text/javascript">
            function gettotal1() {
                var date1 = new Date(document.getElementById('checkin').value);
                var date2 = new Date(document.getElementById('checkout').value);
                var diff = Math.abs(date2.getTime() - date1.getTime());
                var days = Math.ceil(diff / (1000 * 3600 * 24));
                document.getElementById('days').value = days;

                var gender1 = document.getElementById('a1').value;
                var gender3 = parseFloat(gender1) * parseFloat(days);

                document.getElementById('total1').value = gender3;

            }
        </script>


</body>

</html>