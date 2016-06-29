<?php
require_once('../classes/connection.class.php');
require_once('../classes/question-answer.class.php');

$objCat = new QuestionAnswer();
	$view = $objCat->viewQa();
	echo json_encode($view);
	/*echo $view;*/
  ?>
	