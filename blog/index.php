<?php session_start(); ?>
<html>
	<head>
		<title>Formula Website</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="header">
			<h1>Formula for You</h1>
		</div>

		<div id="login">
			<br>
			<form action="BlogLoginCheck.php" method="post">
				<h2>Username</h2><input type="text" name="login" /><br><br>
				<h2>Password</h2><input type="password" name="password" /><br><br><br>
				<input type="submit" value="Login" />
			</form>
			<br>
			<?php
				if ($_SESSION['login']=="admin" || $_SESSION=="author") {
					print '<br>You are still logged in';
					if($_SESSION['login']=="admin") {
						echo '<br><br><a href="EditBlog.php">Manage Blog</a>';
					}
					else {
						echo '<br><br><a href="AuthorBlog.php">Manage Blog</a>';
					}
					echo '<br><br><a href="logout.php">Logout</a>';
				}
			?>
			<br>
			<a href="createLogin.php">Create Account</a>
		</div>
	</body>
</html>