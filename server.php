<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$publicDir = __DIR__ . '/public';
$uri = urldecode($uri);

$requested = $publicDir . '/' . $uri;

if ($uri !== '/' && file_exists($requested)) {
    return false;
}

require_once $publicDir . '/index.php';
