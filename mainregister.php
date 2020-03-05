<?php


$erro = false;
if (isset($_POST['signupmain'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$erro = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$erro = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$erro = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$erro = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$erro) {
		if(mysqli_query($conn, "INSERT INTO main(muser, memail, mpass) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
			$success_message = "Successfully Registered!";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
}
?>
	<div class="container" style="margin-top:5%;">
		<div class="forum">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<!-- <fieldset> -->

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($erro) echo $name; ?>" class="form-control" />
					<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
				</div>

				<div class="form-group">
					<label for="name">Email</label>
					<input type="text" name="email" placeholder="Email" required value="<?php if($erro) echo $email; ?>" class="form-control" />
					<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
				</div>

				<div class="form-group">
					<label for="name">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control" />
					<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
				</div>

				<div class="form-group">
					<label for="name">Confirm Password</label>
					<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
					<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
				</div>

				<div class="button" style="padding:2%;">
					<input type="submit" name="signupmain" value="Sign Up" class="btn btn-dark" />
				</div>
				<!-- </fieldset> -->
			</form>
			<span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
</div>
