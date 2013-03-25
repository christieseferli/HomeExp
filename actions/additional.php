<?php
function sendEmail(){
    global $lnk;
    $fromUser = $_SESSION['Auth']['email'];
    $subject = "I pay you!";
    $message = "Please, Check your bank account!";
    $toUser = $_GET['to'];
    $sql = "SELECT email FROM members WHERE username = '$toUser'";
    $result = mysql_query($sql,$lnk);
    $row_user = mysql_fetch_assoc($result);
    $toUser_email = $row_user['email'];
    mail ($toUser_email,
          $subject,
          $message,
          "FROM:".$_SESSION['Auth']['email']
         );
}

if (($_GET['action'] == 'additional') && ($_GET['from'] == $_SESSION['Auth']['username'])) {
    $datetime = date('Y-m-d H:i');
    $sql = "INSERT INTO expenses VALUES ('','" . $_SESSION['Auth']['username'] . "','" . $datetime . "','Automatic payment','" . $_GET['amount'] . "');";
    if (mysql_query($sql, $lnk)) {
        $expenseId = mysql_insert_id();
        if (!empty($_GET['to'])) {
            $sql = "INSERT INTO expenses_users VALUES ('', '".$expenseId."', '".$_GET['to']."');";
            mysql_query($sql, $lnk);
        }
        sendEmail();
    }
}
?>
