
<?php
 session_start();
?>


<HTML>
	<Head>
	<title>Camagru</title>
	<link rel = "stylesheet" type = "text/css" href = "style/index.css"/>
	</head>
	<body>
			<!-- <nav id = "side-menu" class = "side-nav">
				<a href='#' class = btn-close onClick  = "closeSlideMenu()">&times;</a>  
				<a href='#'>Home</a>
				<a href='#'>Gallery</a>
				<a href='#'>Profile</a>
				<a href='#'>Logout</a>
			</nav> -->
			<div class = navbar>
				<span class = open-slide>
					<a href= "#" onClick = "openSlideMenu()">
						<svg width="30" height = "30">
							<path d="M0,5 30,5" stroke = '#fff'
							stroke-width = "5"/>
							<path d="M0,14 30,14" stroke = '#fff'
							stroke-width = "5"/>
							<path d="M0,23 30,23" stroke = '#fff'
							stroke-width = "5"/>
						</svg>
					</a>
					<h1 id = "title">Camagru Name</h1>
				</span>
				<!-- <ul class = "navbar-nav">
				<li><a href='#'>Home</a></li>
				<li><a href='#'>Gallery</a></li>
				<li><a href='#'>Profile</a></li>
				<li><a href='#'>Logout</a></li>
				</ul> -->
			</div>
			<div id = "side-menu" class = "side-nav">
				<a href='#' class = btn-close onClick  = "closeSlideMenu()">&times;</a>  
				<a href='#'>Home</a>
				<a href='#'>Gallery</a>
				<a href='#'>Profile</a>
				<a href='#'>Logout</a>
			</div>
			<div id = "login">
				<h4 class="ltitle">LOGIN</h4>
			</div>
			<script>
				function openSlideMenu()
				{
					document.getElementById('side-menu').style.width = '250px';
				}
				function closeSlideMenu()
				{
					document.getElementById('side-menu').style.width = '0px';
				}
			</script>
	</body>
</HTML>