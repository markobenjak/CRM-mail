<?php
session_start();
if (isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])) {

    include('db.php');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT `email`, `password`, `admin` FROM users";
    $result = mysqli_query ($con, $sql);
    $login = false;

    while($row_list = mysqli_fetch_assoc ( $result )) {
        if (password_verify($_POST['password'], $row_list['password']) &&
            $_POST['username'] == $row_list['email']) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $row_list['email'];
            $_SESSION['level'] =  $row_list['admin'];
            $login = true;
        }
    }

    if($login == true){
        header('Refresh: 0; URL = frontend/main.php');
    }else{
        header('Refresh: 0; URL = frontend/login.php');
    }

}else{
    echo 'Something went wrong';
    header('Refresh: 2; URL = frontend/login.php');
}