$("#addquestion").click(function() {
	var value = $("#newquestion").val();
	var thenewques = '<div><span class="deletequestion ui-icon ui-icon-trash" style="display:inline-block; cursor: pointer"></span> '+value+'<input type="hidden" name="questions[]" value="' +value+ '" /><br /></div>';
	$("#addedquestions").append(thenewques);
	$("#newquestion").val("");

	$(".deletequestion").click(function() {
		$(this).parent().remove();
	});

});

