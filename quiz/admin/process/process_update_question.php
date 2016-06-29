<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/question-answer.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['update_question'])){
$question_id = $_POST['question_id'];
$question_name=$_POST['question_name'];
$correct_answer=$_POST['correct_answer'];
$category = $_POST['category'];
$answers = $_POST['fields']; 
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

}





$updateQuestionObj = new QuestionAnswer();
/*echo '<pre>';
print_r($updateQuestionObj);
echo '</pre>';
die();*/
$updateQuestionObj->setCorrectAnswer($correct_answer);
$updateQuestionObj->setAnswer($answers);
$updateQuestionObj->setQuestionId($question_id);
$updateQuestionObj->setQuestionTitle($question_name);
$updateQuestionObj->setCategory($category);
$updateQuestionObj->setCreatedAt($created_at);
$updateQuestionObj->setUpdatedAt($updated_at);



$flag=$updateQuestionObj->updateQuestionAnswer();

/*echo '<pre>';
print_r($updateCategoryObj);
echo '</pre>';
die('i am here');*/

$locateObj = new Locate();

if($flag){
	
	$_SESSION['update_question'] = true;
	$_SESSION['update_question_msg']="The question successfully updated";
$locateObj->getLocation('../index.php?page=question&action=view');
	
}else
{
	
	$_SESSION['update_not_question'] = true;
	$_SESSION['update_not_question_msg']="The question couldn't be updated";
$locateObj->getLocation('../index.php?page=question&action=view');
	}

?>