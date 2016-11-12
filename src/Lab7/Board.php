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
            
            for ($i = 0; $i < $lines*$lines; $i++)
            {
                $arrayKeys[$i] = $i;
            }
            
            // Add sharks
            for ($i = 0; $i < $sharks; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[floor($arrayKey/10)][$arrayKey%10] = new Shark();
                unset($arrayKeys[$arrayKey]);
            }
            
            // Add fishes
            for ($i = 0; $i < $fishes; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[floor($arrayKey/10)][$arrayKey%10] = new Fish();
                unset($arrayKeys[$arrayKey]);
            }
            
            // Add rocks
            for ($i = 0; $i < $rocks; $i++)
            {
                $arrayKey = array_rand($arrayKeys);
                $this->matrix[floor($arrayKey/10)][$arrayKey%10] = new Rock();
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
    * Creates the object by unserializing the specified JSON.
    *
    * @param  string  $json the JSON to unserialize
    */
    public function fromJson($json)
    {
    }
}
