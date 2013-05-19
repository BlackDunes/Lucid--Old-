<?php session_start(); ?>
<?php
    date_default_timezone_set("America/New_York");
    include ('assets/globalvars.php');
    echo '<html>
            <head>';
        include ('style.css');
    echo '<title>Lucid
                </title>
';
               
                
                echo '
            </head>
            <body>
            <center>
            <div id="head">
            	<div id="sitelogo">
            		<a href="index.php"><img src="images/minilogo.png" border="0" style="vertical-align: -6"> Lucid</a>';
                if ($_SESSION["username"]){
                   
               echo '<div class="headnav">
                    <a href="index.php?p=activities">Activities</a>
                </div>
                <div class="headnav">
                    <a href="index.php?p=units">Units</a>
                </div>
                <div class="headnav">
                    <a href="index.php?p=classes">Classes</a>
                </div>';
                }
				echo '</div>

			</div>
			<div id="navbar"><center><div class="navcontent">';
			
				if ($_SESSION["username"]){
					echo '<span class="loggedin">Hello, ' . $_SESSION["username"] . '!</span>  |  <a href="user.php?&id=' . $_SESSION["id"] . '">My Profile</a>  |  <a href="index.php?p=logout">Log Out</a>';
				} else {
					echo '<a href="index.php?p=mission">Our Mission</a>  |  
				<a href="index.php?p=features">Features</a>  |  
				<a href="index.php?p=contact">Contact Us</a>';
				}
				
			echo '</div></center></div>
			<div id="mainarea">';
			
			if ($_GET['p']) {
            	$page = $_GET['p'];
            	if (file_exists('pages/'.$page.'.php')) {
              		echo "";
              		include('pages/'.$page.'.php');
            	} else {
             		 echo "This page is coming soon.";
            	}
          	} else { 
				if ($_SESSION["username"]){
					include('pages/dashboard.php');
				} else {
					echo '<button id="register" class="bigselect">Register</button><br />
					<button id="gologin" class="bigselect">Log In</button>
			<script>
    			$("#gologin").click(function () {
    				document.location.href = "index.php?p=tlogin1";
    			});
    			$("#register").click(function () {
    				document.location.href = "index.php?p=register";
    			});
    		</script>';
				}
			}
			
			echo '</div>
			<div id="footer">
			</div>
			</body>
			</html>';
			
?>