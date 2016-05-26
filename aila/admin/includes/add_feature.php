<form name="form1" method="post" action="process/process_add_feature.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Add feature</th>
      </tr>
      
      <tr>
        <th scope="row">feature Title</th>
        <td>
        <input type="text" name="title" placeholder="Enter the title" required />
      </tr>
      <tr>
        <th scope="row">feature Description</th>
        <td>
		<textarea name="desc" class="ckeditor" rows="5" cols="30" id="editor" required> </textarea>
		
		
       
      </tr>
      
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit"></th>
        
		<input type="hidden" name="feature_id" />
      </tr>
    </tbody>
  </table>
</form>
