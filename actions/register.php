<?php
if(!empty($_POST)){
    if ($_GET['action'] == 'register') {
       if (!empty($_POST['username']) && !empty($_POST['password'])){
            $username = mysql_real_escape_string($_POST['username']);
            $password = mysql_real_escape_string($_POST['password']);
            $password = md5($password);

            $sql= "INSERT INTO usersExpenses VALUES ('','".$username."','".$password."')";
            $result=mysql_query($sql,$lnk);
       }else{
           $msg = 'Blank Username or Password';
       }
   }
}
?>
