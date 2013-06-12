<?php

$exploded = explode('/', $_SERVER['REQUEST_URI']);
$env = $exploded[1];

if ($env == 'homeexpdev') {
    $settings = $config['development'];
} elseif($env == 'expenses_stable') {
    $settings = $config['production'];
}
?>
