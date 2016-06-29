<?php 

session_start();
require_once('../classes/connection.class.php');
require_once('../classes/question-answer.class.php');

$addQaObj=new QuestionAnswer();

if(isset($_POST['add_question'])){
$question_title = $_POST['question_name'];
$category = $_POST['category'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];
$correct_answer = $_POST['correct_answer'];
$answers = $_POST['fields'];

}

$addQaObj->setQuestionTitle($question_title);
$addQaObj->setCategory($category);
$addQaObj->setCorrectAnswer($correct_answer);
$addQaObj->setAnswer($answers);
$addQaObj->setCreatedAt($created_at);
$addQaObj->setUpdatedAt($updated_at);

/*echo '<pre>';
print_r($addQaObj);
echo '</pre>';
exit;*/

$flag=$addQaObj->addQa();

if($flag){
	//echo "added";
	$_SESSION['question_added'] = true;
		$_SESSION['question_added_msg']=$addaboutObj->success="The question successfully added";
		header('location:../index.php?page=question&action=view');
	}
else{
	echo "not added";
	/*$_SESSION['question_not_added'] = true;
	$_SESSION['question_not_added_msg']=$addaboutObj->error="The about couldn't be added";
	header('location:../index.php?page=about&action=add');*/
	}

?>

