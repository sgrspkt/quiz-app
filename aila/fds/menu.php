 <?php include('includes/header.php'); ?>
<?php
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/menu.class.php');
$conObj = new Connection();
$viewMenuobj = new Menu();
$views = $viewMenuobj->viewmenu();
?>
<?php
$conObj->sql = "select * from tbl_menu m left join tbl_category c on m.menu_category=c.category_id order by menu_category  ";
$conObj->res = mysqli_query($conObj->conxn, $conObj->sql);
$conObj->numRows = mysqli_num_rows($conObj->res); // or trigger_error($this->err=mysqli_error($this->conxn));
$conObj->data = array();
if ($conObj->numRows > 0) {
    while ($conObj->row = mysqli_fetch_assoc($conObj->res)) {
        array_push($conObj->data, $conObj->row);
    }
}
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
        <link href="../media/css/dataTables.bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../media/js/jquery.dataTables.js"></script>
        
        <script>
            
            
            addedItems = [];
            var anil = function () {
                console.log(addedItems);
                var cartTableContent = '<thead><tr><th>Food Item</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr></thead>';
                var grandTotal = 0;
                for (var i = 0; i < addedItems.length; i++) {
                    console.log(addedItems[i].itemId);
                    cartTableContent = cartTableContent + '<tr><td>' + addedItems[i].itemTitle + '</td><td>' + addedItems[i].qty + '</td><td>' + addedItems[i].itemPrice + '</td><td>' + addedItems[i].qty * addedItems[i].itemPrice;
                    cartTableContent = cartTableContent + '</td><td><button onClick="removeBtn(' + i + ')">Remove</button></td></tr>';
                    grandTotal = grandTotal + addedItems[i].qty * addedItems[i].itemPrice;
                }
                cartTableContent = cartTableContent + "<tr><td colspan='3'>Grand Total</td><td>" + grandTotal + "</td></tr>";
                $('#cartTable').html(cartTableContent);
				$('#cartTable2').html(cartTableContent);
                $('#esewaamt').val(grandTotal);
                $('#esewatamt').val(grandTotal);
            }
            
            var removeBtn = function (i) {
                addedItems.splice(i, 1);
                anil();
            };
            var checkIfExists = function (id) {
                for (var x = 0; x < addedItems.length; x++) {
                    if (addedItems[x].itemId == id) {
                        return x;
                    }
                }
                return -1;
            };
            var order_id;
			
            var cartOrderBtnAction = function (item) {
               if (addedItems.length<=0){
                   return;
               }
                var user_id=$(item).attr('user-id');
                $.post("http://localhost/anil/rms/test.php",{
                    "type":0,
                    "user_id":user_id
                    },function(data){
                    order_id=data;
                    
                    for (var z = 0; z < addedItems.length; z++) {
                    $.post("http://localhost/anil/rms/test.php", {
                        "type":1,
                        "menu_id": addedItems[z].itemId,
                        "order_id":order_id,
                        "qty": addedItems[z].qty,
						"price":addedItems[z].itemPrice
						
						
                    }, function (data) {
                        console.log(data);
                    });
                    
 	
                }
                addedItems.splice(0,addedItems.length);
                anil();
                $('#myModal').modal('hide');
					
                   
				                //   alert("Order Placed Successfully!");
                });
                return;
                
            };
            var addItemToCart = function (item) {
                var index = checkIfExists($(item).attr('item-id'))
                if (index > -1) {
                    addedItems[index].qty = +addedItems[index].qty + +$('#quantity-' + $(item).attr('item-id')).val();
                } else {
                    console.log($(item).attr('item-id'));
                    var quantity = $('#quantity-' + $(item).attr('item-id')).val();
                    addedItems.push({itemId: $(item).attr('item-id'), itemTitle: $(item).attr('item-title'), itemPrice: $(item).attr('item-price'), qty: quantity});
                    console.log(addedItems);
                }
                anil();
            };
            (function () {
                
                
                
            })();
            
            $(document).ready(function() {
    			$('#menu').DataTable({
				
				"bLengthChange": false,
				"bFilter": true,
				"bPaginate": true,
				"bInfo": false,	
				"bAutoWidth": false
				});
			} );
			
            </script>
    </head>
    <body>
        
        <!--<?php print_r($_SESSION) ?>-->
        <div class="container">
            <div class="col-md-8" name="fetch">
                <h2>Aila Menu Items</h2>
                <hr/>

                <table class=" table" name="myContent" id="menu">
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
                        <?php foreach ($conObj->data as $value) { ?>
                            <tr>




                                <td> <img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['category_thumb_image']; ?>&h=50&w=50"/></td>
                                <td><?php echo $_session['category_title'] = $value['category_title']; ?></td>
                                <td><?php echo $menu_title = $value['menu_title']; ?></td>
                                <td><?php echo $value['menu_price']; ?></td>
                                <td><select id="quantity-<?php echo $value['menu_id']; ?>" name="quantity" id="quantity">
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
                                <td>
                                    <?php if (isset($_SESSION['username']) ) {?>
                                     <button  item-price="<?php echo $value['menu_price']; ?>" item-id="<?php echo $value['menu_id']; ?>" item-title="<?php echo $value['menu_title']; ?>" onClick="addItemToCart(this)" name="addtocart" >Add to cart</button></td>

                                    <?php } ?>
                                   


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>



            <div class="col-md-4">
                <div class="cart" name="myDiv">
                    <table id="cartTable" class="table">
                        <thead>
                            <tr>
                                <th>Food Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                    <button id="cartOrderBtn" user-id="<?php echo $_SESSION['user_id']; ?>" class="btn btn-block btn-success" onClick="$('#myModal').modal('show')">Order</button>
                    				 

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
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Online Payment </h4>
      </div>
      <div class="modal-body"><table id="cartTable2" class="table">
                        <thead>
                            <tr>
                                <th>Food Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                    <button onClick="cartOrderBtnAction($('#cartOrderBtn'))">Confirm</button><!--<a href="https://dev.esewa.com.np/epay/main" target="new">Esewa</a></button>-->
      </div>
      <div class="modal-footer">
      
      <form id="booking" method="post" target="_blank" action="https://dev.esewa.com.np/epay/main" class="booking">
        <button>Pay with esewa<button>
        <input type="hidden" name="tAmt" id="esewatamt" value="10" />
                    <input type="hidden" name="amt" id="esewaamt"   value="10" />
                    <input type="hidden" name="txAmt" value="0" />
                    <input type="hidden" name="psc"   value="0" />
                    <input type="hidden" name="pdc"   value="0" />
                    <input type="hidden" name="scd"   value="onlineroom" />
                    <input type="hidden" name="pid"   value="Anil Chapai" />
                    <input type="hidden" name="su"    value="http://localhost/aila/fds"  />
                    <input type="hidden" name="fu"    value="http://localhost/aila/fds/menu.php"  /><br />
                    
        </form>
      
      
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
       
      </div>
    </div>

  </div>
</div>
    </body>
    <?php include('includes/footer.php'); ?>