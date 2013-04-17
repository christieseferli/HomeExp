<?php
    $lnk = mysql_connect('localhost', $settings['db_username'], $settings['db_password']);
    mysql_select_db($settings['db_name']);
    mysql_set_charset('utf8', $lnk);
?>