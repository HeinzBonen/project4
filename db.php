<?php
$conn = new mysqli('localhost','root','','uitleenbeheer');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}