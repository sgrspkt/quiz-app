<?php
require_once('classes/connection.class.php');
require_once('classes/category.class.php');
?>
<?php
$category_id=isset($_GET['category_id'])?(int)$_GET['category_id']:'';
$updateObj=new Category();
$updateObj->setCategoryId($category_id);
$data=$updateObj->viewCategory();
//$updateObj->setserviceID($service_id);

/*echo '<pre>';
print_r($data);
echo'</pre>';
exit;*/
foreach($data as $value){
?>
<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
<form name="add_cateogory" method="post" action="process/process_update_category.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryname">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $value['category_name'];?>" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
  <label for="usr">Created At</label>
  <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $value['created_at'];?>" placeholder="click to show datepicker">
</div>
<div class="form-group">
  <label for="usr">Updated At</label>
  <input type="text" class="form-control" id="updated_at" name="updated_at" value="<?php echo $value['updated_at'];?>" placeholder="click to show datepicker">
  <input type="hidden" name="category_id" value="<?php echo $value['category_id'];?>" />
</div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_category">Submit</button>
              </div>
            </form>
          </div>
      </form>

      <?php }?>