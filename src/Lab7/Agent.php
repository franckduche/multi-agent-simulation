<?php

namespace Lab7;

/**
* Agent_Class is a class which represents an agent.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
abstract class Agent
{
    /**
    * @var int $type the type of the agent
    */
    protected $type;
    
    /**
    * returns the type of the agent.
    *
    * @return int integer representing the type
    */
    public function getType()
    {
        return $this->type;
    }
    
    /**
    * Get the new position of the agent according to the board.
    * 
    * @param  array  $array the current board as a reference
    * @param  int  $i x coordinate
    * @param  int  $j y coordinate
    */
    public abstract function getNewPosition(&$matrix, $i, $j);
}
