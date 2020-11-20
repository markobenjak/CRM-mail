<?php
//$password = 'Patak12*';
$password = 'test';
$crypted = password_hash($password, PASSWORD_DEFAULT);



echo $crypted;