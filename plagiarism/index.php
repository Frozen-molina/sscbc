<?php
require_once("../../include/initialize.php");
//checkAdmin();
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Plagiarism Checker";
 $header=$view; 
switch ($view) {
	case 'plagiarism' :
		$content    = 'plagia.php';		
		break;




	default :
		redirect("index.php?view=plagiarism");
		break;
}
require_once ("../theme/templates.php");
?>
  
