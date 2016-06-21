<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch($page){
	//---------------------------question section ---------------------------//
case 'question':
if($action == 'add'){
	
$page_to_load = "includes/add_question.php";
break;
}
else if($action == 'view'){
$page_to_load= "includes/view_question.php";
break;
}else if ($action=='delete'){
	$page_to_load="process/process_delete_question.php";
	break;
}
	else if($action=='update'){
		$page_to_load="includes/update_question.php";
	break;
	}
default:
{
	$page_to_load="dashboard.php";
}

case 'category';
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
	$page_to_load="dashboard.php";
}
}
?>