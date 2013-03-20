<?php
if(!empty($_POST)){

    if ($_GET['action'] == 'invitePerson') {

       if (!empty($_POST['email'])){
           $email = $_POST['email'];
           $length = 10;
           $inviteCode = "";
           $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
              for ($p = 0; $p < $length; $p++) {
                  $inviteCode .= $characters[mt_rand(0, strlen($characters))];
                }
           $sql= "INSERT INTO invitation VALUES ('','".$email."','".$inviteCode."')";
           mysql_query($sql,$lnk);
           header('location:index.php?page=login');
            die;
       }else{
           $msg = 'Blank email';
       }
    }

    if ($_GET['action'] == 'register') {
       if (!empty($_POST['username']) && !empty($_POST['password'])){
            $username = mysql_real_escape_string($_POST['username']);
            $password = mysql_real_escape_string($_POST['password']);
            $password = md5($password);

            $sql= "INSERT INTO usersExpenses VALUES ('','".$username."','".$password."')";
            mysql_query($sql,$lnk);
            header('location:index.php?page=login');
            die;
       }else{
           $msg = 'Blank Username or Password';
       }
   }
}
?>
