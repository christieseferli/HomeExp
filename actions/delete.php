<?php
$sql= "DELETE FROM expenses WHERE ID = '".$_GET['id']."';";
mysql_query($sql,$lnk);
header('location:index.php?page=add');
?>
