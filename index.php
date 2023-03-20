<?php
include_once('app/config/config.php');
include_once('system/libs/Functions.php');
spl_autoload_register(function ($class) {
    include_once('system/libs/' . $class . '.php');
});

$main = new Main();
?>
