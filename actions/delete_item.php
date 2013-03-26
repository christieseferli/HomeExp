<?php
$sql= "DELETE FROM shop_list WHERE id = '".$_GET['id']."';";
mysql_query($sql,$lnk);
header('location:index.php?page=shoplist');
?>
