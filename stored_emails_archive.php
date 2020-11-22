<?php
include('db.php');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT `id`, `subject`, `from`, `date`, `message`, `answer`, `answer_date` FROM archive_emails ORDER BY `answer_date` DESC ";
$result = mysqli_query ($con, $sql);
$counter = 0;
while($row_list = mysqli_fetch_assoc ( $result )) {
    $counter = $counter + 1;

//    echo '
//    <div id="emails" align="center">
//      <div class="tr">
//       <div class="">',$row_list['subject'], '</div>
//       <div class="">',$row_list['from'], '</div>
//       <div class="">',$row_list['date'], '</div>
//      </div>
//    </div>
//  ';

    echo '
    <div class="col" >
        <a href="javascript:void();" class="card card-9 stacked--fan-left">
            <div class="content" >
                <code class="title" >subject: ',$row_list['subject'],'</code>
                <code class="title">from: ',$row_list['from'],'</code>
                <code class="title">date: ',$row_list['date'],'</code>
                <code class="title">answered: ',$row_list['answer_date'],'</code>
                <div class="openBtn">
                    <button class="openButton" onclick="openForm(',$counter,')"><strong>Open E-mail</strong></button>
                </div>
            </div>
        </a>
         <div class="loginPopup">
            <div class="formPopup"  id="popupForm',$counter,'">
                <form action="../send_email.php" method="post" class="formContainer">
                    <input type="hidden" id="mail_id" name="mail_id" value="',$row_list['id'],'">
                    <h2>Archived E-mail</h2>
                    <label for="email">
                        <strong>E-mail</strong>
                    </label>
                    <input type="text" id="email" name="email" value="',$row_list['from'],'" required>
                    <label for="email">
                        <strong>Subject</strong>
                    </label>
                    <input type="text" id="subject" name="subject" value="RE: ',$row_list['subject'],'" required>
                    <label for="email">
                        <strong>Body</strong>
                    </label>
                    <br>
                    <textarea name="body" cols="150" rows="10" placeholder="Admins latest answer:
                    ', $row_list['answer'],' 

Rest of the conversation history:
                     ',$row_list['message'],'"></textarea>
                    <button type="button" class="btn cancel" onclick="closeForm(',$counter,')">Close</button>
                </form>
            </div>
        </div>
    </div>
    
    ';
}