<!DOCTYPE html>
<?php
    session_start();
    if ($_SESSION['valid'] != true){
        header('Refresh: 0; URL = ./login.php');
    }

?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM-mail</title>

    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/cards.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>

<body>

<aside class="sidebar-left">

    <a class="logo" href="#">Welcome</a>

    <div class="sidebar-links">
        <a class="link-blue" href="../email.php"><i class="fa fa-cloud-download" aria-hidden="true"></i>Get new e-mails</a>
        <a class="link-red" href="./main_archive.php"><i class="fa fa-file-archive-o" aria-hidden="true"></i>Archive</a>
        <a class="link-yellow selected" href="./main.php"><i class="fa fa-keyboard-o"></i>Active</a>
        <?php
            if ($_SESSION['level'] == 1){
                echo '<a href="./main_add_user.php"><i class="fa fa-plus" aria-hidden="true"></i>Add User</a>';
            }
        ?>
        <a class="link-green" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
    </div>

</aside>

<div class="main-content">

    <?php include "../stored_emails.php"; ?>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $(function () {

        var links = $('.sidebar-links > a');

        links.on('click', function () {

            links.removeClass('selected');
            $(this).addClass('selected');

        })
    });
    var elements = document.getElementsByClassName("formPopup");
    for(var i=0; i<elements.length; i++)
    {
        function openForm(i) {
            document.getElementById("popupForm" + i).style.display = "block";
        }

        function closeForm(i) {
            document.getElementById("popupForm" + i).style.display = "none";
        }
    }

</script>

</body>

</html>
