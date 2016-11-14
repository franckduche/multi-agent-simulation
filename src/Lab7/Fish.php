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
    
    /**
    * Get the new position of the fish according to the board.
    * It has a Neumann moving and vision.
    * 
    * @param  array  $array the current board as a reference
    * @param  int  $i x coordinate
    * @param  int  $j y coordinate
    */
    public function getNewPosition(&$matrix, $i, $j)
    {
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
        
        // Then we mix them randomly
        
        $keys = array();
        $keys[] = $top;
        $keys[] = $left;
        $keys[] = $bottom;
        $keys[] = $right;
        shuffle($keys);

        if (!($matrix[$keys[0]['x']][$keys[0]['y']] instanceof Rock))
        {
            if ($matrix[$keys[0]['x']][$keys[0]['y']] == 0)
            {
                $matrix[$keys[0]['x']][$keys[0]['y']] = $matrix[$i][$j];
                $matrix[$i][$j] = 0;
            }
            if ($matrix[$keys[0]['x']][$keys[0]['y']] instanceof Shark)
            {
                $matrix[$i][$j] = 0;
            }
        }
        elseif (!($matrix[$keys[1]['x']][$keys[1]['y']] instanceof Rock))
        {
            if ($matrix[$keys[1]['x']][$keys[1]['y']] == 0)
            {
                $matrix[$keys[1]['x']][$keys[1]['y']] = $matrix[$i][$j];
                $matrix[$i][$j] = 0;
            }
            if ($matrix[$keys[1]['x']][$keys[1]['y']] instanceof Shark)
            {
                $matrix[$i][$j] = 0;
            }
        }
        elseif (!($matrix[$keys[2]['x']][$keys[2]['y']] instanceof Rock))
        {
            if ($matrix[$keys[2]['x']][$keys[2]['y']] == 0)
            {
                $matrix[$keys[2]['x']][$keys[2]['y']] = $matrix[$i][$j];
                $matrix[$i][$j] = 0;
            }
            if ($matrix[$keys[2]['x']][$keys[2]['y']] instanceof Shark)
            {
                $matrix[$i][$j] = 0;
            }
        }
        elseif (!($matrix[$keys[3]['x']][$keys[3]['y']] instanceof Rock))
        {
            if ($matrix[$keys[3]['x']][$keys[3]['y']] == 0)
            {
                $matrix[$keys[3]['x']][$keys[3]['y']] = $matrix[$i][$j];
                $matrix[$i][$j] = 0;
            }
            if ($matrix[$keys[3]['x']][$keys[3]['y']] instanceof Shark)
            {
                $matrix[$i][$j] = 0;
            }
        }
    }
    
}
