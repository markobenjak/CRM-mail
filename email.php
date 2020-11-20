<?php
include('db.php');
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'projekt.php80@gmail.com';
$password = 'Patak12*';
$inbox = imap_open($hostname,$username,$password);
$emails = imap_search($inbox,'ALL');
$counter = 0;
foreach($emails as $e){
//    $message = imap_fetchbody($inbox,$e,2);
//    $message = quoted_printable_decode(imap_fetchbody($inbox,$e,2));
//    $message = imap_fetchbody($inbox,$e,2.2);
    $message = trim(substr(imap_fetchbody($inbox,$e,1), 0, 100));


    $overview = imap_fetch_overview($inbox,$e,0);
    $details = $overview[0];
    $data= json_encode($details);
    $data = json_decode($data, true);
    $subject = $data['subject'];
    $from =  $data['from'];
    $date = gmdate("Y-m-d H:i:s" , strtotime($data['date']));
    $message_id =  $data['message_id'];


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO emails (`subject`, `from`, `date`, `msg_id`, `message`) 
            VALUES ('$subject', '$from', '$date','$message_id', '$message')";

    if ($con->query($sql) === TRUE) {
        $counter = $counter + 1;
    }

    // you can do a var_dump($details) to see which parts you need
    //then do whatever to insert them into your DB
}
$con->close();

header('Location: http://localhost:63342/rest/frontend/main.php');