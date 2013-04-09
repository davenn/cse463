<?php
	session_start();
?>
<html>
	<head>
		<title>Formula Website</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="header">
			<h1>Formula for You</h1>
		</div>
		<div id="content">
			<?php
				$_SESSION['type'];
				$_SESSION['name'];
				$_SESSION['post'];
				$_SESSION['email'];
				include("dbconnect.php");
				$con= new dbconnect();
				$con->connect();
				$line = 'your login failed! <a href="index.php">(Login)</a>';
				$uname =$_POST['login'];
				$pword =$_POST['password'];
				$sha1Pword= sha1($pword);
				$newWebPage="index.php";
				$temp = mysql_query("SELECT * FROM BlogUsers");
				while ($check = mysql_fetch_array($temp)){
					if ($check['Password'] == $sha1Pword && $check['UserName']== $uname){
						$line= "Login Success!";
						$newWebPage="profile.php";
						$_SESSION['name']=$uname;
						echo "<h1>Welcome!</h1>";
						echo "<br><h2>$uname</h2><br><br>";
						if($check['Type'] =="admin" || $check['Type']=="user"){
							if($check['Type'] == "admin"){
								$_SESSION['type']="admin";
							}
							if($check['Type']== "user"){
								$_SESSION['type']="user";
							}

						}
					}
				header("refresh: 2; url=$newWebPage");
				}
				echo $line;
			?>
		</div>
	</body>
</html>



