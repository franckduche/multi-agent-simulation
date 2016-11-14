<?php

namespace Lab7;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
* Controller_Class is a class which represents an agent.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
class Controller
{
    /**
    * Gives access to the simulation form.
    *
    * @param  mixed  $request the object representing the http request
    * @param  mixed  $app the object representing the Silex application
    */
    public function simulation(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array(
            'dataSent' => false,
        ));
    }
    
    /**
    * Gives access to the simulation form.
    *
    * @param  mixed  $request the object representing the http request
    * @param  mixed  $app the object representing the Silex application
    */
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
    
    /**
    * Gives access to the simulation form.
    *
    * @param  mixed  $request the object representing the http request
    * @param  mixed  $app the object representing the Silex application
    * @param  int  $sharks number of sharks to generate
    * @param  int  $fishes number of fishes to generate
    * @param  int  $rocks number of rocks to generate
    * @param  int  $lines number of lines to generate
    */
    public function generate(Request $request, Application $app, $sharks, $fishes, $rocks, $lines)
    {
        $board = new Board($lines, $sharks, $fishes, $rocks);
        return $app->json($board->toJson());
    }
    
    /**
    * Gives access to the simulation form.
    *
    * @param  mixed  $request the object representing the http request
    * @param  mixed  $app the object representing the Silex application
    */
    public function update(Request $request, Application $app)
    {
        $board = new Board(count($request->get('boardArray')));
        $board->fromArray($request->get('boardArray'));
        $board->update();
        return $app->json($board->toJson());
    }
}
