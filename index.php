<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(WEB_ROOT."admin/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        // $title="Home";	
		// $content='home.php';	
		
		if ($_SESSION['ADMIN_ROLE']=='Administrator') {
				# code... 

			redirect('capstone/');

		}	
		break;	
	default :
		if ($_SESSION['ADMIN_ROLE']=='Student') {
				# code...
			redirect('capstone/');

		}	
		if ($_SESSION['ADMIN_ROLE']=='Administrator') {
				# code... 

			redirect('capstone/');

		}
	    // $title="Home";	
		// $content ='home.php';		
}
require_once("theme/templates.php");
?>