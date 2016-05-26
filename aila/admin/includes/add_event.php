

<form name="form1" method="post" action="process/process_add_event.php" id="event">

  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Add Event</th>
      </tr>
      
      <tr>
        <th scope="row">Event Title</th>
        <td>
        <input type="text" name="title" placeholder="Enter the title" required />
      </tr>
      <tr>
        <th scope="row">Event Description</th>
        <td>
		<textarea name="desc" class="ckeditor" rows="5" cols="30" required> </textarea>
		
		
       
      </tr>
      <tr>
        <th scope="row">date</th>
        <td>
        <input name="date" type="date" min="<?php echo date("Y-m-d");?>" required="required" id="date" placeholder="date" required ></td>
      </tr>
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit"></th>
        
		<input type="hidden" name="event_id" />
      </tr>
    </tbody>
  </table>
</form>
<script src="../../rms/js/jquery.js"></script>
<script src="../../rms/js/jrms.js"></script>
<script src="../../rms/js/jquery.validate.js"></script>
<script>
 $(document).ready(function() {
	 
	 jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]*$/
.test(value);
}, "Letters only please");


	$("#event").validate({
  rules: {
    title: {
      required: true,
     alphanumeric:true,
	  minlength: "at least 6 character required "
    }
  },
  messages: {
    title: {
      required: "ENTER THE TITLE ",
	  minlength:"Your password must be at least 5 characters long"
      
    }
  }
});
});
</script>