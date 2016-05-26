<?php
require_once('../classes/connection.class.php');
require_once('../classes/user.class.php');
require_once('../classes/locate.class.php');


if(isset($_POST['submit'])){
$user_id=$_POST['user_id'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

}

$updateUserObject=new user();
$updateUserObject->setUserID($user_id);
$updateUserObject->setUsername($username);
$updateUserObject->setPassword($password);
$updateUserObject->setEmail($email);


$flag=$updateUserObject->updateUser();
/*echo '<pre>';
print_r($updateUserObject);
echo '</pre>';
exit;*/
if($flag){
	$_SESSION['user_updated']=$err="The user has been updated successfully";
	new Locate('../index.php?page=user&action=view');

}
else
{
	$_SESSION['user_not_updated']=$err="The user couldn't be updated";
	new Locate('../index.php?page=user&action=view');
}

?>