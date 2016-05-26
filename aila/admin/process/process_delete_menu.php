<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/menu.class.php');
require_once('classes/locate.class.php');

$menu_id=isset($_GET['menu_id'])?$_GET['menu_id']:'';
$objdelete=new Menu();
$objdelete->setmenuID($menu_id);
$flag=$objdelete->deletemenu();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=menu&action=view');
	$_SESSION['msg']=$objdelete->msg="menu deleted sucessfully";
}
else{
	header('location:../index.php?page=menu&action=view&err=menunotdeleted');
	
}
?>