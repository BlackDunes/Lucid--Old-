$(document).ready(function(){
	$('.thetabs div').click(function(){
		var $this = $(this);
		$('.panel').hide();
		$('.thetabs .tabselected').removeClass('tabselected').addClass('tabunselected');
		$this.removeClass('tabunselected').addClass('tabselected').blur();
		var panel = $this.attr('href');
		$(panel).fadeIn(250);
		return false;
	}); // end click
	$('.thetabs #basicstab').click();
}); // end ready