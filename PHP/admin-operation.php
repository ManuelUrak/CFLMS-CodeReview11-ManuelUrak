<?php  

	require_once('admin-db-connect.php');
	require_once('adminpanel-components.php');

	$con = createTable();

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
		$animalname = textboxValue($value = "animal_name");
		$zipcode = textboxValue($value = "zipcode");
		$location = textboxValue($value = "location");
		$animaltype = textboxValue($value = "animal_type");
		$animalage = textboxValue($value = "animal_age");
		$phonenumber = textboxValue($value = "phone_number");
		$animalimage = textboxValue($value = "animal_image");

		if($animalname && $zipcode && $location && $animaltype && $animalage && $phonenumber && $animalimage)
		{
			$sql = "
				INSERT INTO animals (animal_name, zipcode, location, animal_type, animal_age, phone_number, animal_image)
				VALUES 
				(
					'$animalname', '$zipcode', '$location', '$animaltype', '$animalage', '$phonenumber', '$animalimage'
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
			SELECT * FROM animals
		";

		$result = mysqli_query($GLOBALS['con'], $sql);

		if(mysqli_num_rows($result) > 0)
		{
			return $result;
		}
	}

	function updateData()
	{
		$animalid = textboxValue($value = "animalID");
		$animalname = textboxValue($value = "animal_name");
		$zipcode = textboxValue($value = "zipcode");
		$location = textboxValue($value = "location");
		$animaltype = textboxValue($value = "animal_type");
		$animalage = textboxValue($value = "animal_age");
		$phonenumber = textboxValue($value = "phone_number");
		$animalimage = textboxValue($value = "animal_image");

		if($animalname && $zipcode && $location && $animaltype && $animalage && $phonenumber && $animalimage)
		{
			$sql = "
				UPDATE animals
				SET 
				animal_name='$animalname',
				zipcode='$zipcode',
				location='$location',
				animal_type='$animaltype',
				animal_age='$animalage',
				phone_number='$phonenumber',
				animal_image='$animalimage'
				WHERE animalID='$animalid'
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
		$animalid = (int)textboxValue($value = "animalID");

		$sql = "
			DELETE FROM animals WHERE animalID=$animalid
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