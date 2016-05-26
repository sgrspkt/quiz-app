<?php 
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/about.class.php');

?>


<div class="col-md-4">
<h2>Introduction</h2>
<?php 
 $featureObj = new About();
 $view= $featureObj->viewabout();

/*echo '<pre>';
 print_r($view);
 echo '<pre>';*/
 
 ?>       
        <?php
        foreach($view as $value){
        ?>
<p style="text-align:justify;"><img width="150" hspace="10" height="225" align="right" src="../admin/uploads/<?php echo $value['about_thumb_image'];?>" alt="" />
<?php echo $value['about_desc'];?>
</p>
       <p><a role="button" href="../fds/about.php" class="btn btn-sm btn-success">View details</a></p>
<?php
}
?>
	
</div>