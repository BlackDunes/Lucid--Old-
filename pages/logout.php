<?php

if ($_SESSION["id"]) {
	session_destroy();
	echo "You have successfully been logged out. Redirecting...<meta http-equiv='refresh' content='1;URL=index.php'>";
} else {
	echo "How are you supposed to log out if you aren't logged in?";
}

?>