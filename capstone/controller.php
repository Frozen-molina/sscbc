<?php
require_once ("../../include/initialize.php");
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

	case 'banner' :
	setBanner();
	break;

 case 'discount' :
	setDiscount();
	break;
	}

   
function doInsert(){
	if(isset($_POST['save'])){
		//BOOKID, TITLE, AUTHOR, COURSE, MEMBERS, ADVISER, GRAMMARIAN, ABSTRACT, PUBYEAR, UPLOADEDBY, DATEUPLOADED		
	$errofile   = $_FILES['fileupload']['error'];
	$type 		= $_FILES['fileupload']['type'];
	$temp       = $_FILES['fileupload']['tmp_name'];
	$myfile     = $_FILES['fileupload']['name'];
 	$location   = "uploaded_files/".$myfile;

 

	if ($_POST['Title'] == "" OR $_POST['Author'] == "" OR $_POST['Members'] == "" OR $_POST['Abstract'] == "" OR $_POST['UploadedBy'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	

			if ( $errofile > 0) {
				message("No Document has been Selected!", "error");
				redirect("index.php?view=add");
			}else{
	 
				@$file=$_FILES['fileupload']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['fileupload']['tmp_name']));
				@$image_name= addslashes($_FILES['fileupload']['name']); 
				@$image_size= getimagesize($_FILES['fileupload']['tmp_name']);

			
					move_uploaded_file($temp,"uploaded_files/" . $myfile);
				

		
					 
						$book = New Books();

  				 	 	$book->TITLE 			= $_POST['Title']; 
						$book->AUTHOR 			= $_POST['Author'];  
						$book->COURSE 			= $_POST['Course'];
						$book->MEMBERS	    	= $_POST['Members']; 
						$book->ADVISER			= $_POST['Adviser']; 
						$book->GRAMMARIAN 		= $_POST['Grammarian']; 
						$book->ABSTRACT 		= $_POST['Abstract'];  
						$book->PUBYEAR 			= $_POST['PublisedYear'];
						$book->UPLOADEDBY	    = $_POST['UploadedBy']; 
						$book->LOCATION	    	= $location;
					//	$book->DATEUPLOADED		= $_POST['DATEUPLOADED']; 

						$book->create();
										
						message("New [". $_POST['Title'] ."] created successfully!", "success");
						redirect("index.php");

				
			}
		}
			 
		
	}
}	  
 	
	function doEdit(){ 

		if(isset($_POST['save'])){
			$errofile   = $_FILES['fileupload']['error'];
			$type 		= $_FILES['fileupload']['type'];
			$temp       = $_FILES['fileupload']['tmp_name'];
			$myfile     = $_FILES['fileupload']['name'];
		 	$location   = "uploaded_files/".$myfile;


					if ($_POST['Title'] == "" OR $_POST['Author'] == "" OR $_POST['Members'] == "" OR $_POST['Abstract'] == "" OR $_POST['UploadedBy'] == "") {
						$messageStats = false;
						message("All field is required!","error");
						redirect('index.php?view=add');
					}else{

					if ( $errofile > 0) {
						message("No Document has been Selected!", "error");
						redirect("index.php?view=add");
					}else{
			 
						@$file=$_FILES['fileupload']['tmp_name'];
						@$image= addslashes(file_get_contents($_FILES['fileupload']['tmp_name']));
						@$image_name= addslashes($_FILES['fileupload']['name']); 
						@$image_size= getimagesize($_FILES['fileupload']['tmp_name']);

				
						move_uploaded_file($temp,"uploaded_files/" . $myfile);

						$book = New Books();

  				 	 	$book->TITLE 			= $_POST['Title']; 
						$book->AUTHOR 			= $_POST['Author'];  
						$book->COURSE 			= $_POST['Course'];
						$book->MEMBERS	    	= $_POST['Members']; 
						$book->ADVISER			= $_POST['Adviser']; 
						$book->GRAMMARIAN 		= $_POST['Grammarian']; 
						$book->ABSTRACT 		= $_POST['Abstract'];  
						$book->PUBYEAR 			= $_POST['PublisedYear'];
						$book->UPLOADEDBY	    = $_POST['UploadedBy']; 
					//	$book->DATEUPLOADED		= $_POST['DATEUPLOADED']; 
						$book->LOCATION	    	= $location;
						$book->update($_POST['BOOKID']);
										
						message("[". $_POST['Title'] ."] has been updated!", "success");
						redirect("index.php");
					}		


					}
	  } 
}

	function doDelete(){

 
 

		// if (isset($_POST['selector'])==''){
		// 	message("Select the records first before you delete!","error");
		// 	redirect('index.php');
		// 	}else{

		// 	$id = $_POST['selector'];
		// 	$key = count($id);

		// 	for($i=0;$i<$key;$i++){ 

		// 	$product = New Product();
		// 	$product->delete($id[$i]);
 

		// 	$stockin = New StockIn();
		// 	$stockin->delete($id[$i]);

		// 	$promo = New Promo();   
		// 	$promo->delete($id[$i]);


				$id = 	$_GET['id'];

				$meal = New Meal();
	 		 	$meal->delete($id);

			message("Product has been Deleted!","info");
			redirect('index.php');

			// }
		// }

	}
		 
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="uploaded_photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_POST['MENUID']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_POST['MENUID']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	 
					$meal = New Meal();
					$meal->MEALPHOTO 			= $location;
					$meal->update($_POST['mealid']); 

					// redirect("index.php");
					redirect("index.php?view=view&id=".$_POST['mealid']);
						 
							
			}
		}
			 
		}


	function setBanner(){
		$promo = New Promo();
		$promo->PROBANNER  =1;  
		$promo->update($_POST['PROID']);

	}

 	function setDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
	function removeDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
?>