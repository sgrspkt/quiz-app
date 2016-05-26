<?php 
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/feature.class.php');

?>

<div class="wrapper" style="margin-top:25px;">
  <div class="container">
  <?php 
 $featureObj = new Feature();
 $view= $featureObj->viewfeature();

// echo '<pre>';
//  print_r($view);
//  echo '<pre>';
 
 ?>       
        <?php
        foreach($view as $value){
        ?>
    <div id="feature1" class="col-sm-4" style="background:#e7e2d6;
	padding:10px;" >
     <div class="req-block" style="background:#352924;
	padding:20px;
	padding-left:50px;
	border-radius:0.3em;
	margin-right:5px;
	font-size:12px;
	color:#f6c849;
    height:300px;">
        <h2 ><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;<?php echo $value['feature_title'];?></h2>
        <p style="font-size:19px"><?php echo $value['feature_desc'];?></p>
        <br/>
       <a href="index.php?page=feature&action=view&feature_id=<?php echo $value['feature_id'];?>" class="btn">Read More</a> </div>
    </div>
<?php
}
?>
  
    
</div>
</div>