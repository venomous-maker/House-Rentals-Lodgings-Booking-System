<body>
	<?php include 'includes/navigation.php';?>

	<div id="page-wrapper">
            <div class="container-fluid">
            	<!-- Page heading -->
            	<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                   	    RENTALS
                            </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-Home"></i>  <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> LIST
                            </li>
                        </ol>
                    </div>
                </div>

			               <!-- Form for adding meals -->
            	<div class="modal fade" role="dialog" id="foodadd">
            		<div class="modal-dialog">
            			<div class="modal-content">
            				<div class="modal-header">
								<h4 class="modal-title"><strong>ADD NEW HOUSE</strong></h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
						<form action="#" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							<label for="mealadd">House name:</label>
							<input type="text" class="form-control" name="foodname">
							<label for="mealadd">House floor:</label>
								<select name="foodtype">
									<option value="ground floor">Ground Floor</option>
									<option value="first floor">First Floor</option>
									<option value="second floor">Second Floor</option>
									<option value="third floor">Third Floor</option>
									<option value="forth floor">Forth Floor</option>
									<option value="fifth floor">Fifth Floor</option>
								</select>
							
							<!--<input type="text" class="form-control" name="foodtype">--><br>
							<label for="mealadd">House price:</label>
							<input type="text" class="form-control" name="foodprice">
							<label for="mealadd">Image:</label>
							<input type="file" class="form-control" name="foodimage">
							<label for="mealadd">Description:</label><br>
							<textarea rows="5" columns="10" name="fooddesc"></textarea>
						</div>

					<div class="form-group modal-footer">
						<input class="btn btn-success" type="submit" name="submit" value="Submit">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
	<!-- Inserting data in the menu table -->
				<?php 
					if(!$connect){
						die("Databse connection failed!!");
					}else{
						if(isset($_POST['submit'])){
						$code = 'p'.strval(rand(10,1000));
						$name = $_POST['foodname'];
						$type = strtolower($_POST['foodtype']);
						$price =$_POST['foodprice'];
						$file_name = $_FILES['foodimage']['name'];
						$file_temp = $_FILES['foodimage']['tmp_name'];
						$folder = 'images/';
						$desc = $_POST['fooddesc'];

						move_uploaded_file($file_temp, $folder.$file_name);


						$sql = "INSERT INTO menu (NAME_OF_FOOD,CAT_OF_FOOD,PRICE,IMAGES,DESCRIPTION,FOOD_CODE) VALUES('$name','$type',$price,'$file_name','$desc','$code')";
						$result = mysqli_query($connect,$sql);

						if(!$result){
							die("Query Failed" . mysqli_error($connect));
						}
					}
				}
				?>

				<?php include 'includes/menu_table.php';?>

	</div>
</div>
		<!-- Footer -->
    <?php include 'includes/footer.php';?>
</body>
</html>
