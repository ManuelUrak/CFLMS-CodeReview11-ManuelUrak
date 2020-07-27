<?php  

	require_once('admin-db-connect.php');
	require_once('adminpanel-components.php');

	function getData()
	{
		$sql = "
			SELECT * FROM animals
		";

		$result = mysqli_query($GLOBALS['con'], $sql);

		if(mysqli_num_rows($result) > 0)
		{
			return $result;
		}
	}

?>