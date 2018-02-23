<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/contact', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'contact.phtml', $args);
});
$app->get('/page/{pageName}', function (Request $request, Response $response, array $args) {
    global $website;
    $args['pageFilename'] = "page-".$args['pageName'];
    $filename = $args['pageFilename'].'.md';
    $fullpath = $website->getContentFullpath( $filename );
    // die($fullpath);
    $fileExixts = file_exists($fullpath);
    // die($fileExixts?"si":"no");
    if (!$fileExixts)
    {
    	header("Location: /error");
    	die();
    }
    return $this->renderer->render($response, 'page.phtml', $args);
});
$app->get('/error', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'error.phtml', $args);
});
$app->get('/sample', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'sample.phtml', $args);
});
$app->get('/developer', function (Request $request, Response $response, array $args) {
    $response->getBody()->write(" Hello");
    return $response;
});
$app->get('/', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});