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
        <a class="link-yellow " href="./main.php"><i class="fa fa-keyboard-o"></i>Active</a>
        <?php
            if ($_SESSION['level'] == 1){
                echo '<a class="selected" href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add User</a>';
            }
        ?>
        <a class="link-green" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
    </div>

</aside>

<div class="main-content">

    <div class="addUser"  id="addUser">
        <form action="../add_user.php" method="post" class="formContainer">
            <h2>Add User</h2>
            <label for="name">
                <strong>Name</strong>
            </label>
            <input type="text" id="name" name="name" required>
            <label for="lastname">
                <strong>Lastname</strong>
            </label>
            <input type="text" id="lastname" name="lastname" required>
            <label for="email">
                <strong>E-mail</strong>
            </label>
            <input type="text" id="email" name="email" required>
            <label for="email">
                <strong>password</strong>
            </label>
            <input type="password" id="password" name="password" " required>
            <br>
            <label for="level">
                <strong>Admin</strong>
            </label>
            <input type="checkbox" id="level" name="level" value="1">
            <br>
            <br>
            <br>
            <button type="submit" class="btn">Add</button>
        </form>
    </div>

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

    function openFormAddUser() {
        document.getElementById("addUser").style.display = "block";
    }

    function closeFormAddUser() {
        document.getElementById("addUser").style.display = "none";
    }

</script>

</body>

</html>
