<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/about.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['update_about'])){
$about_id=$_POST['about_id'];
$about_desc=$_POST['about_desc'];
$about_thumb_image=$_POST['about_thumb_image'];
}
$updateaboutObj=new About();
$updateaboutObj->setaboutID($about_id);
$updateaboutObj->setaboutDesc($about_desc);
$updateaboutObj->setaboutThumbImage($about_thumb_image);
//$updateaboutObj->updateabout();

$flag=$updateaboutObj -> updateabout();

/*echo '<pre>';
print_r($flag);
echo '</pre>';
exit;
*/

if($flag){
	$_SESSION['update_about']="The about successfully updated";
new Locate('../index.php?page=about&action=view');	
	
}else
{
	$_SESSION['update_not_about']="The about couldn't be updated";
	new Locate('../index.php?page=about&action=view');
	}

?>