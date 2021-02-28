  <?php
  require_once("../../include/initialize.php");
   //admin_confirm_logged_in();
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/login.php");
     } 
  ?>  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>List of Research</title>
 

 <!-- Bootstrap Core CSS -->
    <link href="<?php echo web_root; ?>admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="<?php echo web_root; ?>admin/css/sb-admin.css" rel="stylesheet"> -->


    <link href="<?php echo web_root; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

    <!-- <link href="<?php echo web_root; ?>admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"> -->

    <!-- Morris Charts CSS -->
    <!-- <link href="<?php echo web_root; ?>admin/css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="<?php echo web_root; ?>admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="icon" href="<?php echo web_root; ?>favicon-1.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 
<style type="text/css">
    #wrap{
        width: 100%;
        margin-top: 0px;
    }
</style>

</head>

 
<body onload="window.print();"> 
<div id="wrap">
<div id="container">
   
    <div class="page-header"><h1 align="center"List of Research</h1>
    <h4 align="center">Sorsogon State College-Bulan Campus</h4>
    </div> 
        <table class="table table-bordered table-hover" border="1" style="font-size: 10px;" >
        <thead>
            <tr bgcolor="skyblue" style="font-weight: bold;">  
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

          

            ?>
        </tbody>
       
        </table>    
</div>
</div>

<!-- jQuery --> 
<script src="<?php echo web_root; ?>admin/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo web_root; ?>admin/js/bootstrap.min.js"></script>

<script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script> 

<script type="text/javascript" src="<?php echo web_root; ?>admin/js/janobe.js" charset="UTF-8"></script>
 
   <script type="text/javascript">
    (function() {

    var beforePrint = function() {
        console.log('Functionality to run before printing.');
    };

    var afterPrint = function() {
        // console.log('Functionality to run after printing');
        // window.print();
        // window.close();
        window.location = "index.php";
    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            } else {
                afterPrint();
            }
        });
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;

}());
</script>
 
</body>
</html>