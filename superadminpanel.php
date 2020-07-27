<?php  

	session_start();
	require('PHP/registration-connection.php');
	require('PHP/superadminpanel-components.php');
	require('PHP/superadmin-operation.php');

	if(!isset($_SESSION['superadmin']))
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
	<title>Superadminpanel</title>
	<script src="https://kit.fontawesome.com/969b0d4b22.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Stylesheets/superadminpanel-style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
    		<ul class="navbar-nav">
      			<li class="nav-item active">
        			<a class="nav-link text-light" href="adminpanel.php">Adminpanel <span class="sr-only">(current)</span></a>
      			</li>
    		</ul>
  		</div>
	</nav>
	<main>
		<div class="container text-center pt-2">
			<h1 class="py-4 bg-dark text-light"><i class="fa fa-briefcase" aria-hidden="true"></i> Superadminpanel</h1>
			<div class="d-flex justify-content-center">
				<form method="post" class="w-50">
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-id-badge'></i>", $placeholder = "User ID", $name = "userID", $value = "");
						?>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-id-badge'></i>", $placeholder = "Firstname", $name = "firstName", $value = "");
						?>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-id-badge'></i>", $placeholder = "Last Name", $name = "lastName", $value = "");
						?>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-id-badge'></i>", $placeholder = "Nickname", $name = "nickname", $value = "");
						?>
					</div>
					<div class="row pt-2">
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-envelope'></i>", $placeholder = "E-Mail-Address", $name = "email", $value = "");
							?>
						</div>
						<div class="col">
							<?php  
								inputElement($icon = "<i class='fas fa-key'></i>", $placeholder = "Password", $name = "password", $value = "");
							?>
						</div>
					</div>
					<div class="pt-2">
						<?php  
							inputElement($icon = "<i class='fas fa-user-plus'></i>", $placeholder = "Status", $name = "status", $value = "");
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
							<th>First Name</th>
							<th>Last Name</th>
							<th>Nickname</th>
							<th>E-Mail-Address</th>
							<th>Password</th>
							<th>Status</th>
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
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['userID']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['firstName']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['lastName']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['nickname']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['email']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['password']; ?></td>
												<td data-id="<?php echo $row['userID'] ?>"><?php echo $row['status']; ?></td>
												<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['userID'] ?>"></i></td>
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
	<script src="Scripts/superadmin.js"></script>

</body>
</html>