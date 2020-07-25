<?php  

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require('PHP/register-process.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Stylesheets/registration-style.css">
</head>
<body>
	
	<main id="main-area">
		<section id="register">
			<div class="row m-0">
				<div class="col-lg-4 offset-lg-2">
					<div class="text-center pb-5">
						<h1 class="login-title text-dark">Register</h1>
						<p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy PetAdopt</p>
						<span class="font-ubuntu text-black-50">I already have an <a href="login.php" title="Login">Account</a></span>
					</div>
					<div class="upload-profile-image d-flex justify-content-center pb-5">
						<div class="text-center">
							<div class="d-flex justify-content-center">
								<img class="camera-icon" src="Assets/camera.png" alt="camera">
							</div>
							<img src="Assets/default.jpg" style="width: 200px; height: 200px;" class="img rounded-circle" alt="profile">
							<small class="form-text text-black-50">Upload a profile picture</small>
							<input type="file" form="regForm" class="form-control-file" name="profileUpload" id="upload-profile">
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<form action="register.php" method="post" enctype="multipart/form-data" id="regForm">
							<div class="form-row">
								<div class="col">
									<input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
								</div>
								<div class="col">
									<input type="text" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
								</div>
							</div>
							<div class="form-row my-4">
								<div class="col">
									<input type="text" value="<?php if(isset($_POST['nickname'])) echo $_POST['nickname']; ?>" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
								</div>
							</div>
							<div class="form-row my-4">
								<div class="col">
									<input type="email" required name="email" id="email" class="form-control" placeholder="*E-Mail Address">
								</div>
							</div>
							<div class="form-row my-4">
								<div class="col">
									<input type="password" required name="password" id="password" class="form-control" placeholder="*Password">
								</div>
							</div>
							<div class="form-row my-4">
								<div class="col">
									<input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="*Confirm Password">
									<small id="confirm_error" class="text-danger"></small>
								</div>
							</div>
							<div class="form-check form-check-inline">
								<input type="checkbox" name="agreement" class="form-check-input" required>
								<label for="agreement" class="form-check-label font-ubuntu text-black-50">
									I agree on the <a href="Assets/termsandconditions.pdf">terms and conditions</a>(*)
								</label>
							</div>
							<div class="submit-btn text-center my-5">
								<button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Register</button>
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
	<script src="Scripts/registration.js"></script>
</body>
</html>