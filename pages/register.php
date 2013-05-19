<?php 
echo '
<script type="text/javascript" src="/assets/check_username.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<script>
  $(function() {
    $( "#prefix" ).buttonset();
  });
</script>
<div class="pagetitle"><div class="goback"><< Go Back</div>

Register</div>
<div id="initialbuttons"><button id="teacherbutton" class="bigselect">I\'m a Teacher</button><br />
<button id="studentbutton" class="bigselect">I\'m a Student</button></div>


<div id="teacherregform" style="display: none">
  
 	<script>
  $(document).ready(function(){
    $("#teachregForm").validate();
  });
  </script>

  
  <div class="registration">
  		<form class="cmxform" id="teachregForm" method="post" action="index.php?p=doregistert">
  			<div class="label">
          Username
        </div>
  			<input id="username" name="username" class="required" minlength="3" size="35" /><br />
  			<span id="availability_status"></span>

			<div class="label">
          Name Prefix
        </div>
        <div id="prefix">
        <input type="radio" id="mr" name="prefix" checked="checked" value="Mr."/><label for="mr">Mr.</label>
        <input type="radio" id="mrs" name="prefix"value="Mrs."/><label for="mrs">Mrs.</label>
        <input type="radio" id="ms" name="prefix" value="Ms."/><label for="ms">Ms.</label>
        <input type="radio" id="dr" name="prefix" value="Dr."/><label for="dr">Dr.</label>
        </div>

			<div class="label">
          First Name
        </div>
  				<input id="firstname" name="firstname" class="required" minlength="2" size="35" />
			<div class="label">
          Last Name
        </div>
  				<input id="lastname" name="lastname" class="required" minlength="2"  size="35"  />
			<div class="label">
          E-Mail
        </div>
  				<input id="email" name="email" class="required email"  size="35"  />
			<div class="label">
          Password
        </div>
  				<input type="password" id="pass" name="pass" class="required" minlength="5"  size="35"  />
			<div class="label">
          Confirm Password
        </div>
  				<input type="password" id="confirmpass" name="confirmpass" class="required" minlength="5" equalTo="#pass"  size="35"  />
			
  				<input class="submit" type="submit" value="Register" />
  			
  		</form>
  </div>
  
</div>


<div id="studentregform" style="display: none">
	<img src="http://slamchowder.files.wordpress.com/2009/07/jeff_goldblum.jpg?w=580">
</div>

<script>
    $("#teacherbutton").click(function () {
    	$("#initialbuttons").hide("fast");
    	$("#teacherregform").fadeIn("fast");
    	$(".goback").fadeIn("fast");
    });
    $("#studentbutton").click(function () {
    	$("#initialbuttons").hide("fast");
    	$("#studentregform").fadeIn("fast");
    	$(".goback").fadeIn("fast");
    });
    $(".goback").click(function () {
    	$("#initialbuttons").fadeIn("fast");
    	$("#studentregform").hide("fast");
    	$("#teacherregform").hide("fast");
    	$(".goback").fadeOut("fast");
    });
</script>
    
    ';

?>

