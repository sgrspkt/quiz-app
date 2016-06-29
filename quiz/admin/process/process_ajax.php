<?php
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');

$objCat = new Category();
	$view = $objCat->searchAjax();
	echo $view;
  ?>
	