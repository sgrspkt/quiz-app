<?php

switch($_POST['type']){
	case 0:
include_once('../admin/classes/order.class.php');
$order=new Order();
echo $order->insert($_POST['user_id']);
	break;
	case 1:
include_once('../admin/classes/menuorder.class.php');
$menuOrder=new MenuOrder();
$menuOrder->insert($_POST['order_id'],$_POST['menu_id'],$_POST['qty']);
echo true;
	break;
	
}

// print_r($_POST);
?>
