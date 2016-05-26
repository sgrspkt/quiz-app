<?php

session_start();

require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/cart.class.php');
//require_once('../admin/classes/menu.class.php');

 $conObj = new Connection();
//$viewMenuobj=new Menu();

 /*?>echo '<pre>';
print_r($viewMenuobj);
echo '</pre>';exit;
$views=$viewMenuobj->viewmenu();


echo $conObj->sql="select * from tbl_menu m left join tbl_category c on m.menu_category=c.category_id order by menu_category  ";exit;
$conObj->res=mysqli_query($conObj->conxn,$conObj->sql);
$conObj->numRows=mysqli_num_rows($conObj->res);// or trigger_error($this->err=mysqli_error($this->conxn));
			$conObj->data=array();
			
			if($conObj->numRows>0){
				while($conObj->row=mysqli_fetch_assoc($conObj->res)){
					array_push($conObj->data,$conObj->row);
				}
				
				}

 foreach($conObj->data as $value){
	 
	 echo '<pre>';
	 print_r($conObj->data);
	 echo '</pre>';
	 exit;
 
 }<?php */
$addcartobj=new Cart();
/*echo '<pre>';
print_r($addcartobj);
echo '</pre>';
exit;*/
echo $_session['category_title'];exit;
 //$user_id=mysqli_real_escape_string($addcartobj->conxn,$value['user_id']);
 echo $category_title=mysqli_real_escape_string($addcartobj->conxn,$_session['category_title']);exit;
//$menu_price=mysqli_real_escape_string($addcartobj->conxn,$_POST['menu_price']);
//$category_title=mysqli_real_escape_string($addcartobj->conxn,$_POST['category_title']);
//$menu_quantity=mysqli_real_escape_string($addcartobj->conxn,$_POST['menu_quantity']);
//$category_thumb_image=mysqli_real_escape_string($addcartobj->conxn,$_POST['category_thumb_image']);

$addcartobj->setUserID($user_id);
$addcartobj->setMenuTitle($menu_title);
$addcartobj->setMenuPrice($menu_price);
$addcartobj->setCategoryTitle($category_title);
$addcartobj->setMenuQuantity($menu_quantity);
$addcartobj->setCategoryThumbImage($category_thumb_image);

//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$addmenuobj->addMenu();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($addmenuobj){
     header('location:../index.php?page=menu&action=view');
	 $_SESSION['msg']=$addmenuobj->msg="The menu has been added sucessfully";
}
else{
	echo $_SESSION['msg']=$addmenuobj->msg="Sorry the menu has not been  added, please try again later";
}

?>