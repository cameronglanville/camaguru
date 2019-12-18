<?php
include_once "./header.php";
user_nlogged_redirect();
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/editor.css">
	<head>
		<title>Camagru</title>
	</head>
	<body>
		<!-- Hero Banner-->
		<div class="page-container">
			<div class="Level has-background-grey-dark has-text-centered">
				<div style = "display: inline;">
				<div class="dropdown is-hoverable hbutton">
					<div class="dropdown-trigger">
						<button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
							<span><?php echo $_SESSION["username"]?></span>
							<span class="icon is-small">
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</span>
						</button>
					</div>
					<div class="dropdown-menu" id="dropdown-menu4" role="menu">
						<div class="dropdown-content">
							<div class="dropdown-item">
								<aside class="menu">
									<ul class="menu-list">
										<li><a href = "../index.php">Home</a></li>
										<li><a href = "./viewProfile.php">Profile</a></li>
										<li><a class = "inactivelink">Editor</a></li>
										<li><a href = "../log/logout.php">Logout</a></li>
									</ul>
								</aside>
							</div>
						</div>
					</div>
				</div>
					<h1 class="title is-1 has-text-light">CAMAGRU</h1>
				</div>
				<p class="subtitle has-text-light">A social media app!</p>
			</div>
			<section class="section is-centered">
				<div class="columns">
					<div class="column"></div>
					<div class="column">
						<div class="webcam">
							<video id = "video" playsinline autoplay>Video unsupported</video>
						</div>
						<br />
						<div class="canvas_photo">
							<canvas id="canvas" width="640" height="480"></canvas>
						</div>
						<p>Webcam use</p>
						<button id="snap" class="btn">Capture</button>
					</div>
					<div class="column"></div>
					<!-- The data encoding type, enctype, MUST be specified as below
					<form enctype="multipart/form-data" action="__URL__" method="POST">
						-- MAX_FILE_SIZE must precede the file input field
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						<Name of input element determines name in $_FILES array
						-- Send this file: <input name="userfile" type="file" />
						<input type="submit" value="Send File" />
					</form> -->
				</div>
			</section>
			<footer class="footer has-background-grey">
				<div class="content has-text-centered has-text-light">
					<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
					<a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
					<a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
				</div>
			</footer>
		</div>
	</body>
<script>
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
// const btnDisplay = document.getElementById('btnDisplay');
// const btnDownload = document.getElementById('btnDownload');
// const errorMsgElement = document.getElementById('span#ErrorMsg');
var capture = 0;
const constraints = {
video: {
width: 640, height: 480
}
};

async function setup() {
	try {
		const stream = await navigator.mediaDevices.getUserMedia(constraints);
		window.stream = stream;
		video.srcObject = stream;
	}
	catch(e){
		errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
		alert('Something is wrong');
	}
}
setup();
var context = canvas.getContext('2d');
var img = new Image;
var	s_canvas;
snap.addEventListener("click",function(){
	capture = 1;
	context.drawImage(video, 0, 0, 640, 480);
});

btnDisplay.addEventListener("click", function () {
	const dataURI = canvas.toDataURL('image/jpeg', 1.0);
	console.log(dataURI);
});
</script>
</html>
