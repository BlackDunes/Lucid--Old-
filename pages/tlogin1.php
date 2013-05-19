<?php 
echo '
<script type=”text/javascript”>

$(document).ready(function(){

var clearMePrevious = ”;

// clear input on focus
$(‘.clearMeFocus’).focus(function()
{
if($(this).val()==$(this).attr(‘title’))
{
clearMePrevious = $(this).val();
$(this).val(”);
}
});

// if field is empty afterward, add text again
$(‘.clearMeFocus’).blur(function()
{
if($(this).val()==”)
{
$(this).val(clearMePrevious);
}
});
});

</script>

<div class="pagetitle">

Teacher Login</div>
  
  <div class="teacherlogin">
  		<form id="teacherloginform" method="post" action="index.php?p=dologint">
  			<div class="label">
          Username
        </div>
  				<input id="username" name="username" />
			<div class="label">
          Password
        </div>
  				<input type="password" id="password" name="password" />
  				<input class="submit" type="submit" value="Login" />
  		</form>
  </div>
  ';

?>

