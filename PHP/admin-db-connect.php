<?php  

	function createTable()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cr11_manuel_petadopt";

		$con = mysqli_connect($servername, $username, $password, $dbname);

		if(!$con)
		{
			die("Connection Failed: " . mysqli_connect_error());
		}
		
		if($con)
		{
			$con = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "
				CREATE TABLE IF NOT EXISTS animals 
				(
					animalID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					animal_name VARCHAR(128) NOT NULL,
					zipcode INT(6) NOT NULL,
					location VARCHAR(64),
					animal_type VARCHAR(64),
					animal_age INT(2),
					phone_number VARCHAR(256) NOT NULL,
					animal_image VARCHAR(128)
				);
			";

			if(mysqli_query($con, $sql))
			{
				return $con;
			}
			else
			{
				echo "Table Creation Failed";
			}
		}
		else
		{
			echo "Server error" . mysqli_error($con);
		}
	}

?>