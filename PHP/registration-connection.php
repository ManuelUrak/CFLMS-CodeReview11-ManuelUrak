<?php  

	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASSWORD = "";
	$DB_NAME = "cr11_manuel_petadopt";

	try
	{
		$con = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
		mysqli_set_charset($con, $charset = 'utf8');
	}
	catch(Exception $ex)
	{
		print "An error occured. Message: " . $ex->getMessage();
	}
	catch(Error $e)
	{
		print "The server seem to be down. Please try again later";
	}

?>