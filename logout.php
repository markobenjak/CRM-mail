<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
$_SESSION["valid"] = false;

header('Refresh: 0; URL = frontend/login.php');
