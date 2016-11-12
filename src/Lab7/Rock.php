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
    
    public function getNewPosition(&$matrix, $i, $j)
    {
        // Do nothing, a rock doesn't move.
    }
    
}
