<?php  

	require_once('registration-connection.php');
	require_once('superadminpanel-components.php');

	if(isset($_POST['create']))
	{
		createData();
	}

	if(isset($_POST['update']))
	{
		updateData();
	}

	if(isset($_POST['delete']))
	{
		deleteRecord();
	}

	function createData()
	{
		$firstname = textboxValue($value = "firstName");
		$lastname = textboxValue($value = "lastName");
		$nickname = textboxValue($value = "nickname");
		$email = textboxValue($value = "email");
		$password = textboxValue($value = "password");
		$status = textboxValue($value = "status");

		if($firstname && $lastname && $nickname && $email && $password && $status)
		{
			$sql = "
				INSERT INTO users (firstName, lastName, nickname, email, password, status)
				VALUES 
				(
					'$firstname', '$lastname', '$nickname', '$email', '$password', '$status'
				)
			";

			if(mysqli_query($GLOBALS['con'], $sql))
			{
				textNode($classname = "success", $msg = "Record Successfully Inserted");
			}
			else
			{
				echo "Error";
			}
		}
		else
		{
			textNode($classname = "error", $msg = "Provide Data In The Textbox");
		}
	}

	function textboxValue($value)
	{
		$textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));

		if(empty($textbox))
		{
			return false;
		}
		else
		{
			return $textbox;
		}
	}

	function textNode($classname, $msg)
	{
		$element = "<h6 class='$classname'>$msg</h6>";

		echo $element;
	}

	function getData()
	{
		$sql = "
			SELECT userID, firstName, lastName, nickname, email, password, status FROM users
		";

		$result = mysqli_query($GLOBALS['con'], $sql);

		if(mysqli_num_rows($result) > 0)
		{
			return $result;
		}
	}

	function updateData()
	{
		$userid = textboxValue($value = "userID");
		$firstname = textboxValue($value = "firstName");
		$lastname = textboxValue($value = "lastName");
		$nickname = textboxValue($value = "nickname");
		$email = textboxValue($value = "email");
		$password = textboxValue($value = "password");
		$status = textboxValue($value = "status");

		if($firstname && $lastname && $nickname && $email && $password && $status)
		{
			$sql = "
				UPDATE users
				SET 
				firstName='$firstname',
				lastName='$lastname',
				nickname='$nickname',
				email='$email',
				password='$password',
				status='$status'
				WHERE userID='$userid'
			";

			if(mysqli_query($GLOBALS['con'], $sql))
			{
				textNode($classname = "success", $msg = "Data Successfully Updated");
			}
			else
			{
				textNode($classname = "error", $msg = "Unable To Update Data");
			}
		}
		else
		{
			textNode($classname = "error", $msg = "Select Data");
		}
	}

	function deleteRecord()
	{
		$userid = (int)textboxValue($value = "userID");

		$sql = "
			DELETE FROM users WHERE userID=$userid
		";

		if(mysqli_query($GLOBALS['con'], $sql))
		{
			textNode($classname = "success", $msg = "Record Deleted Successfully");
		}
		else
		{
			textNode($classname = "error", $msg = "Unable To Delete Record");
		}
	}

?>