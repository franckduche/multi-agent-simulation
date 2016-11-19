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
        $newCoordinates = array();
        
        $n = count($matrix);
        
        // First we get the coordinates of elements around
        
        $top = array();
        $top['x'] = ($i - 1 + $n) % $n;
        $top['y'] = ($j);
        
        $left = array();
        $left['x'] = $i;
        $left['y'] = ($j - 1 + $n) % $n;
        
        $bottom = array();
        $bottom['x'] = ($i + 1 + $n) % $n;
        $bottom['y'] = $j;
        
        $right = array();
        $right['x'] = $i;
        $right['y'] = ($j + 1 + $n) % $n;
        
        $topLeft = array();
        $topLeft['x'] = ($i - 1 + $n) % $n;
        $topLeft['y'] = ($j - 1 + $n) % $n;
        
        $topRight = array();
        $topRight['x'] = ($i - 1 + $n) % $n;
        $topRight['y'] = ($j + 1 + $n) % $n;
        
        $bottomLeft = array();
        $bottomLeft['x'] = ($i + 1 + $n) % $n;
        $bottomLeft['y'] = ($j - 1 + $n) % $n;
        
        $bottomRight = array();
        $bottomRight['x'] = ($i + 1 + $n) % $n;
        $bottomRight['y'] = ($j + 1 + $n) % $n;
        
        // Then we check if there is a fish among them
        
        $keys = array();
        
        if ($matrix[$top['x']][$top['y']] instanceof Fish)
        {
            $keys[] = $top;
        }
        if ($matrix[$left['x']][$left['y']] instanceof Fish)
        {
            $keys[] = $left;
        }
        if ($matrix[$right['x']][$right['y']] instanceof Fish)
        {
            $keys[] = $right;
        }
        if ($matrix[$bottom['x']][$bottom['y']] instanceof Fish)
        {
            $keys[] = $bottom;
        }
        if ($matrix[$topLeft['x']][$topLeft['y']] instanceof Fish)
        {
            $keys[] = $topLeft;
        }
        if ($matrix[$topRight['x']][$topRight['y']] instanceof Fish)
        {
            $keys[] = $topRight;
        }
        if ($matrix[$bottomLeft['x']][$bottomLeft['y']] instanceof Fish)
        {
            $keys[] = $bottomLeft;
        }
        if ($matrix[$bottomRight['x']][$bottomRight['y']] instanceof Fish)
        {
            $keys[] = $bottomRight;
        }
        
        // If we did not find any fish around, then we can possibly go everywhere
        
        if (count($keys) == 0)
        {
            $keys[] = $top;
            $keys[] = $left;
            $keys[] = $right;
            $keys[] = $bottom;
            $keys[] = $topLeft;
            $keys[] = $topRight;
            $keys[] = $bottomLeft;
            $keys[] = $bottomRight;
        }
        
        // Make it random
        
        shuffle($keys);
        
        // Move the Shark
        
        $alreadyMoved = false;
        
        for ($k = 0; $k < count($keys); $k++)
        {
            if (!$alreadyMoved && !($matrix[$keys[$k]['x']][$keys[$k]['y']] instanceof Rock)
             && !($matrix[$keys[$k]['x']][$keys[$k]['y']] instanceof Shark))
            {
                $matrix[$keys[$k]['x']][$keys[$k]['y']] = $matrix[$i][$j];
                $matrix[$i][$j] = 0;
                $alreadyMoved = true;
                $newCoordinates[0] = $keys[$k]['x'];
                $newCoordinates[1] = $keys[$k]['y'];
            }
        }
        
        return $newCoordinates;
    }
    
}
