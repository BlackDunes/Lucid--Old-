$(".headnav").mouseover(function() {
	$(this).animate({
    	'padding-top' : '22px'
  	}, "fast");
});

$(".headnav").mouseout(function() {
	$(this).animate({
    	'padding-top' : '25px'
  	}, "fast");
});