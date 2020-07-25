<?php  

	require('register-operation.php');

	$error = array();

	$firstName = validate_input_text($_POST['firstName']);

	if(empty($firstName))
	{
		$error[] = "You forgot to enter your first name";
	}

	$lastName = validate_input_text($_POST['lastName']);

	if(empty($lastName))
	{
		$error[] = "You forgot to enter your last name";
	}

	$nickname = validate_input_text($_POST['nickname']);

	if(empty($nickname))
	{
		$error[] = "You forgot to enter a nickname";
	}

	$email = validate_input_email($_POST['email']);

	if(empty($email))
	{
		$error[] = "You forgot to enter your E-Mail-Address";
	}

	$password = validate_input_text($_POST['password']);

	if(empty($password))
	{
		$error[] = "You forgot to enter a password";
	}

	$confirm_pwd = validate_input_text($_POST['confirm_pwd']);

	if(empty($confirm_pwd))
	{
		$error[] = "You forgot to confirm your password";
	}

	$files = $_FILES['profileUpload'];
	$profileImage = upload_profile($path = "./Assets/ProfileImages/", $files);

	if(empty($error))
	{
		$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
		require('registration-connection.php');

		$query = "
			INSERT INTO users (userID, firstName, lastName, nickname, email, password, profileImage, registerDate)
			VALUES
			('', ?, ?, ?, ?, ?, ?, NOW())";

		$statement = mysqli_stmt_init($con);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'ssssss', $firstName, $lastName, $nickname, $email, $hashed_pass, $profileImage);
		mysqli_stmt_execute($statement);

		if(mysqli_stmt_affected_rows($statement) == 1)
		{
			session_start();
			$_SESSION['userID'] = mysqli_insert_id($con);
		    header('location: login.php');
			exit();
		}
		else
		{
			print "An error occured";
		}
	}
	else
	{
		echo 'not validated';
	}

?>