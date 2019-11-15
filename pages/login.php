<?php
	session_start();
?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="stylesheet" href="./style/index.css">
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
  </head>
  <body>
	<!-- Hero Banner-->
   	<div class="hero has-background-grey-dark has-text-centered">
    	<h1 class="title is-1 has-text-light">CAMAGRU</h1>
	 	<p class="subtitle has-text-light">A social media app!</p>
	</div>
	<section class="section is-centered">
	<!-- Main body -->
		<div class="columns">
			<!--Side Menu-->
			<div class="column" style = "width : 0% !important">
					<aside class="menu">
						<p class="menu-label">
							Profile
						</p>
						<ul class="menu-list">
							<li><a href = "pages/viewProfile.php">View Profile</a></li>
							<li><a>Logout</a></li>
						</ul>
						<p class="menu-label">
							Editing
						</p>
						<ul class="menu-list">
							<li><a>Editor</a></li>
						  	<li><a href = "./pages/gallery.php">View gallery</a></li>
						</ul>
					</aside>
			</div>
			<!-- END OF SIDE MENU -->
			<!-- LOGIN -->
			<div class="column">
				<div class="box has-text-centered has-background-grey-dark" id = "loginbox">
					<h1 class="title is-3 has-text-light">LOGIN</h1>
					<div class="field">
						<div class="control">
								<input class="input is-large" type="text" placeholder="Username">
						</div>
					</div>
					<div class="field">
						<div class="control">
							<input class="input is-large" type="password" placeholder="Password">
						</div>
					</div>
					<div>
						<button class="button" id = "loginbutton">Login</button>
						<a href="./pages/signup.php" class="button" id = "signupbutton">Sign up</a>
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
	<footer class="credits has-background-grey">
		<div class="content has-text-centered has-text-light">
			<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
		</div>
	</footer>
  </body>
</html>