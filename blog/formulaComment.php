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
		<div id="container">
			<div id="sideBar">
				<br><a href="profile.php">Profile</a><br>
				<p><a href="formulas.php">Formulas</a></p>
				<a href="videos.php">Videos</a><br><br>
				<a href="games.php">Games</a><br><br>
				<a href="quizzes.php">Quizzes</a><br><br>
				<a href="noteSheets.php">Note Sheet</a><br><br>
				<a href="logout.php">Logout</a><br><br>
			</div>
			<div id="content">
				<?php
					$_SESSION['login'];
					$_SESSION['name'];
					$_SESSION['post'];
					$_SESSION['class'];
					$_SESSION['Fid'];
					include("dbconnect.php");
					$con= new dbconnect();
					$con->connect();
					$sql = "INSERT INTO FormulaComment(Formula_id, UserName, Content) VALUES ('".$_GET['id']."', '".$_SESSION['name']."', '".$_POST['Comment']."');";
					mysql_query($sql);
					$update=mysql_affected_rows();
					echo "<h2>$update Record Inserted</h2><br />"
				?>
			</div>
		</div>
	</body>
</html>