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
    
    /**
    * Get the new position of the shark according to the board.
    * It has a Moore moving and vision.
    * 
    * @param  array  $array the current board as a reference
    * @param  int  $i x coordinate
    * @param  int  $j y coordinate
    */
    public function getNewPosition(&$matrix, $i, $j)
    {
    }
    
}
