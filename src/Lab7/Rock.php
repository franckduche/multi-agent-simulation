<?php

namespace Lab7;

/**
* Rock_Class is a class which represents the agent Rock.
* The Rock is an obstacle that never moves.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
class Rock extends Agent
{
    /**
    * Constructor of Rock.
    */
    public function __construct()
    {
        $this->type = 3;
    }
    
    /**
    * Get the new position of the rock according to the board.
    * It does not move.
    * 
    * @param  array  $array the current board as a reference
    * @param  int  $i x coordinate
    * @param  int  $j y coordinate
    */
    public function getNewPosition(&$matrix, $i, $j)
    {
        $newCoordinates = null;
        // Do nothing, a rock doesn't move.
        return $newCoordinates;
    }
    
}
