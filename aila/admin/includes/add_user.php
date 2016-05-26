<form name="form1" method="post" action="process/process_add_user.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Add User</th>
      </tr>
      
      <tr>
        <th scope="row">Username</th>
        <td>
        <input name="username" type="text" id="username" placeholder="username"></td>
      </tr>
      <tr>
        <th scope="row">Password</th>
        <td>
        <input name="password" type="password" required="required" id="password" placeholder="password"></td>
      </tr>
      <tr>
        <th scope="row">email</th>
        <td>
        <input type="email" name="email" id="email" placeholder="email"></td>
      </tr>
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
        <input type="hidden" name="user_id" value="user_id" /></th>
      </tr>
    </tbody>
  </table>
</form>
