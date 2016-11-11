<?php

namespace Lab7;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Controller
{
    public function simulation(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array(
            'dataSent' => false,
        ));
    }
    
    public function simulationData(Request $request, Application $app, $sharks, $fishes, $lines)
    {
        return $app['twig']->render('index.html.twig', array(
            'dataSent' => true,
            'sharksNumber' => $sharks,
            'fishesNumber' => $fishes,
            'linesNumber' => $lines,
        ));
    }
    
    public function generate(Request $request, Application $app, $sharks, $fishes, $lines)
    {
        return $app->json(array("1" => 1));
    }
}
