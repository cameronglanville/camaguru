<?php
include_once "./header.php";
user_nlogged_redirect();

if(!isset($_GET['page']))
	header("Location: ./editor.php?page=1");

$imgamm = 5;

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
					<!-- Left Side Column -->
					<div class="column">
					
					<?PHP editor_images($imgamm, $_GET['page']);?>

					<br/>

					<nav>
						<div class="container" style="padding-bottom:100px !important">
							<div class="pagination is-centered" role="navigation" aria-label="pagination">
								<ul class="pagination-list">
									<li><a class="pagination-link" id="prevv">Prev</a></li>
									<li><span class="pagination-ellipsis">…</span></li>
									<li><a class="pagination-link has-text-white-ter has-background-black" aria-current="page"><?PHP echo $_GET['page']?></a></li>
									<li><span class="pagination-ellipsis">…</span></li>
									<li><a class="pagination-link" id="nextt">Next</a></li>
								</ul>
							</div>
						</div>
					</nav>

					</div>
					<div class="column is-half">
						<div class="webcam">
							<video id = "video" playsinline autoplay>Video unsupported</video>
						</div>
						<br />
						<div class="canvas_photo">
							<canvas id="canvas" width="640" height="480"></canvas>
						</div>
						<p>Webcam use</p>
						<button id="snap" class="button">Capture</button>
						<!-- <button onclick = "postimg()" id="postbtn" class="btn">Post</button> -->
						<button onclick="XHR()" id="btnDisplay" class="button" >Post</button>
						<form method="post" enctype="multipart/form-data">
						<div class="file">
							<label class="file-label">
								<input class="file-input" type="file" id="imageLoader" name="resume">
								<span class="file-cta">
								<span class="file-icon">
									<i class="fa fa-upload"></i>
								</span>
								<span class="file-label">
									Choose a file…
								</span>
								</span>
							</label>
						</div>
						</form>
					</div>
					<!-- Rightside Column -->
					<div class="column" id = "leftCol">
						<figure class="image sticker">
							<img src="../images/stickers/Dragon Circle.png" alt="Circular Dragon" onclick = "circular_dragon()">
						</figure>
						<figure class="image sticker">
							<img src="../images/stickers/Dragon Gold.png" alt="Gold Dragon" onclick = "gold_dragon()">
						</figure>
						<figure class="image sticker">
							<img src="../images/stickers/Poo Emoji.png" alt="Poo Emoji" onclick = "poo_emoji()">
						</figure>
						<figure class="image sticker">
							<img src="../images/stickers/kawaii blush.png" alt="Kawaii Blush" onclick = "kawaii_blush()">
						</figure>
						<figure class="image sticker">
							<img src="../images/stickers/cat thumbs.png" alt="Cat Thumbs" onclick = "cat_thumbs()">
						</figure>
					</div>
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
		const post = document.getElementById('btnDisplay');
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
		});

		function delimg(imgid){
			var xhre = new XMLHttpRequest();
			xhre.open("POST", "imgdel.php");
			xhre.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var str = "imgid=" + imgid;
			xhre.send(str);
			setTimeout(location.reload.bind(location), 0.5);
		}

		function XHR()
		{ 
			if (capture == 1){
				img = canvas.toDataURL('image/jpeg', 1.0);
				var xhre = new XMLHttpRequest();
				xhre.open("POST", "post.php");
				xhre.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var str = "action=upload&sub_action=canvas&img=" + img;
				xhre.send(str);
				setTimeout(location.reload.bind(location), 0.5);
			}
		}

		var imageLoader = document.getElementById('imageLoader');
    	if (imageLoader) {
			imageLoader.addEventListener('change', handleImage, false);
		}
		// var canvas = document.getElementById('imageCanvas');
		// var ctx = canvas.getContext('2d');
		function handleImage(e){
	    var reader = new FileReader();
    	reader.onload = function(event){
        	var img = new Image();
        	img.onload = function(){
    	        // canvas.width = img.width;
        	    // canvas.height = img.height;
				capture = 1;
        	    context.drawImage(img, 0, 0, 640, 480);
        		}
        	img.src = event.target.result;
    		}
    	reader.readAsDataURL(e.target.files[0]);     
		}

		function circular_dragon() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "../images/stickers/Dragon Circle.png";
				context.drawImage(drawing,220,140,200,200);
			}
		}
		function gold_dragon() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "../images/stickers/Dragon Gold.png";
				context.drawImage(drawing,400,50,225,400);
			}
		}
		function poo_emoji() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "../images/stickers/Poo Emoji.png";
				context.drawImage(drawing,400,300,150,150);
			}
		}
		function kawaii_blush() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "../images/stickers/kawaii blush.png";
				context.drawImage(drawing,200,160,220,220);
			}
		}
		function cat_thumbs() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "../images/stickers/cat thumbs.png";
				context.drawImage(drawing,400,250,220,220);
			}
		}

		document.getElementById ("prevv").addEventListener ("click", page_p, false);
		document.getElementById ("nextt").addEventListener ("click", page_n, false);
		function page_p()
		{
			window.location.href = "<?PHP paging(-1, $imgamm);?>";
		}
		function page_n()
		{
			window.location.href = "<?PHP paging(1, $imgamm);?>";
		}

	</script>
</html>
