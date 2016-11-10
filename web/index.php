<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// For debugging purpose
$app['debug'] = true;

$app->get('/', function () use ($app) {
    return $app->redirect('/simulation');
});

$app->get('/simulation', 'Lab7\Controller::simulation');

$app->run();
