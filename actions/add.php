<?php
if (!empty($_POST)) {
    if ($_GET['action'] == 'add') {
        if (!empty($_POST["Description"])&& !empty($_POST["Cost"])){
            $datetime = date('Y-m-d H:i');
            $sql = "INSERT INTO expenses VALUES ('','" . $_SESSION['Auth']['username'] . "','" . $datetime . "','" . $_POST['Description'] . "','" . $_POST['Cost'] . "');";
            if (mysql_query($sql, $lnk)) {
                $expenseId = mysql_insert_id();
                foreach ($_POST['users'] as $username => $validity) {
                    if (!empty($validity)) {
                        $sql = "INSERT INTO expenses_users VALUES ('', '".$expenseId."', '".$username."');";
                        mysql_query($sql, $lnk);
                    }
                }
            }
        }
    }
}
?>
