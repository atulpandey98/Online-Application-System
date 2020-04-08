<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "ongc_training";
//connection
$con = new mysqli($servername, $username, $dbpassword, $dbname);
if(mysqli_connect_errno()){
	echo 'failed to connect';
}


// Check connection

  if(!mysqli_select_db($con, 'ongc_training'))
  {
  echo'Database not selected';
}
else echo'selected';
?>