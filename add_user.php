<?php

include('db.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$level =  $_POST['level'];

if ($level != 1){
    $level = 0;
}

$sql = "INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `admin`)
            VALUES ('$name', '$lastname', '$email','$password', '$level')";

//$sql = "INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `admin`)VALUES ('marko', 'benjak', 'password','test', 1)";


if ($con->query($sql) === TRUE) {
    header('Refresh: 0; URL = frontend/main.php');
}else{
    echo 'fail';
}
