<?php
    $usr = $_SESSION["Auth"]["username"];
    $time = date("H:i",time());
    $date = date('Y-m-d');
    $sql = "INSERT INTO payments VALUES ('','".$date." ".$time."','".$usr."')" ;
    mysql_query($sql);
    header("location:index.php?page=calculator");
?>
