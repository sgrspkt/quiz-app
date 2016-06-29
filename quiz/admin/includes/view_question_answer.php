 <?php

require_once('classes/connection.class.php');
require_once('classes/question-answer.class.php');

$viewobj=new QuestionAnswer();
$views=$viewobj->viewQa();
/*echo '<pre>';
print_r($viewobj);
echo '</pre>';
die();*/
?>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Question Name</th>
                  <th>Answers</th>
                  <th>Correct Answer</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
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

    

  foreach($newArr as $value){
      

  ?>

                <tr>
                  <td><?php echo $value['category_name'];?></td>
                  <td><?php echo $value['question_title'];?> </td>
                  <td><?php echo implode(',',$value['answer']);?></td>
                  <td> <?php echo $value['correct_answer'];?></td>
                   <td><?php echo $value['created_at'];?></td>
                  <td> <?php echo $value['updated_at'];?></td>
                  <td>
                  <a href="index.php?page=question&action=update&question_id=<?php echo $value['question_id'];?>">
                  <button type="button" class="btn btn-block btn-info">Update</button></a>

                   <a onClick="return confirm('Are you sure you want to delete')" href="index.php?page=question&action=delete&question_id=<?php echo $value['question_id'];?>">
                  <button type="button" class="btn btn-block btn-danger">Delete</button></a>
                  </td>
                </tr>
                <?php
}
}
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
         