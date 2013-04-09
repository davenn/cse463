<?php
class dbconnect{
function connect()
{
  $con=mysql_connect("mysql.davenn.com","davenn","devron001");
    if (!$con)
    {
    	die('Could not connect: ' . mysql_error());
    }

   mysql_select_db("davenndb", $con);
}
}

?>