<?php  
	session_start();
	require('PHP/registration-connection.php');
	require('PHP/adminpanel-components.php');
	require('PHP/operation.php');
	
	if(!isset($_SESSION['user']))
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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
    		<ul class="navbar-nav">
      			<li class="nav-item active">
        			<a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link text-light" href="login.php">Login</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link text-light" href="register.php">Register</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link text-light" href="userinfo.php">Profile</a>
      			</li>
    		</ul>
 	 	</div>
	</nav>
	<main>
		<div class="d-flex justify-content-center pt-4">
			<?php  
				buttonElement($btnid = "btn-read", $styleclass = "btn btn-primary", $text = "Browse Our Animal Database", $name = "read", $attr = "dat-toggle='tooltip' data-placement='bottom' title='Read'");
			?>
		</div>
		<div class="container d-flex">
			<?php  
				if(isset($_POST['read']))
							{
								$result = getData();

								if($result)
								{
									while($row = mysqli_fetch_assoc($result))
									{
										?>

										<div class="card">
  											<img class="card-img-top" src="<?php echo $row['animal_image']; ?>" alt="Card image cap">
  											<div class="card-body">
    											<h5 class="card-title"><?php echo $row['animal_name']; ?></h5>
  											</div>
  											<ul class="list-group list-group-flush">
  												<li class="list-group-item"><?php echo $row['animalID']; ?></li>
    											<li class="list-group-item"><?php echo $row['zipcode']; echo $row['location'];?></li>
    											<li class="list-group-item"><?php echo $row['animal_type']; ?></li>
    											<li class="list-group-item"><?php echo $row['animal_age']; ?></li>
    											<li class="list-group-item"><?php echo $row['phonenumber']; ?></li>
  											</ul>
										</div>

										<?php
									}
								}
							}

			?>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>