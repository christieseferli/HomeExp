<?php
    session_start();
    date_default_timezone_set('Europe/Amsterdam');
    $lnk = mysql_connect('localhost', 'expenses', 'S3f3rl1@@');
    mysql_select_db("expenses_db");
    $page = 'home';
    if (isset($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php')) {
        $page = $_GET['page'];
    }
    if (empty($_SESSION['Auth']) && $page != 'login') {
        header('location:index.php?page=login');
    } elseif (!empty($_SESSION['Auth']) && $page == 'login') {
        header('location:index.php?page=home');
    }
    if (file_exists('actions/'.$page.'.php')) {
        include('actions/'.$page.'.php');
    }

    function isBalancesEmpty($balance) {
        foreach ($balance as $amount) {
            $amount = floor(abs($amount));
            if ($amount != 0) {
                return false;
            }
        }
        return true;
    }
?>