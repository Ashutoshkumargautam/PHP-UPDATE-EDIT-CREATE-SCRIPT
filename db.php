<?php

$db = mysqli_connect("localhost","root","","test_db");
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
