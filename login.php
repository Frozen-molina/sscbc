<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['ADMIN_USERID'])){
    redirect(WEB_ROOT."admin/index.php");
  }
  ?>
  


 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel Login</title>
  

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body>
<div class="container">
  <section id="content">
  <?php check_message(); ?>
    <form action="" method="POST">
      <h1>Login</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username"  name="user_email" />
      </div>
      <div>
        <input type="password" placeholder="Password" required="" id="password" name="user_pass" />
      </div>
      <div>
        <input type="submit" name="btnLogin" value="Log in" />
      
      </div>
    </form><!-- form -->
    <div class="button">
     
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>

</body>
</html>

 


 <?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['ROLE'].".","success");
      if ($_SESSION['ROLE']=='Administrator' || $_SESSION['ROLE']=='Student'){

        $_SESSION['ADMIN_USERID'] = $_SESSION['USERID'];
        $_SESSION['ADMIN_FULLNAME'] = $_SESSION['FULLNAME'] ;
        $_SESSION['ADMIN_USERNAME'] =$_SESSION['USERNAME'];
        $_SESSION['ADMIN_ROLE'] = $_SESSION['ROLE'];

        unset( $_SESSION['USERID'] );
        unset( $_SESSION['FULLNAME'] );
        unset( $_SESSION['USERNAME'] );
        unset( $_SESSION['PASS'] );
        unset( $_SESSION['ROLE'] );

         redirect(WEB_ROOT."admin/index.php");
      } 
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(WEB_ROOT."admin/login.php"); 
    }
 }
 } 
 ?> 
 


