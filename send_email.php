<?php
require_once "Mail.php";


$from = "Projekt <projekt.php80@gmail.com>";
$to = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "projekt.php80@gmail.com";
$password = "Patak12*";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
    include('db.php');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $id =  $_POST['mail_id'];

    $sql = "UPDATE emails SET `answered` = 1, `answer` = '$body', `answer_date` = now() WHERE id = $id ";

    if ($con->query($sql) === TRUE) {
        header('Refresh: 0; URL = frontend/main.php');
    }else{
        echo 'fail';
    }
 }
?>
