<?php
$mysqli = new mysqli("localhost", "root", "", "jnu");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
/*mysqli_select_db(mysqli_connect('localhost','root','',),'jnu')or die(mysqli_error());*/
?>