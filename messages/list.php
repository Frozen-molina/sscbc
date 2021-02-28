<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Messages  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>No.</th> -->
				  		<th width="15%">Sender</th>
				  		<th width="15%">Email</th>
				  		<th width="20%">Subject</th>
				  		<th width="40%">Message</th>
				  		<th width="40%">Status</th> 
				  		 <th width="10%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblmsg`");
				  		$cur = $mydb->loadResultList();
						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td>' . $result->SENDERNAME.'</td>';
						echo '<td>' . $result->SENDEREMAIL.'</td>';
						echo '<td>' . $result->SENDERSUBJ.'</td>';
						echo '<td>' . $result->SENDERMSG.'</td>';
						echo '<td>' . $result->MSGSTATS.'</td>';

				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->MSGID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-info fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->MSGID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['ADMIN_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 