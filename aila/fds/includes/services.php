<?php 
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/service.class.php');

?>
<?php 
 $featureObj = new Service();
 $view= $featureObj->viewservice();

// echo '<pre>';
//  print_r($view);
//  echo '<pre>';
 
 ?>       
        
<div class="col-md-4">
<h2>Our Services</h2>
<?php
        foreach($view as $value){
        ?>
            	<p><img src="../admin/uploads/<?php echo $value['service_thumb_image'];?>" width="100%" vspace="10" hspace="10" height="139" align="right" alt="" /></p>
<strong><?php echo $value['service_title'];?></strong><br />
<?php echo $value['service_desc'];?>
&nbsp;</p>
<!-- <ol style=" font-size:20px; text-align:justify;font-family:Rosario, Gabriola, "Gill Sans MT", "Gill Sans Ultra Bold Condensed", "Rosewood Std Regular"">
    <li>Free wi-fi access is available and complimentary parking is provided on side.</li>
    <li>The hotel is just 10-15 minutes walking distance to temple.</li>
    <li>Fitted with&#8230;</ol> -->
               
               <a href="../fds/about.php" class="btn btn-sm btn-success">Detail</a>
               <?php
}
?>
</div>
