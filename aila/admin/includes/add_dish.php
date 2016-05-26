<form name="form1" method="post" action="process/process_add_dish.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Add dish</th>
      </tr>
      
      <tr>
        <th scope="row">dish Title</th>
        <td>
        <input type="text" name="title" placeholder="Enter the title" required />
      </tr>
      <tr>
        <th scope="row">dish price</th>
        <td>
		<input type="number" name="price" placeholder="Enter the price" required />
		
		
       
      </tr>
      
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit"></th>
        
		<input type="hidden" name="dish_id" />
      </tr>
    </tbody>
  </table>
</form>
