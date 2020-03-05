<?php
ob_start();

include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: dashboard.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result3 = mysqli_query($conn, "SELECT * FROM main WHERE memail = '" . $email. "' and mpass = '" . md5($password). "'");//selecting from row of the email
if($row=mysqli_fetch_array($result3)) {
		$_SESSION['user_id'] = $row['mid'];// allocating to username from table
		$_SESSION['user_name'] = $row['muser'];
		header("Location: index.php");
		}
	else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images\logo.png">
		<title>Login</title>
	<link rel="stylesheet" href="css\mainregister.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript" src="script/ajax.js"></script>
</head>

<body style="background-color:white; color:black;">

	<div class="container">
		<div class="image">
			<a href="index.php"><img src="images\datsme.png" alt="logo" height="20%" style="margin-bottom:2%;"></a>
			<h2>Login</h2>
		</div>
		<div class="forum">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<div class="form-group">
					<label for="name">Email</label>
					<input type="text" name="email" placeholder="Your Email" required class="form-control" />
				</div>
				<div class="form-group">
					<label for="name">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control" />
				</div>
				<div class="button" style="padding:2%;">
					<input type="submit" name="login" value="Login" class="btn btn-dark" />
				</div>
				<!-- </fieldset> -->
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
