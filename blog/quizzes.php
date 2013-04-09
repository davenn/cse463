<?php session_start(); ?>
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
        <br><a href="profile.php">Profile</a><br><br>
        <a href="formulas.php">Formulas</a><br><br>
        <a href="videos.php">Videos</a><br><br>
        <a href="games.php">Games</a><br>
        <p><a href="quizzes.php">Quizzes</a></p>
        <a href="noteSheets.php">Note Sheet</a><br><br>
        <a href="logout.php">Logout</a><br><br>
        <?php
          if($_SESSION['type']=="admin"){
            echo '<a href="addInfo.php">Insert Info</a><br><br>';
          }
        ?>
      </div>
      <div id="content">
        <form method="POST" action="quizzes.php" id="classForm">
          <select name="classList" form="classForm">
            <option value="">Select A Class...</option>
            <option value="EngineeringStatistics">Engineering Statistics</option>
            <option value="IntroductionToStatistics">Intro to Statistics</option>
            <option value="Calculus1">Calc 1</option>
            <option value="Calculus2">Calc 2</option>
          </select>
          <input type="submit" value="Submit">
        </form>
        <?php
          $_SESSION['type'];
          $_SESSION['name'];
          $_SESSION['post'];
          $_SESSION['email'];
          $_SESSION['class'];
          include("dbconnect.php");
          $con= new dbconnect();
          $con->connect();
          $classChosen=$_POST['classList'];
          $temp = mysql_query("SELECT * FROM ClassQuizzes");
          while ($check = mysql_fetch_array($temp)){
            if ($check['ClassName'] == $classChosen){
              $_SESSION['class']=$classChosen;
              echo $_SESSION['class'];
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>