<?php  

	function validate_input_text($textValue)
	{
		if(!empty($textValue))
		{
			$trim_text = trim($textValue);
			$sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);

			return $sanitize_str;
		}

		return '';
	}

	function validate_input_email($emailValue)
	{
		if(!empty($emailValue))
		{
			$trim_text = trim($emailValue);
			$sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);

			return $sanitize_str;
		}

		return '';
	}

	function upload_profile($path, $file)
	{
	    $targetDir = $path;
	    $default = "default.jpg";
	    $filename = basename($file['name']);
	    $targetFilePath = $targetDir . $filename;
	    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

	    if(!empty($filename))
	    {
	        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

	        if(in_array($fileType, $allowType))
	        {

	            if(move_uploaded_file($file['tmp_name'], $targetFilePath))
	            {
	                return $targetFilePath;
	            }
	        }
	    }

	    return $path . $default;
	}

	function get_user_info($con, $userID)
	{
		$query = "
			SELECT firstName, lastName, nickname, email, profileImage
			FROM users WHERE userID=?
		";

		$statement = mysqli_stmt_init($con);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'i', $userID);
		mysqli_stmt_execute($statement);
		$result = mysqli_stmt_get_result($statement);
		$row = mysqli_fetch_array($result);

		if(empty($row))
		{
			return false;
		}
		else
		{
			return $row;
		}
	}

?>