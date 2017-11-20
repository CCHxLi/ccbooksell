
	<?php

	session_start();

	include('connect.php');


	$seller_name = $_POST['sellername'];
	$seller_email_address = $conn->escape_string($_POST['email_address']); 
 	$first_user_password = $conn->escape_string(password_hash($_POST['first_password'], PASSWORD_BCRYPT));
	$second_user_password = $conn->escape_string(password_hash($_POST['second_password'], PASSWORD_BCRYPT));
	$hash = $conn->escape_string( md5( rand(0,1000) ) );

	$sql = "INSERT INTO tblseller(seller_Name,seller_Email_Address,seller_Password,seller_ID,hash)
				VALUES ('".$seller_name."','".$seller_email_address."','".$first_user_password."','".$hash."',Default)";
	$result=$conn->query($sql);


	if ($result) {
		echo "win";
		
		$_SESSION['email'] = $_POST['email_address'];
		$_SESSION['name'] = $_POST['sellername'];

		header("location: success.php");
	}
	else
	{
		echo "failed to sign up, it might be the email address or the name has been taken, try something else please.";
		print_r($conn->error);
	}
	$conn->close();
?>





