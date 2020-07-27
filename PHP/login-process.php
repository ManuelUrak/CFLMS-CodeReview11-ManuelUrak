<?php  

	$error = array();

	$email = validate_input_email($_POST['email']);

	if(empty($email))
	{
		$error[] = "You forgot to enter your E-Mail-Address";
	}

	$password = validate_input_text($_POST['password']);

	if(empty($password))
	{
		$error[] = "You forgot to enter your password";
	}

	if(empty($error))
	{
		$query = "
			SELECT userID, firstName, lastName, nickname, email, password, profileImage, status
			FROM users WHERE email=?
		";

		$statement = mysqli_stmt_init($con);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 's', $email);
		mysqli_stmt_execute($statement);
		$result = mysqli_stmt_get_result($statement);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if(!empty($row))
		{
			if(password_verify($password, $row['password']))
			{
				if($row['status'] == 'admin')
				{
					$_SESSION['admin'] = $row['userID'];
					header('location: adminpanel.php');
				}
				else if($row['status'] == 'superadmin')
				{
					$_SESSION['superadmin'] = $row['userID'];
					header('location: superadminpanel.php');
				}
				else
				{
					$_SESSION['user'] = $row['userID'];
					header('location: index.php');
				}
				
				exit();
			}
		}
		else
		{
			print "Account not found, please register";
		}
	}
	else
	{
		echo "Please enter your login information";
	}

?>