<?php


require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/menu.class.php');

$conObj = new Connection();
$viewMenuobj=new Menu();

$views=$viewMenuobj->viewmenu();



/*echo '<pre>';
print_r($views);
echo '</pre>';
*/
?>
<?php
$conObj->sql="select * from tbl_menu m left join tbl_category c on m.menu_category=c.category_id order by menu_category  ";
$conObj->res=mysqli_query($conObj->conxn,$conObj->sql);
//$conObj->row=mysqli_fetch_assoc($conObj->res);
//$conObj->affRows=mysqli_affected_rows($conObj->conxn);
//$this->res=mysqli_query($this->conxn,$this->sql)
$conObj->numRows=mysqli_num_rows($conObj->res);// or trigger_error($this->err=mysqli_error($this->conxn));
			$conObj->data=array();
			
			if($conObj->numRows>0){
				while($conObj->row=mysqli_fetch_assoc($conObj->res)){
					array_push($conObj->data,$conObj->row);
				}
				
				}


//print_r($conObj->data);
/*echo '<pre>';
print_r($conObj->data);
echo '</pre>';*/
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
    <script src="js/jquery.js"></script>
<script>
addedItems=[];
var anil=function(){
	console.log(addedItems);
	var cartTableContent='<thead><tr><th>Food Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>';
	for(var i=0;i<addedItems.length;i++){
		console.log(addedItems[i].itemId);
  cartTableContent=cartTableContent+'<tr><td>'+addedItems[i].itemTitle+'</td><td>'+addedItems[i].qty+'</td><td>'+addedItems[i].itemPrice+'</td></tr>';
		}
	console.log(cartTableContent);
	$('#cartTable').html(cartTableContent);
		
		}
	
var cartOrderBtnAction=function(){
	
		
	};
var addItemToCart=function(item){
	//item.preventDefault();
		console.log($(item).attr('item-id'));
	var quantity=$('#quantity-'+$(item).attr('item-id')).val();
		addedItems.push({itemId:$(item).attr('item-id'),itemTitle:$(item).attr('item-title'),itemPrice:$(item).attr('item-price'),qty:quantity});
		console.log(addedItems);
		anil();
		};
(function(){
	alert('sdfs');
	
	
	
	})();
</script>
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
   <div class="col-md-6" name="fetch">
  <h2>Aila Menu Items</h2>
  <hr/>  
     
  <table class="table" name="myContent">
    <thead>
      <tr>
      <th>Menu Image</th>
        <th>Dishes </th>
        <th>Food Item </th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    <?php foreach($conObj->data as $value){?>
      <tr>
      
      
      
      
     <td> <img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['category_thumb_image'];?>&h=50&w=50"/></td>
        <td><?php echo $_session['category_title']=$value['category_title'];?></td>
        <td><?php echo $menu_title=$value['menu_title'];?></td>   
        <td><?php echo $value['menu_price'];?></td>
        <?php
		if (isset($_SESSION['username'])){
			
		?>
        
        <td><select id="quantity-<?php echo $value['menu_id'];?>" name="quantity" id="quantity">
        	<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            </select></td>
        <td><button item-price="<?php echo $value['menu_price'];?>" item-id="<?php echo $value['menu_id'];?>" item-title="<?php echo $value['menu_title'];?>" onClick="addItemToCart(this)" name="addtocart" >Add to cart</button></td>
        
       
       
      </tr>
      <?php }?>
     <?php }?>
    </tbody>
  </table>
  </div>
  


<div class="col-md-6">
<div class="cart" name="myDiv">
<table id="cartTable" class="table">
<thead>
My Cart <img src=""
<tr>
<th>Food Item</th>
<th>Quantity</th>
<th>Price</th>
</tr>
</thead>

</table>
<button id="cartOrderBtn" onClick="cartOrderBtnAction()">Order</button>


<style>
.cart{
	color: #fff;
	background-color: #d9534f;
	border-color: #d43f3a;
	position:absolute;
	color:#FFF;
	font-size:18px;
}
</style>

</div>
</div>
</div>

</body>
<?php include('includes/footer.php');?>