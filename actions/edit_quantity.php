<?php
if (!empty($_POST)){
    if ($_GET['action'] == 'edit_quantity'){
        $sql = "UPDATE shop_list SET quantity = '". $_POST['Quantity']."' WHERE id = '".$_GET['id']."'";
        mysql_query($sql,$lnk);
        header('location:index.php?page=shoplist');
    }
}
?>