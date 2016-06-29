 <?php

require_once('classes/connection.class.php');
require_once('../classes/user.class.php');


$viewobj=new User();

$views=$viewobj->viewUser();

/*echo '<pre>';
print_r($viewobj);
echo '</pre>';
die();*/

?>

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Id</th>
                  <th>FirstName</th>
                  <th>MiddleName</th>
                  <th>Last Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Date Of Birth</th>
                  <th>Phone Number</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                  <?php
  if(sizeof($views>0)){
    /*echo '<pre>';
    print_r($views);*/
  foreach($views as $value){

  $newArr = array();
    foreach($views as $newview) {
        $id = $newview['phone_number'];
        if (!isset($newArr[$id])) {
            $newArr[$id] = $newview;
            $newArr[$id]['phone_number'] = array();
        }
$newArr[$id]['phone_number'][] = $newview['phone_number'];
    }
    
  foreach ($newArr as $value) {
   
  ?>
                <tr>
                  <td><?php echo $value['user_id'];?></td>
                  <td><?php echo $value['first_name'];?> </td>
                  <td><?php echo $value['middle_name'];?></td>
                  <td> <?php echo $value['last_name'];?></td>
                  <td> <?php echo $value['username'];?></td>
                  <td> <?php echo $value['email'];?></td>
                  <td> <?php echo $value['address'];?></td>
                  <td> <?php echo $value['dob'];?></td>
                  <td> <?php echo implode('</br>',$value['phone_number']);?></td>
                  <td> <?php echo $value['created_at'];?></td>
                  <td> <?php echo $value['updated_at'];?></td>
                  
                </tr>
                <?php
              }
}
}
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
         