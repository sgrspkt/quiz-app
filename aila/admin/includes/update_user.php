<?php
include('classes/connection.class.php');
include('classes/user.class.php');
?>
<?php
$user_id=isset($_GET['user_id'])?(int)$_GET['user_id']:'';
$objUser=new User();
$objUser->setUserID($user_id);
$views=$objUser->viewUser();
?>
<?php 
foreach($views as $value){
?>
<form name="form1" method="post" action="process/process_update_user.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Edit User</th>
      </tr>
      <tr>
        <th scope="row">Username</th>
        <td>
        <input name="username" type="text" id="username" value="<?php echo $value['username'];?>" placeholder="username"></td>
      </tr>
      <tr>
        <th scope="row">Password</th>
        <td>
        <input name="password" type="password" required="required" id="password" value="<?php echo $value['password'];?>" placeholder="password"></td>
      </tr>
      <tr>
        <th scope="row">email</th>
        <td>
        <input type="email" name="email" value="<?php echo $value['email'];?>" id="email"></td>
      </tr>
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
        <input type="hidden" name="user_id" value="<?php echo $value['user_id'];?>" /></th>
      </tr>
    </tbody>
  </table>
</form>
<?php
}
?>