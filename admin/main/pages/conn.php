<?php

$conn= mysqli_connect("localhost","root","","ECDB");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>