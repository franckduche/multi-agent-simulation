<?php

namespace Lab7;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Controller
{
    public function simulation(Request $request, Application $app)
    {
        return "Hello World";
    }
}
