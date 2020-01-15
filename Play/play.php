<?php

$servername = "localhost";
$username = "root";
$password = "";
$databename = "tictactoe"


// Create connection


$conn = mysqli_connect($servername, $username, $password, $databasename);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$json = file_get_contents('php://input');
$data = json_decode($json);
$usrid = $data->{'userid'};
$usertoken = $data->{'token'};
$boardid = $data->{'boardid'};
$position = $data->{'position'};

$sql = "SELECT xuser,ouser,boardstate,nextmove,running FROM boards WHERE boardid = ".$boardid."";
$result = $conn->query($sql);
if ($result->num_rows == 1 )
{
  while($row = $result->fetch_assoc())
  {
    $xuser = $row["xuser"];
    $ouser = $row["ouser"];
    $boardstate = $row["boardstate"];
    $nextmove = $row["nextmove"];
    $running = $row["running"];
  }
  if ($userid == $xuser or $userid == $ouser)
  {
    $sql = "SELECT token FROM users WHERE userid = ".$userid."";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
    {
      $token = $row["token"];
    }
    if ($token == $usertoken)
    {
      if ($running == "true" and $nextmove == $userid and $boardstate[$position] == "-")
      {
        if ($userid == $xuser)
        {
            $symbol = "x";
            $boardstate[$position] = "x";
        }
        else
        {
          $symbol = "o";
          $boardstate[$position] = "o";
        }
        if (($boardstate[0] == $boardstate[1] and $boardstate[1] == $boardstate[2]) or ($boardstate[0] == $boardstate[4] and $boardstate[4] == $boardstate[8]) or ($boardstate[2] == $boardstate[4] and $boardstate[4] == $boardstate[6]) or ($boardstate[0] == $boardstate[3] and $boardstate[3] == $boardstate[6]) or ($boardstate[1] == $boardstate[4] and $boardstate[4] == $boardstate[7]) or ($boardstate[2] == $boardstate[5] and $boardstate[5] == $boardstate[8]) or ($boardstate[3] == $boardstate[4] and $boardstate[4] == $boardstate[5]) or ($boardstate[6] == $boardstate[7] and $boardstate[7] == $boardstate[8]))
        {
            $running = 'false';
            $winner = $userid;
        }
        if (substr_count($boardstate,'-') == 0)
        {
          $running = 'false';
        }
        $sql = "UPDATE boards SET boardstate = '".$boardstate."' , running = '".$running."', winner = ".$winner." WHERE boardid = ".$boardid."";

        header("Status: 200 OK");

        $response = "{'symbol':'".$symbol."', 'position' : ".$position.",'game_finished' : ".$gamefinished.",'winner':".$winner."}";
      }
      else
      {
        header("Status: 403 Forbidden");
        exit;
      }
    }
    else
    {
      header("Status: 401 Unauthorized"
      exit;
    }
  }
  else
  {
    header("Status: 401 Unauthorized");
    exit;
  }
}
else
{
  header("Status: 404 Not Found");
  exit;
}
?>