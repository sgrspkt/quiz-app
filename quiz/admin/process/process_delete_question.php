<?php
require_once('classes/connection.class.php');
require_once('classes/question-answer.class.php');
require_once('classes/locate.class.php');

$question_id=isset($_GET['question_id'])?(int)$_GET['question_id']:''; 
$deleteQuesObj=new QuestionAnswer();
$deleteQuesObj->setQuestionId($question_id);
$flag=$deleteQuesObj->deleteQuestion();
/*echo '<pre>';
print_r($deleteaboutObj);
echo '</pre>';
exit;*/
$locateObj = new Locate();
if($flag){
	$_SESSION['question_deleted'] = true;
$_SESSION['question_deleted_msg']=$deleteCatObj->success="The question successfully deleted";
$locateObj->getLocation('index.php?page=question&action=view');
}else{
$_SESSION['question_not_deleted'] = true;
$_SESSION['question_not_deleted_msg']=$deleteCatObj->error="The question couldn't be successfully deleted";
$locateObj->getLocation('index.php?page=question&action=view');
}

?>