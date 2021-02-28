<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $msgid = $_GET['id'];
  $Msg = New Msg();
  $singleMSG = $Msg->singleMsg($msgid);

?> 
 <form class="form-horizontal span4" action="controller.php?action=edit" method="POST">
          <fieldset>
            <legend>Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                 <input id="msgid" name="msgid" type="hidden"  class="form-control" value="<?php echo $singleMSG->MSGID; ?>">
                <input id="name" name="name" type="text"  class="form-control" value="<?php echo $singleMSG->SENDERNAME; ?>">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" value="<?php echo $singleMSG->SENDEREMAIL; ?>" class="form-control">
              </div>
            </div>

            <!-- sUBJECT input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="subject">Subject</label>
              <div class="col-md-9">
                <input id="subject" name="subject" type="text" value="<?php echo $singleMSG->SENDERSUBJ; ?>" class="form-control">
              </div>
            </div>
    
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"><?php echo $singleMSG->SENDERMSG; ?></textarea>
              </div>
            </div>
    <?php  
    if ($singleMSG->MSGSTATS =='UNREAD') {
      echo ' <div class="form-group">
              <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Mark it as Read</button>
              </div>
            </div>';
    }else{
      echo ' <div class="form-group">
              <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg" disabled="disabled">Mark it as Read</button>
              </div>
            </div>';
    }


    ?>
          
           
          </fieldset>


        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
  