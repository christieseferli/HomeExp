<?php
if ($_GET['action'] == 'register') {
if(isset($_POST['formsubmitted'])){
    $error = array();
    if(empty($_POST['username'])){
        $error[] = 'Please enter a username';
    }else{
        $username = $_POST['username'];
    }
    if(empty($_POST['email'])){
        $error[] = 'Please enter a mail';
    }else{
       if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST['email'])) {
           $email = $_POST['email'];
      }else{
          $error[] = 'Your mail is invalid';
      }
    }
    if (empty($_POST['password'])){
        $error[] = 'Please enter a password';
    }else{

        $password = md5($_POST['password']);
    }
    if (empty($error)){

        $verify_email = "SELECT * FROM members WHERE email = '$email'";
        $result_verify_email = mysql_query($verify_email,$lnk);
        if (!$result_verify_email){
            echo 'Database error';
        }

        if (mysql_fetch_assoc($result_verify_email) == 0){
            $activationCode = md5(uniqid(rand(),true));
            $insert_users = "INSERT INTO members VALUES ('','".$username."','".$email."','".$password."','".$activationCode."',0)";
            $result_insert_users = mysql_query($insert_users,$lnk);
            if(!$result_insert_users){
                echo 'Database error';
            }
            if(mysql_affected_rows($lnk) == 1){
                $message = 'To activate your account, please click on this link:\n\n";';
                $message .= WEBSITE_URL . '/index.php?page=activation&action=activation&key='.$activationCode;

                mail(
                        $email,
                        'Registration Confirmation',
                         $message,
                        'FROM:' . EMAIL
                    );

                echo '<div style="color: rgb(243, 255, 92);background-color: #b4b4b4;">Thank you for registering! A confirmation email has been sent to ' . $email.'. Please click on the Activation Link to Activate your account </div>';
            } else {
                 echo '<div style="color: rgb(243, 255, 92);">You could not be registered due to a system error. We apologize for any inconvenience.</div>';
            }
        }else {
            echo '<div style="color: rgb(243, 255, 92);" >That email address has already been registered.</div>';
        }
   }else {
        echo '<div style="color: rgb(243, 255, 92);"> <ol>';
        foreach ($error as $key => $values) {
            echo '<li>' . $values . '</li>';
         }
        echo '</ol></div>';
    }
}
}
?>
