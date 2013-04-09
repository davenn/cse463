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
		<div id="sideBar">
			<ul>
				<li>Profile</li>
				<li>Formulas</li>
				<li>Videos</li>
				<li>Games</li>
				<li>Quizzes</li>
				<li>Note Sheet</li>
			</ul>
		</div>
		<div id="content">
			<h2>Delete A Comment</h2>
			<?php
				if($SESSION['login']="admin") {
					include("dbconnect.php");
					$con= new dbconnect();
					$con->connect();
					if(isset($_GET['id'])) {
						$id= $_GET['id'];
						$sSql = "DELETE FROM BlogComment WHERE id=\"$id\"";
						$oResult = mysql_query($sSql);
						$rows=mysql_affected_rows();
						echo "<h2>$rows Record(s) Deleted </h2>";
					}
				}
			?>
			<br>
			<?php
				if($_SESSION['login']=="admin" || $_SESSION['login']=="user") {
					if($_SESSION['login']=="admin"){
						echo '<center><a href="EditBlog.php">Manage Blog</a></center>';
					}
					if($_SESSION['login']=="user") {
						echo '<center><a href="authorBlog.php">View Blog</a></center>';
					}
				}
				else {
					echo '<center><a href="PublicViewBlog.php">View Blog</a></center>';
				}
			?>
			<br><br>
			<a href="logout.php">Logout</a>
			<br><br>
			<a href="BlogLoginCheck.php">Home</a>
		</div>
	</body>
</html>