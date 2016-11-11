<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// For templating
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// For URL
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// For debugging purpose
$app['debug'] = true;

$app->get('/', function () use ($app) {
    return $app->redirect('/simulation');
});

$app->get('/simulation', 'Lab7\Controller::simulation');

$app->get('/simulation/s/{sharks}/f/{fishes}/l/{lines}', 'Lab7\Controller::simulationData');

$app->get('/generate/s/{sharks}/f/{fishes}/l/{lines}', 'Lab7\Controller::generate')
    ->bind('generate');

$app->run();
