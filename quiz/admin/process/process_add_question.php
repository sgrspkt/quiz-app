<?php 

session_start();
require_once('../classes/connection.class.php');
require_once('../classes/question.class.php');

$addaboutObj=new question();

if(isset($_POST['add_question'])){
echo $question_name = $_POST['question_name'];
echo $category = $_POST['category'];
echo $created_at = $_POST['created_at'];
echo $updated_at = $_POST['updated_at'];
echo $correct_answer = $_POST['correct_answer'];
foreach($_POST['fields'] as $selected){
echo $selected."</br>";

}
$addaboutObj->setQuestionId($about_id);
$addaboutObj->setQuestionName($about_thumb_image);
$addaboutObj->setCategory($about_desc);
$addaboutObj->setCreatedAt($about_desc);
$addaboutObj->setUpdatedAt($about_desc);
$addaboutObj->setCorrectAnswer($about_desc);

/*echo '<pre>';
print_r($addaboutObj);
echo '</pre>';
exit;*/

$flag=$addaboutObj->addabout();

if($flag){
	$_SESSION['question_added'] = true;
		$_SESSION['question_added_msg']=$addaboutObj->success="The about successfully added";
		header('location:../index.php?page=about&action=view');
	}
else{
	$_SESSION['question_not_added'] = true;
	$_SESSION['question_not_added_msg']=$addaboutObj->error="The about couldn't be added";
	header('location:../index.php?page=about&action=add');
	}
?>

