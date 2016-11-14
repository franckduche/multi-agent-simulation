<?php

namespace Lab7;

/**
* Board_Class is a class which represents the matrix where the agents will move.
*
* @author   Franck Duché <franckduche@gmail.com>
* @author   Sara Jghima <sarajghima@gmail.com>
* @access   public
*/
class Board
{
    /**
    * @var array $matrix the matrix containing everything
    */
    private $matrix;
    
    /**
    * Constructor of Board.
    * 
    * @param  int  $lines the number of lines of the matrix
    * @param  int  $sharks the number of sharks to create
    * @param  int  $fishes the number of fishes to create
    * @param  int  $rocks the number of rocks to create
    */
    public function __construct($lines, $sharks = 0, $fishes = 0, $rocks = 0)
    {
        $this->matrix = array();
        
        // First fill the matrix with 0 (water)
        for ($i = 0; $i < $lines; $i++)
        {
            $this->matrix[$i] = array_fill(0, 10, 0);
        }

        // If it's a generation
        if ($sharks > 0 && $fishes > 0 && $lines > 0 && $rocks > 0)
        {
            $arrayKeys = array();
            
            for ($i = 0; $i < $lines; $i++)
            {
                for ($j = 0; $j < $lines; $j++)
                {
                    $arrayKeys[] = array($i, $j);
                }
            }
            
            // Add sharks
            for ($i = 0; $i < $sharks; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[$arrayKeys[$arrayKey][0]][$arrayKeys[$arrayKey][1]] = new Shark();
                unset($arrayKeys[$arrayKey]);
            }
            
            // Add fishes
            for ($i = 0; $i < $fishes; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[$arrayKeys[$arrayKey][0]][$arrayKeys[$arrayKey][1]] = new Fish();
                unset($arrayKeys[$arrayKey]);
            }
            
            // Add rocks
            for ($i = 0; $i < $rocks; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[$arrayKeys[$arrayKey][0]][$arrayKeys[$arrayKey][1]] = new Rock();
                unset($arrayKeys[$arrayKey]);
            }
        }
    }
    
    /**
    * returns the object serialized in JSON format.
    *
    * @return string string representing JSON
    */
    public function toJson()
    {
        $json = array();
        $lines = count($this->matrix);
        
        for ($i = 0; $i < $lines; $i++)
        {
            for ($j = 0; $j < $lines; $j++)
            {
                if ($this->matrix[$i][$j] == 0)
                {
                    $json[$i][$j] = 0;
                }
                else
                {
                    $json[$i][$j] = $this->matrix[$i][$j]->getType();
                }
            }
        }
        
        return $json;
    }
    
    /**
    * Creates the object by unserializing the specified array.
    *
    * @param  array  $array the array to transform into object
    */
    public function fromArray($array)
    {
        $lines = count($array);
        
        for ($i = 0; $i < $lines; $i++)
        {
            for ($j = 0; $j < $lines; $j++)
            {
                if ($array[$i][$j] == 1)
                {
                    $this->matrix[$i][$j] = new Shark();
                }
                elseif ($array[$i][$j] == 2)
                {
                    $this->matrix[$i][$j] = new Fish();
                }
                elseif ($array[$i][$j] == 3)
                {
                    $this->matrix[$i][$j] = new Rock();
                }
            }
        }
    }
    
    /**
    * Update randomly the positions of the elements of the matrix.
    */
    public function update()
    {
        $lines = count($this->matrix);

        $arrayKeys = array();
        
        for ($i = 0; $i < $lines; $i++)
        {
            for ($j = 0; $j < $lines; $j++)
            {
                $arrayKeys[] = array($i, $j);
            }
        }
        
        // Pick randomly each cell from the current board to move it.
        for($i = 0; $i < $lines*$lines; $i++)
        {
            $arrayKey = array_rand($arrayKeys);
            
            $x = $arrayKeys[$arrayKey][0];
            $y = $arrayKeys[$arrayKey][1];
            $currentElement = $this->matrix[$x][$y];

            if ($currentElement != 0)
            {
                $newCoordinates = $currentElement->getNewPosition($this->matrix, $x, $y);
                
                // Get the new position to remove it from the random keys matrix.
                if ($newCoordinates != null)
                {
                    if(($keyFound = array_search($newCoordinates, $arrayKeys)) !== false)
                    {
                        unset($messages[$keyFound]);
                    }
                }
            }
            
            unset($arrayKeys[$arrayKey]);
        }
    }
}
