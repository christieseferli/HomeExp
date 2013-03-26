<?php
if (!empty($_POST)){
    if ($_GET['action'] == 'edit'){
        $sql = "UPDATE shop_list SET product = '". $_POST['Product']."' WHERE id = '".$_GET['id']."'";
        mysql_query($sql,$lnk);
        header('location:index.php?page=shoplist');
    }
}
?>



