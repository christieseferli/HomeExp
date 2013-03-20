<?php
    if (!empty($_POST)) {
        if ($_GET['action'] == 'login') {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);

            $sql = "SELECT * FROM usersExpenses WHERE username = '" . $username . "' AND password = '" .$password. "' ;";
            $result = mysql_query($sql, $lnk);
            $user = mysql_fetch_assoc($result);

            if (empty($user)) {
                $message = '<img src="css/photos/zzzdoop.png"> ';
                $_SESSION['Auth'] = false;
            } else {
                $_SESSION['Auth'] = $user;
                header('location:index.php?page=home');
                die;
            }
        } elseif ($_GET['action'] == 'logout') {
            $_SESSION['Auth'] = false;
        }
    }
?>