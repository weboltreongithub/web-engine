<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
ini_set('date.timezone', 'Europe/Rome');
require __DIR__ . '/vendor/autoload.php';
session_start();

$callerPath = dirname($_SERVER["SCRIPT_FILENAME"]); // sito web di riferimento
$website = new \App\WebSite($callerPath);

$settings = require __DIR__ . '/src/settings.php';
$settings['settings']['renderer']['template_path'] = $website->getTemplatePath();
// var_dump($settings); die();
$app = new \Slim\App( $settings );

require __DIR__ . '/src/dependencies.php';
require __DIR__ . '/src/middleware.php';
require __DIR__ . '/src/routes.php';

$app->run();