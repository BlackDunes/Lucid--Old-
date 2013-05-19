$("#addobjective").click(function() {
	var value = $("#newobj").val();
	var thenewobj = '<div><span class="deleteobjective ui-icon ui-icon-trash" style="display:inline-block; cursor: pointer"></span> <b>SWBAT</b> '+value+'<input type="hidden" name="objectives[]" value="' +value+ '" /><br /></div>';
	$("#addedobjectives").append(thenewobj);
	$("#newobj").val("");

	$(".deleteobjective").click(function() {
		$(this).parent().remove();
	});

});

