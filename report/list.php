<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>

<style type="text/css"> 
#wrap{
	width: 100%;
	margin-top: 15px;
	text-align: center;
}
.wrap-content{ 
    width: 100%; 
    text-align: center;
}
.wrap-content input {  
    margin-bottom: 5px; 
    font-size: 15px; 
    width: 220px; 
}
.wrap-content button { 
    margin-bottom: 5px;   
    font-size: 15px; 
    width: 220px; 
}
.wrap-content label {   
    margin-bottom: 5px; 
    font-size: 15px; 
    width: 100px; 
}
</style>

<form method="POST" action=""  >
<div class="col-lg-12">
	<div id="wrap">
		<div class="wrap-content">
			<label class="item" >Year :</label>
			<input id="year" class="item " type="" name="year" >
		</div>
		<div class="wrap-content">
			<label class="item" >Course :</label>
			<input id="course" class="item " type="" name="course" > 
		</div>
		<div class="wrap-content"> 
			<label class="item" ></label>
			<button class="item btn btn-primary btn-sm submit" type="submit" name="submit">Retrieve</button>   
		</div>
	</div>
 <div class="col-lg-12"> 
	<div class="page-header"><h1 align="center">List of Research</h1>
     <h4 align="center">Sorsogon State College-Bulan Campus</h4>
    </div> 
    <div id="validaterecord"></div>
		<table class="table table-bordered table-hover" style="font-size: 10px;" >
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;">  
				<!-- <td width="150">Order#</td> -->
				<td width="100">Title</td>
				<td width="100">Author</td> 
				<td width="100">Abstract</td>
				<td width="100">Published Year</td>
				<td width="100">Course</td>
				<td width="100">Uploaded By</td>
			</tr>

		</thead>
		<tbody>		
			<?php
			if(isset($_POST['submit'])){ 
				
			$query="SELECT * FROM `tblbooks` WHERE `PUBYEAR` LIKE '%". $_POST['year']."%' OR `COURSE` LIKE '%". $_POST['course']."%'";

				$mydb->setQuery($query);
				$row = $mydb->executeQuery();

				$maxrow = $mydb->num_rows($row);

				if ($maxrow > 0) {
				$cur = $mydb->loadResultList();
					# code...
					foreach ($cur as $result) {
					# code...
					echo '<tr> 
							<td>'.$result->TITLE.'</td>
							<td>'.$result->AUTHOR.'</td>
							<td>'.$result->ABSTRACT .'</td>
							<td>'.$result->PUBYEAR .'</td>
							<td>'.$result->COURSE.'</td>
							<td>'.$result->UPLOADEDBY.'</td> 
						 </tr>';

					 }  
				}else{
					echo '<tr style="text-align:center;font-size:15px;">
							<td  colspan="4" >No Records Available</td> 
						</tr>';
				}

				



			  }
			  // else{
			// 	echo '<tr><td colspan="7" align="center"></td></tr>';

			// }
			 

			?>
		</tbody>
		</table>   
	
</div>

</form>
	<div class="row">
			<div class="col-md-12">
				<div class="col-md-2"> 	
				<form method="POST" action="printsales.php">
				<input id="year" class="item " type="hidden" name="year" value="<?php echo $_POST['year']; ?>" >
				<input id="course" class="item " type="hidden" name="course" value="<?php echo $_POST['course']; ?>">
			
				<button  type="submit"  class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
		     	</form>
	 			</div>
	 		</div>
		</div>