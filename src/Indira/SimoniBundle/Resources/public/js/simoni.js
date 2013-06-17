function SIMONI() {
    
    $('.datepicker').datepicker({
        dateFormat : 'dd/mm/yy',
	  changeMonth: true,
	  changeYear: true
    });
    $('.colorpicker').colorpicker();
    $('.form-dialog').dialog({
        autoOpen : false
    });
    $('input.datetimepicker').datetimepicker(
	{
	  dateFormat : 'dd/mm/yy',
	  timeFormat : 'hh:mm tt',
	  changeMonth: true,
	  changeYear: true,
	    maxDate: 0
	});
    $('.ajax-form').submit(function(event){
    	event.preventDefault();
		var form = $(this);
	    var url = form.attr('action');
	    var posting = $.post(url, form.serialize()).done(function() {
	    	location.reload();
	    });
    });
}