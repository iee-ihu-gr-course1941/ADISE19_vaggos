<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $givenid = $_GET["id"]
   $sql = 'SELECT xuser, ouser, boardstate, nextmove, winner,running FROM boards WHERE boardid = '.$givenid.'';

   mysql_select_db('tictactoe');

   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
      echo '';
      exit;

   }
   else {
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK.");
   	while($row = mysql_fetch_array($retval, MYSQL_NUM)) {
      		echo ' { "player1" : "'.$row[0].'", "player2" : "'.$row[1].'", "boardstate": "'.$row[2].'","winner": "'.$row[3].'","running": "'.$row[4].'" }';
   	}
   }
   
   
   mysql_close($conn);
?>
