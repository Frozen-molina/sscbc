<?php  
      if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}
    $BOOKID = $_GET['id'];
    $book = New Books();
    $singlebook = $book->single_book($BOOKID);

   
 //    $category = New Category();
 //   $singlecategory = $category->single_category($singlemeal->CATEGORYID);
  ?>
<div class="container">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-6">
            <h1><strong>Capstone Details</strong></h1><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information" border="0">
                <tbody>
               
                    <tr>    
                        <td>
                            <strong>
                                   Title                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->TITLE; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Author                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->AUTHOR; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Course                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->COURSE; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Members                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->MEMBERS; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Adviser                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->ADVISER; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Grammarian                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->GRAMMARIAN; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Abstract                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                       <!--  <textarea class="form-control input-sm" id="Abstract" name="Abstract" placeholder=
                            "Abstract" rows="10">
                         --><p>
                            <?php echo ': '.$singlebook->ABSTRACT; ?>    </p>
                          <!--  </textarea>      -->
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Publised Year                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                           <?php echo ': '.$singlebook->PUBYEAR; ?>
                            
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Uploaded By                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->UPLOADEDBY; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                   Date Uploaded                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlebook->DATEUPLOADED; ?>     
                        </td>
                    </tr>
                    

                    
                                 
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
            

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                              <input name="MAX_FILE_SIZE" type=
                              "hidden" value="1000000"> <input id=
                              "photo" name="photo" type=
                              "file">
                            </div>

                            <div class="col-md-4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type=
                    "button">Close</button> <button class="btn btn-primary"
                    name="savephoto" type="submit">Upload Photo</button>
                  </div>
                </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

 