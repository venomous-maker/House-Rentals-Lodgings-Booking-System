
<?php include '../admin/includes/db.php';?> 
<?php include 'includes/Message.php';?>
<body>
    <!-- Navigation -->
    <?php include 'includes/navigation.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            CONTACTS
                            <small></small>
                            </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               
                                    
                                        <div class="panel-body">
                                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>FULL NAME</th>
                                            <th>EMAIL</th>
                                            <th>MESSAGES</th>
											<th>CHECK DATE</th>
                                            <th>STATUS</th>
                                            <th>ACTION 1</th>
                                             <th>ACTION 2</th>
                                            <th>ACTION 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$csql = "select * from contact";
									$cre = mysqli_query($connect,$csql);
									while($crow=mysqli_fetch_array($cre) )
									{	
										$id = $crow['id'];
                                        $name = $crow['fullname'];
                                        $email = $crow['email'];
                                        $message = $crow['message'];
                                        $cdate = $crow['cdate'];
                                        $confirm = $crow['confirm'];
                                        
											echo"<tr>
												<td>{$id}</td>
												<td>{$name}</td>
												<td>{$email}</td>
                                                <td>{$message}</td>
												<td>{$cdate}</td>
												<td>{$confirm}</td>
                                                <td><a href='admincontacts.php?Read={$id}' <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Mark as Read</button></td>
                                                
                                                <td><a href='admincontacts.php?delete={$id}'<button class='btn btn-danger '> <i class='fa fa-edit' ></i> Delete</button></td>
                                                <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'><i class='fa fa-file-text' ></i> Response</button></td>
                                                
												</tr>";
										
									
									}
									?>
                         <?php // Delete data from database
							if(!$connect){
								die("Database connection failed!!");
							}else{
								if (isset($_GET['delete'])) {
								$id = $_GET['delete'];

								$query = "DELETE FROM contact WHERE ID = {$id}";
								$delete_query = mysqli_query($connect,$query);

							}

							}
						?>
                               <?php // update data in database
							
								if (isset($_GET['Read'])) {
								$id = $_GET['Read'];

								$query = "UPDATE contact SET confirm='Read'WHERE id=$id";
								$update_contact_query = mysqli_query($connect,$query);

							}

				
                             ?>           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                                        
                    </div>
                </div>
            </div>
    <?php include 'includes/footer.php';?>
