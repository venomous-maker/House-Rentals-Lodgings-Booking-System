
<body>  
<?php include 'includes/navigation.php';?> 
    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADMINISTRATORS
                            </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-Home"></i>  <a href="index.php">Home</a>
                          
                        </ol>
                    </div>
                </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ACTION 1</th>
                         <th>ACTION 2</th>
                                            
                         </tr>
                        </thead>
                         <tbody>
                                        
                    <?php
                        $csql = "select * from admin";
                        $cre = mysqli_query($connect,$csql);
                        while($crow=mysqli_fetch_array($cre) )
                        {   
                         $id = $crow['id'];
                        $usname = $crow['usname'];
                        $pass = $crow['pass'];

                         echo"<tr>
                          <td>{$id}</td>
                         <td>{$usname}</td>
                        <td>{$pass}</td>
                        <td><a href='profile.php?delete={$id}'<button class='btn btn-danger '> <i class='fa fa-edit' ></i> Delete</button></td>
                                                
                         <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'><i class='fa fa-file-text' ></i> Add Admin</button></td>
                                                </tr>";     
                                    
                         }
                         

                        ?>
                       <?php // Delete data from database
                            if(!$connect){
                                die("Database connection failed!!");
                            }else{
                                if (isset($_GET['delete'])) {
                                $id = $_GET['delete'];

                                $query = "DELETE FROM admin WHERE ID = {$id}";
                                $delete_query = mysqli_query($connect,$query);

                                //header("Location: profile.php");
                            }

                            }
                        ?> 
         <!-- modal form to add new adminstrator -->
                <!-- /.row -->
                       
               
</tbody>
</table>


                     <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title"><strong>  ADD NEW ADMINSTRATOR</strong></h3>
                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                              
                                        
                                        <div class="modal-body">
                                         <form action="#" method="post">
                                            <div class="form-group">
                                            <label>username</label>
                                            <input name="username" type="text"class="form-control" placeholder="Enter Username">
                                            <label>password</label>
                                            <input name="password" type="password" class="form-control" placeholder="Enter password">
                                            <label>confirm password</label>
                                            <input name="Receiver" type="password" class="form-control" placeholder="Re-type password">
                                            </div>
                                             <div class="modal-footer">
                                              <input class="btn btn-success" type="submit" name="submit" value="Submit">
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

            
                <?php 

               //Inserting data in the admin table
                    if(!$connect){
                        die("Databse connection failed!!");
                    }else{
                        if(isset($_POST['submit'])){
                        $usname = $_POST['username'];
                        $pass = $_POST['password'];

                        $passwd=password_hash($pass,PASSWORD_DEFAULT);
                        

                        $sql = "INSERT INTO admin (usname,pass)";
                        $sql .= "VALUES('$usname','$passwd')";
                        $result = mysqli_query($connect,$sql);

                        if(!$result){
                            die("Query Failed" . mysqli_error($connect));
                        }
                    }
                }
                ?>
  
  </div>  
</div> 
</div>
<?php include 'includes/footer.php';?>     
</body>
</html>
