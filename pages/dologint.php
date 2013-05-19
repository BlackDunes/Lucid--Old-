<?php

$username = $_POST["username"];
$password = $_POST["password"];

$link = mysql_connect($sqlhostname, $sqlusername , $sqlpassword);
	if (!$link) exit("Could not connect to MySQL");
	if (!mysql_select_db($sqldatabase)) {
		echo "Could not select DB. Error: ", mysql_error();
		exit;
	}
	if ($link) {
		$username = htmlentities($username);
		$db_result = mysql_query('SELECT * FROM teachers WHERE username="'. $username .'" ');
		if ($db_result == FALSE) {
			echo "Query did not happen. Error: ", mysql_error();
			exit;
		}
		$db_array = mysql_fetch_array($db_result, MYSQL_ASSOC);

		if(isset($db_array["username"])) {
		$thesalt = $db_array["salt"];
		$secure = $password . $thesalt;
		$passcode = hash(md5 , $secure);
		
			if($passcode == $db_array["passcode"]) {
				$namamama = html_entity_decode($db_array["username"]);
				$_SESSION["username"] = $namamama;
				$_SESSION["id"] = $db_array["id"];
				$_SESSION["firstname"] = $db_array["firstname"];
				$_SESSION["lastname"] = $db_array["lastname"];
				$_SESSION["nameprefix"] = $db_array["nameprefix"];
				$_SESSION["userpic"] = $db_array["userpic"];
				$_SESSION["status"] = $db_array["status"];
				$logdate = date('Y-m-d');
				
				$db_result = mysql_query('UPDATE teachers SET lastlogin="' . $logdate . '" WHERE id="'. $db_array["id"] .'"');
				if ($db_result == FALSE) {
					echo "Query did not happen. Error: ", mysql_error();
					
					exit;
				}
				echo("You've been successfully logged in!
				<script type='text/javascript'>
<!--
window.location = 'index.php'
//-->
</script>");
			} else { // If pass is incorrect...
				echo("The password that you supplied was incorrect.");
			}
		} else { // If username is not found...
			echo("The username that you entered could not be found.");
		}
	}
?>