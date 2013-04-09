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
			<h1>Insert A Post</h1>
			<br />
			<?php
			include("dbconnect.php");
			$con= new dbconnect();
			$con->connect();
			if(isset($_POST['submit'])) {
				$sSql = "INSERT INTO BlogPost
					 (Author, Title, Content)
					 VALUES ('".$_SESSION['name']."', '".$_POST['Title']."', '".$_POST['Content']."')";
				mysql_query($sSql);
				$update=mysql_affected_rows();
				echo "<h2>$update Record Inserted</h2><br>";
			}
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
				Title:<br /><input type="text" name="Title" /><br><br>
				Content:<br /><textarea  name="Content" rows ="5" cols = "40"></textarea><br />
				<br><input type="submit" name="submit" value="Add Record" />
			</form>
			<?php
			if($_SESSION['login']=="admin") {
				echo '<center><a href="EditBlog.php">Manage Blog</a></center>';
			}
			if($_SESSION['login']=="user") {
				echo '<center><a href="AuthorBlog.php">View Blog</a></center>';
			}
			else {
				echo '<center><a href="PublicViewBlog.php">View Blog</a></center>';
			}
			?>
			<br><br>
			<a href="logout.php">Logout</a>
			<br><br>
		</div>
	</body>
</html>
