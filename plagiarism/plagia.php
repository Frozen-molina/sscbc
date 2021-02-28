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
            <h1 class="page-header">Check Your Document Using Plagiarism Checker  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
        	<iframe style="border: 0; width: 100%; min-height: 800px; height: 100%;" src="https://www.prepostseo.com/frontend/plagiarismWidgetPremium?key=5b16d7fb75d08186fbb7ed46d81a3b45" width="300" height="150"></iframe>
   		 </div>
			  
 
					 

                