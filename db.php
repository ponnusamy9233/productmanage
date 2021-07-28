<?php

$con = new mysqli("localhost:3307" , "root" , "mpsamy9233@A" ,"assign");

if(!$con){
    die("connection failed!").$con->mysqli_error();
}

?>