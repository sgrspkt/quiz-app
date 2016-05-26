<?php
session_start(); 
if(!$_SESSION['username']){
	header('location:login.php');
}
 require_once('bootstrap.php'); 
 ?> 
 <script src="../ckeditor/ckeditor.js">
 </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0<script src="../ckeditor/ckeditor.js"></script>
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Aila Lounge . Restuarant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Anil">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>

    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>Aila</span></a>
                
               <?php /*?><?php
				echo "<center>Welcome <b>".$_SESSION['username']."</center></b>";
				$_SESSION['count']=$_SESSION['count']+1;
				//$count++;
				
				echo "You visited: <b>". $_SESSION['count']. " </b> times";
				
				?><?php */?>
                
            <!-- user dropdown starts -->
             <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin &nbsp;<a href="logout.php">Logout</a></span>
                    <span class="caret"></span>
                </button>
               
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            
            <!-- theme selector ends -->

            

        </div>
    </div>
    
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <?php require("includes/leftmenu.php"); ?>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
          
            

<div>
    <ul class="breadcrumb">
       <!-- you can put the error message here-->
       
       <?php /*?><?php
	   if($_SESSION['error']){
		  echo '<b><font color="#F0E222">'.$_SESSION['error'].'</font></b>';
		unset($_SESSION['error']); 
	   }
	   else if($_SESSION['msg']){
	   
	     echo '<b><font color="#F0E222">'.$_SESSION['msg'].'</font></b>';
	   unset($_SESSION['msg']);
	   }
	   else if($_SESSION['user_updated']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['user_updated'].'</font></b>'; 
		  unset($_SESSION['user_updated']);
	   }
	    else if($_SESSION['user_not_updated']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['user_not_updated'].'</font></b>'; 
		  unset($_SESSION['user_not_updated']);
	   }
	   else if($_SESSION['profile_deleted']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['profile_deleted'].'</font></b>'; 
		  unset($_SESSION['profile_deleted']);
	   }
	    else if($_SESSION['profile_not_deleted']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['profile_not_deleted'].'</font></b>'; 
		  unset($_SESSION['profile_not_deleted']);
	   }
	   
	    else if($_SESSION['blog_deleted']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['blog_deleted'].'</font></b>'; 
		  unset($_SESSION['blog_deleted']);
	   }
	    else if($_SESSION['blog_not_deleted']) {
		  echo '<b><font color="#F0E222">'.$_SESSION['blog_not_deleted'].'</font></b>'; 
		  unset($_SESSION['blog_not_deleted']);
	   }
	   else if ($_SESSION['testimonial_deleted']){
		    echo '<b><font color="#F0E222">'.$_SESSION['testimonial_deleted'].'</font></b>'; 
		  unset($_SESSION['testimonial_deleted']);
	   }
	   else if ($_SESSION['testimonial_not_deleted']){
		    echo '<b><font color="#F0E222">'.$_SESSION['testimonial_not_deleted'].'</font></b>'; 
		  unset($_SESSION['testimonial_not_deleted']);
	   }
	   else if ($_SESSION['testimonial_updated']){
		    echo '<b><font color="#F0E222">'. $_SESSION['testimonial_updated'].'</font></b>'; 
		  unset($_SESSION['testimonial_updated']);
	   }
	   else if ($_SESSION['testimonial_not_updated']){
		    echo '<b><font color="#F0E222">'. $_SESSION['testimonial_not_updated'].'</font></b>'; 
		  unset($_SESSION['testimonial_not_updated']);
	   }
	   else if ($_SESSION['testimonial_updated']){
		    echo '<b><font color="#F0E222">'. $_SESSION['testimonial_updated'].'</font></b>'; 
		  unset($_SESSION['testimonial_updated']);
	   }
	   else if ($_SESSION['update_blog']){
		    echo '<b><font color="#F0E222">'. $_SESSION['update_blog'].'</font></b>'; 
		  unset($_SESSION['update_blog']);
	   }
	   else if ($_SESSION['update_not_blog']){
		    echo '<b><font color="#F0E222">'. $_SESSION['update_not_blog'].'</font></b>'; 
		  unset($_SESSION['update_not_blog']);
	   }
	    else if ($_SESSION['teaser_updated']){
		    echo '<b><font color="#F0E222">'. $_SESSION['teaser_updated'].'</font></b>'; 
		  unset($_SESSION['teaser_updated']);
	   }
	   else if ($_SESSION['teaser_not_updated']){
		    echo '<b><font color="#F0E222">'. $_SESSION['teaser_not_updated'].'</font></b>'; 
		  unset($_SESSION['teaser_not_updated']);
	   }
	   else if ($_SESSION['service_deleted']){
		    echo '<b><font color="#F0E222">'. $_SESSION['service_deleted'].'</font></b>'; 
		  unset($_SESSION['service_deleted']);
	   }
	   else if ($_SESSION['service_not_deleted']){
		    echo '<b><font color="#F0E222">'. $_SESSION['service_not_deleted'].'</font></b>'; 
		  unset($_SESSION['service_not_deleted']);
	   }
	  
	   ?>
      <?php */?>
       
       
       <!--error message ends-->
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Blank</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
            
                <!-- put your content here -->
                  <?php
			 include($page_to_load);
			  ?>
            </div>
        </div>
    </div>
</div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
<!--footer section-->
<?php require_once('includes/footer.php'); ?>
    
<!--footer ends-->
</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->


<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
