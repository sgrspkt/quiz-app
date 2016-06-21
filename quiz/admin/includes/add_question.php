<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/bootstrap.css">
<div class="col-md-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Question</h3>
            </div>
            <?php if(isset($_SESSION['error']) && ($_SESSION['error'] == true)){?>
<div class="alert alert-danger">
  <strong><?php echo $_SESSION['error'];?></strong>
</div>
<?php }else{};?>

<?php 
require_once('classes/connection.class.php');
require_once('classes/category.class.php');

$catObj = new Category();
$views = $catObj->viewCategory();

?>


 <div class="control-group" id="fields">
            <div class="controls"> 
                <form role="form" autocomplete="off" method="POST" action="process/process_add_question.php">

                <div class="form-group">
  <label for="usr">Question Name  </label>
  <input type="text" class="form-control" id="question_name" name="question_name" placeholder="Type question here">
</div>

                <label class="control-label" for="field1">Select Category</label>
                <div class="form-group">
      <label for="category"></label>
      <select class="form-control" id="category" name="category">
      <?php if(sizeof($views>0)){ 
          foreach ($views as $value) {
            ?>
            <option><?php echo $value['category_name'];?></option>
         <?php }
       }
        ?>
      </select>
      </div>

      <div class="form-group">
  <label for="usr">Created At</label>
  <input type="text" class="form-control" id="created_at" name="created_at" placeholder="click to show datepicker">
</div>
<div class="form-group">
  <label for="usr">Updated At</label>
  <input type="text" class="form-control" id="updated_at" name="updated_at" placeholder="click to show datepicker">
</div>
<div class="form-group">
  <label for="usr">Correct Answer</label>
  <input type="text" class="form-control" id="correct_answer" name="correct_answer" placeholder="Type correct answer here">
</div>
       <label class="control-label" for="field1">Add Answers</label>
                    <div class="entry input-group col-xs-12">
                        <input class="form-control" name="fields[]" type="text" placeholder="Type answers here" />
                      <span class="input-group-btn">
                          <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>

                 
            </div>
        </div>  
        <div class="box-footer">
              <input type="submit" name="add_question" class="btn-primary" id="add_question" value="Add Question">
              </div>
          </div>

          </div>
</form>
    
<script type="text/javascript">
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
  });
});
</script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
       

