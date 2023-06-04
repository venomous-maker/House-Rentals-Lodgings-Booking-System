<?php
      
      if(isset($_Post['send'])){
            $from= $_post['Sender'];
            $to= $_post['Receiver'];
            $subject=wordwrap($_post['subject'],70);
            $body=$_post['Response'];

            mail($from,$header,$subject,$body);    
      }
      ?>  
<!DOCTYPE html>
<Html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
    
    </head>

<body>
    
            
                            <div class="modal" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                            <h3 class="modal-title"><strong>Compose Message</strong></h3>
                                             
										
                                        <div class="modal-body">
                                            <form action="#" method="post">
                                            <div class="form-group">
                                            <label>Sender</label>
                                            <input name="sender" class="form-control" placeholder="Enter sender's email">
											</div>
        
                                            <div class="form-group">
                                            <label>Receiver</label>
                                            <input name="Receiver" class="form-control" placeholder="Enter Receiver's email">
											</div>
            
                                            <div class="form-group">
                                            <label>Subject</label>
                                            <input name="subject" class="form-control" placeholder="Enter Subject">
                                            </div>
                                                
										<div class="form-group">
										  <label for="comment">Response</label>
										  <textarea name="news" class="form-control" rows="5" id="comment" name="Response"></textarea>
                                        </div>
                    
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" >Send</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
  
    
    </body>
</Html>
                    