<?php session_start();
   $_SESSION['name'];
   $_SESSION['post'];
   $_SESSION['email'];
   $_SESSION['class'];
   $_SESSION['type'];?>
<html>
  <head>
    <title><?php echo $_SESSION['login'];?></title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script>
      $(document).ready(function(){
        $("#hide").click(function(){
          $("p.comment").hide();
        });
        $("#show").click(function(){
          $("p.comment").show();
        });
      });
    </script>
  </head>
  <body>
    <?php include_once("analyticstracking.php") ?>
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
        <?php
          if($_SESSION['type']=="admin"){
            echo '<a href="addInfo.php">Insert Info</a><br><br>';
          }
        ?>
      </div>
      <div id="content">
        <form method="POST" action="formulas.php" id="classForm">
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
         
          include("dbconnect.php");
          include("blogManager.php");
          $post= new blogManager();
          $comment= new blogManager();
          $con= new dbconnect();
          $con->connect();
          $classChosen=$_POST['classList'];
          $temp2= mysql_query("SELECT * FROM FormulaComment");
          $temp = mysql_query("SELECT * FROM ClassFormulas");
          while ($check = mysql_fetch_array($temp)){
            if ($check['ClassName'] == $classChosen){
              $post->showFormula($check['id'],$check['ClassName'],$check['FormulaTitle'],$check['Formula']);
              echo '<br><button id="hide">Hide</button><button id="show">Show</button>';
              while($check2 = mysql_fetch_array($temp2)){
                if($check2['Formula_id']== $check['id']){
                  $comment->showFormulaComment($check2['id'],$check2['Formula_id'],$check2['UserName'],$check2['Content'],$check2['DatePublished']);
                }
              }
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>