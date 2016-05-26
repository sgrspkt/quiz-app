<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch($page){
	//---------------------------event section ---------------------------//
case 'event':
if($action == 'add'){
	
$page_to_load = "includes/add_event.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_event.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_event.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_event.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}



//---------------------------feature section ---------------------------//
case 'feature':
if($action == 'add'){
	
$page_to_load = "includes/add_feature.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_feature.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_feature.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_feature.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}

//---------------------------service section ---------------------------//
case 'service':
if($action == 'add'){
	
$page_to_load = "includes/add_service.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_service.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_service.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_service.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}

//---------------------------dish section ---------------------------//
case 'dish':
if($action == 'add'){
	
$page_to_load = "includes/add_dish.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_dish.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_dish.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_dish.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}

//---------------------------about section ---------------------------//
case 'about':
if($action == 'add'){
	
$page_to_load = "includes/add_about.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_about.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_about.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_about.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}


//---------------------------user section ---------------------------//
case 'user':
if($action == 'add'){
	
$page_to_load = "includes/add_user.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_user.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_user.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_user.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------reservation section ---------------------------//
case 'reservation':
if($action == 'add'){
	
$page_to_load = "includes/add_reservation.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_reservation.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_reservation.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_reservation.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------menu section ---------------------------//
case 'menu':
if($action == 'add'){
	
$page_to_load = "includes/add_menu.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_menu.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_menu.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_menu.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------category section ---------------------------//
case 'category':
if($action == 'add'){
	
$page_to_load = "includes/add_category.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_category.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_category.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_category.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------menu section ---------------------------//
case 'menu':
if($action == 'add'){
	
$page_to_load = "includes/add_menu.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_menu.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_menu.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_menu.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------message  section ---------------------------//
case 'message':
if($action == 'add'){
	
$page_to_load = "includes/add_message.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_message.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_message.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_message.php";
	break;
	}
default:
{
	$page_to_load="welcome.php";
}
//---------------------------order   section ---------------------------//
case 'order':
if ($action =='view'){
	
	$page_to_load= "includes/view_order.php";
	break;
}else if ($action=='delete'){
	$page_to_load="includes/view_order.php";
	break;
}
default:
{
	$page_to_load="welcome.php";
}
}