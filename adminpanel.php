<?php  
	session_start();
	require('PHP/registration-connection.php');
	require('PHP/adminpanel-components.php');
	require('PHP/admin-operation.php');

	if(!isset($_SESSION['admin']))
	{
		header('location: login.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Adminpanel</title>
	<script src="https://kit.fontawesome.com/969b0d4b22.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Stylesheets/adminpanel-style.css">
</head>
<body>
	
	<main>
		<div class="container text-center">
			<h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-briefcase" aria-hidden="true"></i> Adminpanel</h1>
			<div class="d-flex justify-content-center">
				<form method="post" class="w-50">
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-id-badge'></i>", $placeholder = "Animal ID", $name = "animalID", $value = "");
						?>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-user'></i>", $placeholder = "Animal Name", $name = "animal_name", $value = "");
						?>
					</div>
					<div class="row pt-2">
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-globe'></i>", $placeholder = "ZIP-Code", $name = "zipcode", $value = "");
							?>
						</div>
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-location-arrow'></i>", $placeholder = "Location", $name = "location", $value = "");
							?>
						</div>
					</div>
					<div class="row pt-2">
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-question'></i>", $placeholder = "Animal Type", $name = "animal_type", $value = "");
							?>
						</div>
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-calendar'></i>", $placeholder = "Animal Age", $name = "animal_age", $value = "");
							?>
						</div>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-phone'></i>", $placeholder = "Phone Number", $name = "phone_number", $value = "");
						?>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-image'></i>", $placeholder = "Enter Image URL", $name = "animal_image", $value = "");
						?>
					</div>
					<div class="d-flex justify-content-center">
						<?php  
							buttonElement($btnid = "btn-create", $styleclass = "btn btn-success", $text = "<i class='fas fa-plus'></i>", $name = "create",$attr = "dat-toggle='tooltip' data-placement='bottom' title='Create'" );

							buttonElement($btnid = "btn-read", $styleclass = "btn btn-primary", $text = "<i class='fas fa-sync'></i>", $name = "read", $attr = "dat-toggle='tooltip' data-placement='bottom' title='Read'");

							buttonElement($btnid = "btn-update", $styleclass = "btn btn-light border", $text = "<i class='fas fa-pen-alt'></i>", $name = "update", $attr = "dat-toggle='tooltip' data-placement='bottom' title='Update'");

							buttonElement($btnid = "btn-delete", $styleclass = "btn btn-danger", $text = "<i class='fas fa-trash-alt'></i>", $name = "delete", $attr = "dat-toggle='tooltip' data-placement='bottom' title='Delete'");
						?>
					</div>
				</form>
			</div>
			<div class="d-flex table-data">
				<table class="table table-striped table-dark">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>ZIP-Code</th>
							<th>Location</th>
							<th>Type</th>
							<th>Age</th>
							<th>Phone</th>
							<th>Image</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody id="tbody">
						<?php  

							if(isset($_POST['read']))
							{
								$result = getData();

								if($result)
								{
									while($row = mysqli_fetch_assoc($result))
									{
										?>
											
											<tr>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['animalID']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['animal_name']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['zipcode']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['location']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['animal_type']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['animal_age']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><?php echo $row['phone_number']; ?></td>
												<td data-id="<?php echo $row['animalID'] ?>"><img src="<?php echo $row['animal_image']; ?>"></td>
												<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['animalID'] ?>"></i></td>
											</tr>

										<?php
									}
								}
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="Scripts/admin.js"></script>

</body>
</html>