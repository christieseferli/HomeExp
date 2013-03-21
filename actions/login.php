<?php
        if ($_GET['action'] == 'login') {
             $error = array();
             if(empty($_POST['username'])){
             $error[] = 'Please enter a username';
             }else{
                 $username = $_POST['username'];
                 $username = mysql_real_escape_string($username);
            }
            if (empty($_POST['password'])) {
                $error[] = 'Please Enter Your Password ';
            } else {
                 $password = md5($_POST['password']);
            }
            if (empty($error)){
                $check_credentials = "SELECT * FROM members WHERE username = '$username' AND password = '$password' AND flag = 1 ";
                $result_check_credentials = mysql_query($check_credentials,$lnk);

                $user_check_credentials = mysql_fetch_assoc($result_check_credentials);
                if(!empty($user_check_credentials)){
                    $_SESSION['Auth'] = $user_check_credentials;
                    header('location:index.php?page=home');
                }else{
                    $message = '<img src="css/photos/zzzdoop.png"> ';
                    $_SESSION['Auth'] = false;
                }
            }
      } elseif ($_GET['action'] == 'logout') {
            $_SESSION['Auth'] = false;
        }
?>
