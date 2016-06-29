<div>
	<?php
	require_once('admin/classes/connection.class.php');
	require_once('admin/classes/category.class.php');
	require_once('admin/classes/question-answer.class.php');
	?>
	<?php

	$viewobj=new QuestionAnswer();
	
	$views=$viewobj->viewQa();

/*echo '<pre>';
print_r($viewobj);
*/


	?>
	
	<!DOCTYPE html>
	<html>
	<head>
	<title>QuizApp | Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/search.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	 <link rel="stylesheet" href="popup/css/normalize.min.css">
	        <link rel="stylesheet" href="popup/css/animate.min.css">
	        <style>
	            #btn-close-modal {
	                width:100%;
	                text-align: center;
	                cursor:pointer;
	                color:#fff;
	            }
	
	        </style>
	</head>
	<?php include('header.php');?>
	<!-- search form 1 -->
	<form class="searchbox_1" action="process/process_test.php" post="post">
	<input type="text" class="search_1" placeholder="Search By Quiz Categories" id="category" name="selection">
	<div class="categorylist" id="categorylist"></div>

	
	<div class="col-md-4"></div>
		<div class="col-md-4">
			<a id="play" href="#animatedModal" class="btn btn-primary btn-block">PLAY QUIZ</a>
			<style type="text/css">
				#play{
					display: none;
					margin-left: 40%;
				}
			</style>
		</div>
		</form>
	<div class="col-md-4"></div>
	<div id="animatedModal">
	            <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
	            <div  id="btn-close-modal" class="close-animatedModal"> 
	                QUIT
	            </div>
	                
	            <div class="modal-content">
	                <!--Your modal content goes here-->
	                <form method="post" action="process/process_test.php">
	                 
	                  <?php



	  if(sizeof($views>0)){
	    
	   $newArr = array();
	    foreach($views as $paper) {
	        $id = $paper['category_name'];
	        if (!isset($newArr[$id])) {
	            $newArr[$id] = $paper;
	            $newArr[$id]['answer'] = array();
	        }
	        $newArr[$id]['answer'][] = $paper['answer'];
	    }
	
	    
	$counter = 0;
	  foreach($newArr as $value){
	  	echo '<div class="question-wrapper"><table id="questions-'.$counter.'" class="table table-bordered table-hover" border="0">';
	   echo '<tr><td>'.$value['question_title'].'</td></tr>' ;
	  	foreach ($value['answer'] as $key => $values) {
	  		# code...
	  		$ans = $value['question_id'];
	  		echo '<tr><td><input type="radio" name="'.$ans.'" class="answer" value="'.$values.'">'.$values.'</td></tr>';
	  		
	  	}

	 
	echo '</table><ul class="pager pager-'.$counter.'">
	  <li class="previous" id="prev"><a href="#">Previous</a></li>
	  <li class="next" name="next" id="next"><a href="#">Next</a></li>
	</ul></div>';
	  ?>    
	                <?php
	                $counter++;
	}
	}
	else{
		echo '<div class=score>Your Score is : </div>';
	}
	                ?>
	            
	               
<script type="text/javascript">
$(document).ready(function(){
$('#play').on("click",function(){
var category = $('#category').val();
document.getElementById('category-name').value=category ;
if(category != ''){
					$.ajax({
						url:'admin/process/process_getCategoryAjax.php',
						method:"POST",
						data:{category,category},
						success:function(data){
							console.log($.parseJSON(data));

							//console.log(data);
						} 
					});
				}
$('.question-wrapper:not(:first)').hide();


});	

$('.next').on("click",function(){
				var parent = $(this).parent().parent().hide();
				$(parent).next().show();
				
				});
$('.previous').on("click",function(){
				
				var par = $(this).parent().parent().hide();
				$(par).prev().show();
				
				});

});
</script>
<input type="hidden" name="category-name" id="category-name"/>
<button type="submit" class="btn btn-primary" name="submit">Submit</button>

	</form>

	            </div>
	        </div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#category').keyup(function(){
				var query = $(this).val();
				if(query != ''){
					$.ajax({
						url:'admin/process/process_ajax.php',
						method:"POST",
						data:{query,query},
						success:function(data){
							//console.log(data);
							$('#categorylist').fadeIn();
						$('#categorylist').html(data);
						} 
					});
				}
			});

			$(document).on('click','li',function(){
			var selection = $('#category').val($(this).text());

			$('#categorylist').fadeOut();
			$('#play').show();
		});
			
		});
	
	</script>
	 
	        <script src="popup/js/jquery.min.js"></script>
	        <script src="popup/js/animatedModal.min.js"></script>
	      <script type="text/javascript">
	      $("#play").animatedModal();
	      </script>
	</body>
	</html>
</div>