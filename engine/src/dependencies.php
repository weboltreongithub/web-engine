<?php
$container = $app->getContainer();
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $path = $settings['template_path'];
    return new Slim\Views\PhpRenderer( $path ); // https://framework.zend.com/manual/2.0/en/modules/zend.view.renderer.php-renderer.html
};
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};