<!-- 
Developed by Joken villanueva 
Date: 2017 of july 
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title;?></title>
 

 <!-- Bootstrap Core CSS -->
    <link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo WEB_ROOT; ?>admin/css/sb-admin.css" rel="stylesheet">


    <link href="<?php echo WEB_ROOT; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

    <link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"> 

    <!-- Custom Fonts -->
    <link href="<?php echo WEB_ROOT; ?>admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

    <!-- light box -->
    <link href="<?php echo WEB_ROOT; ?>admin/css/ekko-lightbox.css" rel="stylesheet">


    <link rel="icon" href="<?php echo WEB_ROOT; ?>favicon-1.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 


</head>


  <?php
   //admin_confirm_logged_in();
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(WEB_ROOT."admin/login.php");
     } 
/* 
  $todaysales = 0;
  $query = "SELECT SUM(TOTALPAYMENT) AS 'SALES' FROM `tblpayments`  
             WHERE  DATE(TRANSDATE) =CURDATE()";
        $mydb->setQuery($query);
        $cur = $mydb->loadSingleResult();
        $todaysales = $cur->SALES;
 

   $query = "SELECT * FROM `tblorders`  
             WHERE  STATUS='Pending' GROUP BY ORDERNO ";
        $mydb->setQuery($query);
        $cur = $mydb->executeQuery();

        $maxrow = $mydb->num_rows($cur);
*/
?>
      
<body>
 
 
<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo WEB_ROOT;?>admin/">Sorsogon State College-Bulan Campus</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
 
                <!-- account -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['ADMIN_FULLNAME']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li>
                            <a href="<?php echo WEB_ROOT; ?>admin/user/index.php?view=edit&id=<?php echo $_SESSION['ADMIN_USERID']; ?>"><i class="fa fa-fw fa-child"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo WEB_ROOT; ?>admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- end account -->
            </ul> 
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav"> 
<?php if ($_SESSION['ADMIN_ROLE']=='Administrator') { ?> 
                    <li class="<?php echo (currentpage() == 'capstone') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/capstone/"><i class="fa fa-fw fa-bar-chart-o"></i> Capstone Projects</a>
                    </li>
                    <li class="<?php echo (currentpage() == 'plagiarism') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/plagiarism/"><i class="fa fa-fw fa-table"></i> Plagiarism Checker</a>
                    </li>
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/user/"><i class="fa fa-fw fa-user"></i> Manage Users</a>
                    </li>
                  
                    <li class="<?php echo (currentpage() == 'messages') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/messages/"><i class="glyphicon glyphicon-envelope"></i> Messages</a>
                    </li>
                  

                    <li class="<?php echo (currentpage() == 'report') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/report/"><i class="fa fa-fw fa-bar-chart-o"></i> Report</a>
                    </li>  
<?php }elseif ($_SESSION['ADMIN_ROLE']=='Student') { ?>
                  <li class="<?php echo (currentpage() == 'capstone') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>admin/capstone/"><i class="fa fa-fw fa-bar-chart-o"></i> Capstone Projects</a>
                    </li>
<?php }?> 







                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <div class="row" > 

                   <?php   check_message();  ?>   

                  <?php require_once $content; ?> 
              </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<!-- jQuery --> 
<script src="<?php echo WEB_ROOT; ?>admin/jquery/jquery.min.js"></script> 
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo WEB_ROOT; ?>admin/js/bootstrap.min.js"></script>

<script src="<?php echo WEB_ROOT; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>admin/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/janobe.js" charset="UTF-8"></script> 

<script src="<?php echo WEB_ROOT; ?>admin/js/ekko-lightbox.js"></script>
<script src="<?php echo WEB_ROOT; ?>admin/js/lightboxfunction.js"></script> 

 <!-- event hanler of new order -->
<script type="text/javascript">
     $(document).on("dblclick",".addcartadmin",function(){
       var id = $(this).data("id");
       // alert(id)
       $.ajax({
        type : "POST",
        url : "addtocart.php",
        dataType : "text",
        data :{MEALID:id},
        success : function(data) {
          // alert(data);
           $("#cart").html(data);
           $("#addnotif").hide();
           $("#addnotif").show()
           $("#addnotif").html("meal has been added in the cart"); 
           setInterval(function(){
           $("#addnotif").hide();  
        },3000)

        }

       });
     });

     $(document).on("click",".removecartadmin",function(){
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
        type : "POST",
        url : "deletecart.php",
        dataType : "text",
        data :{MEALID:id},
        success : function(data) {
           $("#cart").html(data);
           $("#addnotif").hide();
           $("#addnotif").show()
           $("#addnotif").html("meal has been remove in the cart"); 
           setInterval(function(){
           $("#addnotif").hide();  
        },3000)

        }

       });
     });
     // end of event handler of new order
     // ***********************************************************
// search for meals event handler
     $(document).on("keyup","#id_search",function(){
        var meal = document.getElementById("id_search").value;

        $.ajax({
          url: "meals.php",
          type : "POST",
          dataType : "text",
          data : {MEAL:meal},
          success : function(data){
            $("#resulttable").html(data);
          }

        });

     });
    // end of search meals event handler
    // ***********************************************
    </script> 

</body>
</html>