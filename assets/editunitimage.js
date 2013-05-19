$(document).ready(function(){
	$('#editunitpicbutton').click(function(){
		$( "#editimage" ).dialog({
			modal: true,
			show: "fade",
			hide: "fade",
			minWidth: 500
		});
	});

	$(function() {
		$( "#editpicsubmit").button();
	});
	$(function() {
		$( "#refreshpage").button();
	});
});

$(document).ready(function() { 

                    var bar = $(".bar");
                    var percent = $(".percent");
                    var status = $("#status");

                    var options = {
                        target: "#serverresponse",
                        beforeSubmit: function () {
                            $("#serverresponse").html("<img src='images/ajax-loader.gif'>");
                        },
                        beforeSend: function() {
                            status.empty();
                            var percentVal = "0%";
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        uploadProgress:
                        function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + "%";
                            bar.width(percentVal)
                            percent.html(percentVal);
                        }
                    };

                    $("#editunitimage").ajaxForm(options);

                });