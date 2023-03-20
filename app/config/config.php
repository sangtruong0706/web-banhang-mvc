<?php
// define('BASE_URL', 'http://localhost/Mohinh_MVC');
define('WEBSITE_TITLE', "Cây xanh Store");
define('PROTOCOL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCOL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/config", "public", $path));
define('ASSETS', str_replace("app/config", "public/assets", $path));

$url_tmp = str_replace("app/config", "", $path);
$url_tmp = rtrim($url_tmp, "/");
define('BASE_URL', $url_tmp);


// ROOT: http://localhost/pull-code-github/mohinh_mvc/public/
// ASSETS: http://localhost/pull-code-github/mohinh_mvc/public/assets/
