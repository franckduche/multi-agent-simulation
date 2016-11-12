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
    
    public function simulationData(Request $request, Application $app)
    {
        $sharks = $request->get('sharks');
        $fishes = $request->get('fishes');
        $rocks = $request->get('rocks');
        $lines = $request->get('lines');
        
        return $app['twig']->render('index.html.twig', array(
            'dataSent' => true,
            'sharksNumber' => $sharks,
            'fishesNumber' => $fishes,
            'rocksNumber' => $rocks,
            'linesNumber' => $lines,
        ));
    }
    
    public function generate(Request $request, Application $app, $sharks, $fishes, $rocks, $lines)
    {
        $board = new Board($lines, $sharks, $fishes, $rocks);
        return $app->json($board->toJson());
    }
    
    public function update(Request $request, Application $app)
    {
        return "{}";
    }
}
