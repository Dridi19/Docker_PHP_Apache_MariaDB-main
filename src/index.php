<?php 
 session_start();
 //if already logged in
 if (isset($_SESSION["id"]) && isset($_SESSION["loggedIn"])) {
	 header("Location: blog.php");
	 exit();
 }
?>


<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<meta charset="UTF-8">
		<title>LifeBlog | Home </title>
	</head>
	<body>		
		<div class="container">
			<!-- navbar -->
			<div class="navbar">
				<div class="logo_div">
					<a href="index.php"><h1>LifeBlog</h1></a>
				</div>
				<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="#about">About</a></li>
				</ul>
			</div>
		<div class="banner">
			<div class="welcome_msg">
				<h1>Today's Inspiration</h1>
				<p> 
					One day your life <br> 
					will flash before your eyes. <br> 
					Make sure it's worth watching. <br>
					<span>~ Gerard Way</span>
				</p>
				<a href="register.php" class="btn">Join us!</a>
			</div>
			<div class="login_div">
				<form action="login.php" method="get" >
					<h2>Login</h2>
					<input type="text" name="username" placeholder="username">
					<input type="password" name="password"  placeholder="Password"> 
					<button class="btn" type="submit" name="login_btn">Sign in</button>
				</form>
			</div>
		</div>
	</body>
</html>