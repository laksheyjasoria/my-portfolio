<?php
$con = new mysqli("localhost:3306", "root", "", "db_freelance");

if($con === false)
{
    die("ERROR: Could not connect. "
    . mysqli_connect_error());
}
?>