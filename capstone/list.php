<?php
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Capstone Projects and Thesis Titles  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th>Title</th>
				  		<th>Author</th>
				  		<th>Abstract</th>  
				  		<th>Published Yr.</th>  
				  		<th>Upload By:</th> 
				  		<th>Action</th> 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		
						$query = "SELECT * FROM `tblbooks`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();


				  		foreach ($cur as $result) { 
				 		echo '<tr>';
				  		echo '<td>'.$result->TITLE.'</a></td>';
				  		echo '<td>'. $result->AUTHOR.'</td>'; 
				  		echo '<td>'. $result->ABSTRACT.'</td>'; 
				  		 echo '<td>'. $result->PUBYEAR.'</td>';
						echo '<td>'. $result->UPLOADEDBY.'</td>';  

	  	 	if ($_SESSION['ADMIN_ROLE']=='Administrator') {
	  	 	echo '<td align="center" width="100px"> <a title="View" href="index.php?view=view&id='.$result->BOOKID.'" class="btn btn-info btn-xs  ">  <span class="fa  fa-info fw-fa "></a>
	  	 	     <a title="Edit" href="index.php?view=edit&id='.$result->BOOKID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
	  	 	     <a title="Delete" href="controller.php?action=delete&id='.$result->BOOKID.'" class="btn btn-danger btn-xs  " >  <span class="fa  fa-trash-o fw-fa "></a></td>';
  	 	    } elseif ($_SESSION['ADMIN_ROLE']=='Student') {
			echo '<td align="center" width="100px"> 
					<a title="View" href="index.php?view=view&id='.$result->BOOKID.'" class="btn btn-info btn-xs  " >  <span class="fa  fa-info fw-fa "></a>
				  	<a title="Edit" href="index.php?view=edit&id='.$result->BOOKID.'" class="btn btn-primary btn-xs  " disabled="disable">  <span class="fa fa-edit fw-fa"></a>
	  	 	     	<a title="Delete" href="controller.php?action=delete&id='.$result->BOOKID.'" class="btn btn-danger btn-xs  " disabled="disable" >  <span class="fa  fa-trash-o fw-fa "></a></td>';

  	 	     	
  	 	     }
				  		   
				  	} 
					?>
				  </tbody>
					
				 	
				</table>

				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div> -->
				</div>
				</form>
 
					 <div class="modal fade" id="menuModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/capstone/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="photo" name="photo" type="file">
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
                            </div><!-- /.modal-content
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal --> -->

                