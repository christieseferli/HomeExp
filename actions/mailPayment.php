<?php
if ($_GET['action'] == 'mailPayment') {
$fromUser = array();
$username = $_SESSION['Auth']['username'];
print_r($username);
$email = $_SESSION['Auth']['email'];
$find_email = "SELECT * FROM members WHERE username = '$username' AND email = '$email' ";
$result = mysql_query($find_email,$lnk);
$user = mysql_fetch_assoc($result);
if (!empty($user)){
    $fromUser[] = $user;
}
}

?>
