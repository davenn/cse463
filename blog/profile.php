<?php session_start();
   $_SESSION['type'];
   $_SESSION['name'];
   $_SESSION['post'];
   $_SESSION['email'];
   include("dbconnect.php");?>
<html>
  <head>
    <title>Formula Website</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php include_once("analyticstracking.php") ?>
    <div id="header">
      <h1>Formula for You</h1>
    </div>
    <div id="container">
      <div id="sideBar">
        <p><a href="profile.php">Profile</a></p>
        <a href="formulas.php">Formulas</a><br><br>
        <a href="videos.php">Videos</a><br><br>
        <a href="games.php">Games</a><br><br>
        <a href="quizzes.php">Quizzes</a><br><br>
        <a href="noteSheets.php">Note Sheet</a><br><br>
        <a href="logout.php">Logout</a><br><br>
        <?php
          if($_SESSION['type']=="admin"){
            echo '<a href="addInfo.php">Insert Info</a><br><br>';
          }
        ?>
      </div>
      <div id="content">
        <?php
          $con= new dbconnect();
          $con->connect();
          $uName=$_SESSION['name'];
          if($_SESSION['type']=="user" || $_SESSION['type']=="admin"){
            echo "hello $uName";
          }
        ?>
      </div>
    </div>
  </body>
</html>



