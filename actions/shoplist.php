<?php
if (!empty($_POST["Product"])&& !empty($_POST["Quantity"])){
if ($_GET['action'] == 'shoplist'){
        $item = "INSERT INTO shop_list VALUES ('','".$_POST['shop_categories']."','".$_POST['Product']."', '".$_POST['Quantity']."','" . $_SESSION['Auth']['username'] . "');";
        mysql_query($item,$lnk);
    }
}
?>
