<?php

$exploded = explode('/', $_SERVER['REQUEST_URI']);
$env = $exploded[1];

if ($env == 'homeexpdev') {
    $settings = array(
        'db_username' => 'christieseferli',
        'db_password' => 'S3f3rl1@@',
        'db_name' => 'christieseferli_db',
        'site_url' => 'http://www.christieseferli.com/homeexpdev'
    );
} elseif($env == 'expenses_stable') {
    $settings = array(
        'db_username' => 'expenses',
        'db_password' => 'S3f3rl1@@',
        'db_name' => 'expenses_db',
        'site_url' => 'http://www.christieseferli.com/expenses_stable'
    );
}
?>
