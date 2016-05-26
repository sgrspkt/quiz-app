<?php

require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/menu.class.php');
//if(isset($_GET['menu_title'])){
	//echo $_GET['menu_title'];
//}

$menu_title=isset($_GET['menu_title'])?$_GET['menu_title']:'';
$conObj = new Connection();
$viewMenuobj=new Menu();
$viewMenuobj->setMenuTitle($menu_title);

$views=$viewMenuobj->viewmenu();



/*echo '<pre>';
print_r($views);
echo '</pre>';
exit;
*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aila Lounge.Restaurant</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include('includes/header.php');?>
  <div class="container">
   <div class="col-md-8" name="fetch">
  <h2>Aila Cart</h2>
  <hr/>           
  <table class="table" name="myContent">
    <thead>
      <tr>
      <th>Menu Image</th>
        <th>Dishes </th>
        <th>Food Item </th>
        <th>Price</th>
        <th>Quantity</th>
        
      </tr>
    </thead>
    <tbody>
    <?php foreach($views as $value){?>
      <tr>
      
      
      
      
     <td> <img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['category_thumb_image'];?>&h=50&w=50"/></td>
        <td><?php echo $value['category_title'];?></td>
        <td><?php echo $value['menu_title'];?></td>   
        <td><?php echo $value['menu_price'];?></td>
        <td></td>
        
        
       
      </tr>
     <?php }?>
    </tbody>
  </table>
  </div>
  


<div class="col-md-4">
<div class="cart" name="myDiv">
<button type="button"><a href="menu.php">Back To Menu</a></button>





<style>
.cart{
	color: #fff;
	background-color: #d9534f;
	border-color: #d43f3a;
	position:fixed;
	color:#FFF;
	font-size:18px;
}
</style>
</div>
</div>
</div>
</body>
<?php include('includes/footer.php');?>