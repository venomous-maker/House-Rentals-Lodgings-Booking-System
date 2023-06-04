<?php
    include "db.php";

        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli('localhost','root','*123*VYBZ','orange_house');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }
            
            
            
            public function add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO rooms SET room_cat='$roomname', roomprice='$price', book='false'";
                        mysqli_query($this->db,$sql2);
                        
                    }
                
                    return $result;
                

            }
            
            public function check_available($checkin, $checkout)
            {
                
                
                   $sql="SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id
   FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin') )";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Query Doesnt run");;

                
                    return $check;
                

            }
            
            
            
            
            public function booknow($checkin, $checkout, $name, $phone,$roomname,$amount,$days)
            {
                    
                    $sql="SELECT * FROM rooms WHERE room_cat='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id FROM rooms WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
                        
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout',days='$days', name='$name', phone='$phone', amount='$amount', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="You have booked one room!!.....Please print the receipt";
                        }
                        header("location:../SEKU/Invoices/room.php?rid=".$row['room_id']." ");
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                
                    return $result;
                

            }
            
            
            
            
             public function edit_all_room($checkin, $checkout, $amount, $name, $phone,$id)
            {
                                
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', amount='$amount', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Update Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    
                
                    return $result;
                

            }
            
            
            
            
            
             public function edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat)
            {
                    
                 
                        $sql2="DELETE FROM rooms WHERE room_cat='$room_cat'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$room_qnty;$i++)
                        {
                            $sql3="INSERT INTO rooms SET room_cat='$roomname',roomprice='$price', book='false'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available=$room_qnty;
                        $booked=0;
                 
                        $sql="UPDATE room_category  SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE roomname='$room_cat' ";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
  
                    
                
                    return $result;
                

            }
            
        }

?>
