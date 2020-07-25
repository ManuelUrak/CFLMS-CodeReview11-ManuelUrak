<?php  

	session_start();
	include "PHP/register-operation.php";
	$user = array();
	require('PHP/registration-connection.php');

	if(isset($_SESSION['userID']))
	{
		$user = get_user_info($con, $_SESSION['userID']);
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require('PHP/login-process.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Stylesheets/login-style.css">
</head>
<body>

	<main id="main-area">
		<section id="login-form">
			<div class="row m-0">
				<div class="col-lg-4 offset-lg-2">
					<div class="text-center pb-5">
						<h1 class="login-title text-dark">Login</h1>
						<p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy PetAdopt</p>
						<span class="font-ubuntu text-black-50">Register <a href="register.php">here</a></span>
					</div>
					<div class="upload-profile-image d-flex justify-content-center pb-5">
						<div class="text-center">
							<img class="img rounded-circle" style="width:200px; height: 200px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : 'Assets/default.jpg'; ?>" alt="profile">
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<form action="login.php" method="post" enctype="multipart/form-data" id="logForm">
							<div class="form-row my-4">
								<div class="col">
									<input type="email" required name="email" id="email" class="form-control" placeholder="E-Mail*" autocomplete="off">
								</div>
							</div>
							<div class="form-row my-4">
								<div class="col">
									<input type="password" required name="password" id="password" class="form-control" placeholder="Password*" autocomplete="off">
								</div>
							</div>
							<div class="submit-btn text-center my-5">
								<button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>