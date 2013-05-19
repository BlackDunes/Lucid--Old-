<?php 

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

$username = trim($_POST["username"]);
$firstname = trim($_POST["firstname"]);
$firstname = str_replace("'", "\'", $firstname);
$lastname = trim($_POST["lastname"]);
$lastname = str_replace("'", "\'", $lastname);
$prefix = $_POST["prefix"];
$email = trim($_POST["email"]);
$password = $_POST["pass"];
$regdate = date('Y-m-d');

$salt = rand_string( 30 );;
$secure = $password . $salt;
$passcode = hash(md5 , $secure);

echo '
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<div class="pagetitle">

Register</div>';

$link = mysql_connect($sqlhostname, $sqlusername , $sqlpassword);
	if (!$link) exit("Could not connect to MySQL");
	if (!mysql_select_db($sqldatabase)) {
		echo "Could not select DB. Error: ", mysql_error();
		exit;
	}
	
	if ($link) {
	
	$db_name = $sqldatabase;
		
		$table_name = 'teachers';
		
		$query = "INSERT INTO $table_name VALUES ('', '$username', '$firstname', '$lastname', '1', '', '$email', '$prefix', '', '', '', '', 'default', '2',  '0', '$passcode', '$salt', '$regdate', '$regdate')";
		
		if (mysql_query($query, $link)) {
		
			echo 'Your account has been created!<br /><br />
			<button id="gologin" class="bigselect">Log In</button>
			<script>
    			$("#gologin").click(function () {
    				document.location.href = "index.php?p=tlogin1";
    			});
    		</script>
';
			
		
		} else {
		
			echo('There was an error:' . mysql_error());
			exit;
			
		}
		
}

?>

