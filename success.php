<?php

	session_start();
	include ('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
</head>
<body>
	<p>
		Welcome 
		<?php
			$sellername = $_SESSION['name'];
			print_r($sellername);
		?>
	</p>
</body>
</html>