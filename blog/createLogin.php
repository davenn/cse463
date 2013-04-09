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
			<h2>Account</h2><br>
			<?php
				include("dbconnect.php");
				$con= new dbconnect();
				$con->connect();
				$available ="true";
				$SHA1password=sha1($_POST['Password']);
				if(isset($_POST['submit'])){
					$uname =$_POST['UserName'];
					$temp = mysql_query("SELECT * FROM BlogUsers");
					while ($check = mysql_fetch_array($temp)){
						if ($check['UserName'] == $uname){
							$available="false";
							echo "<h3>Username taken</h3><br>";
						}
					}
					if($available == "true"){
						$sSql = "INSERT INTO BlogUsers
							 (UserName, Password, FirstName, LastName, Type)
							 VALUES ('".$_POST['UserName']."', '".$SHA1password."', '".$_POST['fName']."', '".$_POST['lName']."', 'user')";
						mysql_query($sSql);
						$update=mysql_affected_rows();
						if($update > 0){
							echo "<h3>Success!</h3><br>";
						}
						else{
							echo "<h3>failure</h3><br>";
						}
					}
				}
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
				Username:<br /><input type="text" name="UserName" /><br />
				Password:<br /><input type="password" name="Password" /><br />
				First Name:<br /><input type="text" name="fName" /><br />
				Last Name:<br /><input type="text" name="lName" /><br />
				<br /><input type="submit" name="submit" value="Submit" /><br>
			</form><br>
			<a href="index.php">Login</a>
		</div>
	</body>
</html>