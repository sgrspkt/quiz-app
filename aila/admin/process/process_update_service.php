<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/service.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['update_service'])){
$service_id=$_POST['service_id'];
$service_title=$_POST['service_title'];
$service_desc=$_POST['service_desc'];
$service_thumb_image=$_POST['service_thumb_image'];
}
$updateserviceObj=new Service();


$updateserviceObj->setserviceID($service_id);
$updateserviceObj->setserviceTitle($service_title);
$updateserviceObj->setserviceDesc($service_desc);
$updateserviceObj->setserviceThumbImage($service_thumb_image);

$flag=$updateserviceObj->updateservice();

$flag=$updateserviceObj;

/*echo '<pre>';
print_r($flag);
echo '</pre>';
exit;*/


if($flag){
	$_SESSION['update_service']="The service successfully updated";
new Locate('../index.php?page=service&action=view');	
	
}else
{
	$_SESSION['update_not_service']="The service couldn't be updated";
	new Locate('../index.php?page=service&action=view');
	}

?>