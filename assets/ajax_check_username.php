<?php

    include ('globalvars.php');
    $link = mysql_connect($sqlhostname, $sqlusername , $sqlpassword);
	if (!$link) exit("Could not connect to MySQL");
	if (!mysql_select_db($sqldatabase)) {
		echo "Could not select DB. Error: ", mysql_error();
		exit;
	}
	if ($link) {

if(isset($_POST['username']))//If a username has been submitted
{
	$username = mysql_real_escape_string($_POST['username']);//Some clean up :)

	$check_for_username = mysql_query("SELECT username FROM teachers WHERE username='$username'");
	//Query to check if username is available or not

	if(mysql_num_rows($check_for_username))
	{
		echo '1';//If there is a record match in the Database - Not Available
	}
	else
	{
		echo '0';//No Record Found - Username is available
	}	
}

}
?>