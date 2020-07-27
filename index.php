<?php  
	session_start();
	require('PHP/registration-connection.php');
	require('PHP/adminpanel-components.php');
	require('PHP/admin-operation.php');

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
	<title>Home</title>
	<script src="https://kit.fontawesome.com/969b0d4b22.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Stylesheets/style.css">
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
    		</ul>
 	 	</div>
	</nav>
	<main>
		<div class="container text-center">
			<div class="d-flex justify-content-center pt-4 pb-4">
				<form method="post" class="w-50">
					<div class="d-flex justify-content-center">
						<?php  

							buttonElement($btnid = "btn-read", $styleclass = "btn btn-primary", $text = "Browse our animal database", $name = "read", $attr = "dat-toggle='tooltip' data-placement='bottom' title='Read'");
							
						?>
					</div>
				</form>
			</div>
			<div class="d-flex flex-wrap justify-content-center">
				<?php  

					if(isset($_POST['read']))
					{
						$result = getData();

						if($result)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								?>
											
								<div class="card m-2 bg-dark" style="width: 25%;">
  									<img class="card-img-top" src="<?php echo $row['animal_image']; ?>" style="width: 250px; height: 250px;">
  									<div class="card-body bg-dark">
    									<h5 class="card-title text-light"><?php echo $row['animal_name']; ?></h5>
  									</div>
  									<ul class="list-group list-group-flush bg-dark">
									    <li class="list-group-item">Type :<?php echo $row['animal_type']; ?></li>
									    <li class="list-group-item">Age: <?php echo $row['animal_age']; ?></li>
									    <li class="list-group-item">ZIP: <?php echo $row['zipcode']; ?></li>
									    <li class="list-group-item">Location: <?php echo $row['location']; ?></li>
									    <li class="list-group-item"><i class="fas fa-phone"></i><?php echo $row['phone_number']; ?></li>
									</ul>
								</div>

								<?php
							}
						}
					}

				?>		
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>