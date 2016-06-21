 <?php

require_once('classes/connection.class.php');
require_once('classes/category.class.php');


$viewobj=new Category();

$views=$viewobj->viewCategory();


?>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>

                          <!--alert messages section-->

<?php if(isset($_SESSION['category_deleted_msg']) && $_SESSION['category_deleted'] == true)
  {
    ?>
        <div class="btn btn-block btn-primary col-md-6">
            <strong><?php echo $_SESSION['category_deleted_msg'];
            
        ?>
        </strong>
        </div>
<?php }
elseif(isset($_SESSION['category_not_deleted_msg']) && $_SESSION['category_not_deleted'] == true)
  {
    ?>
<div class="alert alert-danger col-md-6">
  <strong><?php echo $_SESSION['category_not_deleted_msg'];?></strong>
</div>
  <?php 
  }
elseif(isset($_SESSION['category_added_msg']) && $_SESSION['category_added'] == true){
  ?>
<div class="btn btn-block btn-primary col-md-6">
  <strong><?php echo $_SESSION['category_added_msg'];?></strong>
</div>
<?php 
}
elseif(isset($_SESSION['update_category_msg']) && $_SESSION['update_category'] == true){
?>
<div class="btn btn-block btn-primary col-md-6">
  <strong><?php echo $_SESSION['update_category_msg'];?></strong>
</div>
<?php 
}
else{

};
  ?>
                              <!--alert messages section-->




            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
  if(sizeof($views>0)){
    /*echo '<pre>';
    print_r($views);*/
  foreach($views as $value){
      
  
  ?>
                <tr>
                  <td><?php echo $value['category_id'];?></td>
                  <td><?php echo $value['category_name'];?> </td>
                  <td><?php echo $value['created_at'];?></td>
                  <td> <?php echo $value['updated_at'];?></td>
                  <td>
                  <a href="index.php?page=category&action=update&category_id=<?php echo $value['category_id'];?>">
                  <button type="button" class="btn btn-block btn-info">Update</button></a>

                   <a onClick="return confirm('Are you sure you want to delete')" href="index.php?page=category&action=delete&category_id=<?php echo $value['category_id'];?>">
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
         