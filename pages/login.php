<?php
include_once './header.php';
user_logged_redirect();
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/login.css">
	<head>
		<title>Camagru</title>
	</head>
	<body>
	<!-- Hero Banner-->
	<div class="hero has-background-grey-dark has-text-centered">
		<div style = "display: inline;">
			<a href = "../index.php" class = "button is-outlined hbutton">Home</a>
			<h1 class="title is-1 has-text-light">CAMAGRU</h1>
		</div>
		<p class="subtitle has-text-light">A social media app!</p>
	</div>
	<section class="section is-centered">
	<!-- Main body -->
		<div class="columns">
			<!--Side Menu-->
			<div class="column" style = "width : 0% !important">
			</div>
			<!-- END OF SIDE MENU -->
			<!-- LOGIN -->
			<div class="column">
				<div style = "padding : 0px 0px 20px 0px">
				<div class="box has-text-centered has-background-grey-dark" id = "loginbox">
					<h1 class="title is-3 has-text-light">LOGIN</h1>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="field">
							<div class="control">
									<input class="input is-large" type="text" name = "log_name" placeholder="Username">
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input class="input is-large" type="password" name = "log_pass"placeholder="Password">
							</div>
						</div>
						<div>
							<button class="button" id = "loginbutton" name = "login" value = "login">Login</button>
							<a href="./signup.php" class="button" id = "signupbutton">Sign up</a>
						</div>
						<div>
							<a href="./recoverPass.php" class="button" id = "forgotbutton">Forgot Password</a>
						</div>
						<div>
						</div>
					</form>
				</div>
				<div class = "box-padding">
					<?php
					if (isset($_POST["login"]))
					{
						if(valid_login($_POST['log_name'], $_POST['log_pass'])){
							$_SESSION["username"] = $_POST["log_name"];
							$_SESSION["user_email"] = find_specified("email", "users", "username", $_SESSION["username"]);
							$_SESSION["notifications"] = find_specified("notifications", "users", "username", $_SESSION["username"]);
							$_SESSION["id"] = find_specified("userid", "users", "username", $_SESSION["username"]);
							header("Location: ../index.php");
						}
						else
						{
							notify('Invalid username password combination');
						}
					}
					?>
				</div>
			</div>
			</div>
			<!-- END OF LOGIN -->
			<div class="column"></div>
		</div>
		<!-- <div class="box has-background-grey">
			<h1 class="title is-3">Login</h1>
		</div> -->
	</section>
	<footer class="credits footer has-background-grey">
		<div class="content has-text-centered has-text-light">
			<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
		</div>
	</footer>
  </body>
</html>
