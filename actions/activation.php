<?php
    if ($_GET['action'] == 'activation') {
        if (!empty($_GET['key'])){
            $sql = "SELECT * FROM members WHERE activationCode = '".$_GET['key']."'";
            $result=mysql_query($sql,$lnk);
            $user=  mysql_fetch_assoc($result);
            if(!empty($user)){
                $sql = "UPDATE members SET flag=1 WHERE username = '".$user['username']."'";
                mysql_query($sql,$lnk);
            }else{
                echo "this is WRONG";
            }
        }else{
            echo 'No key';
        }
    }
?>