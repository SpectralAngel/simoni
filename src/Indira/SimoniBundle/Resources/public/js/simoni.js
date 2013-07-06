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
	  timeFormat : 'hh:mm',
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

function addTagForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');

    // get the new index
    var index = collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__label__/g, ' ' + index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);
    
    $newLinkLi.before(newForm);
}

function embedForm(collectionHolder, $addImagenLink) {
    // add the "add a tag" anchor and li to the tags ul
    collectionHolder.append($addImagenLink);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    collectionHolder.data('index', collectionHolder.find(':input').length + 1);

    $addImagenLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm(collectionHolder, $addImagenLink);
    });
}

function addChildForm(collectionHolder, label) {
	var prototype = collectionHolder.data('prototype');

    // get the new index
    var index = collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__label__/g, ' ' + index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);
    
    collectionHolder.append(newForm);
}
