<?php

namespace Lab7;

/**
* Shark_Class is a class which represents the agent Shark.
* The Shark will move each round and wants to devours the fishes.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
class Shark extends Agent
{
    /**
    * Constructor of Shark.
    */
    public function __construct()
    {
        $this->type = 1;
    }
    
}
