<?php
    session_start();
    date_default_timezone_set('Europe/Amsterdam');
    header('Content-Type: text/html; charset=utf-8');
    include('db.php');
    define('EMAIL','christieseferli@gmail.com');
    define('WEBSITE_URL','http://www.christieseferli.com/homeexpdev');
    $page = 'home';
    if (isset($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php')) {
        $page = $_GET['page'];
    }
    if (empty($_SESSION['Auth']) && $page != 'login' && $page != 'register') {
        header('location:index.php?page=login');
    } elseif (!empty($_SESSION['Auth']) && $page == 'login' && $page == 'register') {
        header('location:index.php?page=home');
    }
    if(!empty($_SESSION['Auth']) && $page == 'additional'){
        header('location:index.php?page=calculator');
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