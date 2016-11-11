<?php

namespace Lab7;

/**
* Fish_Class is a class which represents the agent Fish.
* The Fish moves each round randomly.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
class Fish extends Agent
{
    /**
    * Constructor of Fish.
    */
    public function __construct()
    {
        $this->type = 2;
    }
    
}
