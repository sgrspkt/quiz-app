/**
 * How to use formats without delimiters
 * as the date format. Example: `yymmdd`
 */

var $picker = $( '.datepicker' ).pickadate({
  format: 'yy-mm-dd',
  formatSubmit: 'yy-mm-dd',
  onSelect: function() {
    
    // Remove the delimiters
    var reformattedDate = this.getDate().replace( /-/g, '' )
        
    // Set the input value
    this.$node.val( reformattedDate )
      
    // Set the hidden input value
    this.$node.siblings( 'input[type=hidden]' ).val( reformattedDate )
  }
})