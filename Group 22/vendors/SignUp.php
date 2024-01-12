<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';

if (isset($_POST['form1'])) {
	$email = $_POST['email'];

	$q2 = "SELECT * FROM tbl_vendor WHERE `email`='" . $email . "'";
	$statement2 = $coon->query($q2);
	$n = $statement2->num_rows;

	if ($n == 0) {

		$v = 1;
		if (empty($_POST['email'])) {
			$error_message = 'Email can not be empty<br>';
			$v = 0;
		}
		if (empty($_POST['password']) || empty($_POST['re_password'])) {
			$error_message = 'Password can not be empty<br>';
			$v = 0;
		}
		if ($_POST['password'] != $_POST['re_password']) {
			$error_message = 'Password not match<br>';
			$v = 0;
		}
		if (empty($_POST['name'])) {
			$error_message = 'Name can not be empty<br>';
			$v = 0;
		}
		if (empty($_POST['S_name'])) {
			$error_message = 'Shop Name can not be empty<br>';
			$v = 0;
		}
		if (empty($_POST['mobile'])) {
			$error_message = 'Mobile can not be empty<br>';
			$v = 0;
		}
		if (empty($_POST['address'])) {
			$error_message = 'Address can not be empty<br>';
			$v = 0;

		} else if ($v == 1) {

			// $email = strip_tags($_POST['email']);
			// $password = strip_tags($_POST['password']);


			$password = $_POST['password'];
			$name = $_POST['name'];
			$S_name = $_POST['S_name'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];

			$q = "INSERT INTO tbl_vendor (`name`,`email`,`phone`,`shopname`,`address`,`password`,`status`,`photo`) VALUES ('" . $name . "','" . $email . "','" . $mobile . "','" . $S_name . "','" . $address . "','" . $password . "','Active','user-1.png')";
			$statement = $coon->query($q);
			$success_message = 'Registration Successfully Plaese Login your Shop';


		}

	} else {
		$error_message = 'Earliday registered<br>';
	}
}

if (isset($_POST['form2'])) {
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign Up</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">

	<link rel="stylesheet" href="style.css">
</head>

<body class="hold-transition login-page sidebar-mini">

	<div class="login-box">
		<div class="login-logo">
			<b>Vendor Panel</b>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Register Your Shop</p>

			<?php
			if ((isset($error_message)) && ($error_message != '')):
				echo '<div class="error">' . $error_message . '</div>';
			endif;
			?>
			<?php
			if ((isset($success_message)) && ($success_message != '')):
				echo "<div class='success' style='padding: 10px;margin-bottom:20px;color:green;'>" . $success_message . "</div>";
			endif;
			?>

			<form action="" method="post">
				<?php $csrf->echoInputField(); ?>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Your Name" name="name" type="text" autocomplete="off"
						autofocus>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Shop Name" name="S_name" type="text" autocomplete="off"
						autofocus>
				</div>
				<div class="form-group has-feedback">
					<select class="form-select setselect" aria-label="Default select example">
						<option selected>You need</option>
						<option value="1">Buy</option>
						<option value="2">Sell</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off"
						autofocus>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Mobile" name="mobile" type="text" autocomplete="off"
						autofocus>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Address" name="address" type="text" autocomplete="off"
						autofocus>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Password" name="password" type="password"
						autocomplete="off" value="">
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Re Enter Password" name="re_password" type="password"
						autocomplete="off" value="">
				</div>
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-success btn-block btn-flat login-button" name="form1"
							value="Sign Up">
					</div>
				</div>
			</form>
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4" style="margin-top: 10px;">
						<input type="submit" class="btn btn-success btn-block btn-flat login-button2" name="form2"
							value="Log In">
					</div>
				</div>
			</form>
		</div>
	</div>


	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/select2.full.min.js"></script>
	<script src="js/jquery.inputmask.js"></script>
	<script src="js/jquery.inputmask.date.extensions.js"></script>
	<script src="js/jquery.inputmask.extensions.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/icheck.min.js"></script>
	<script src="js/fastclick.js"></script>
	<script src="js/jquery.sparkline.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<script src="js/app.min.js"></script>
	<script src="js/demo.js"></script>

</body>

</html>