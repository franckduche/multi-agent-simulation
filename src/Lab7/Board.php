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
    * Constructor of Board.
    */
    public function __construct()
    {
    }
    
    /**
    * returns the object serialized in JSON format.
    *
    * @return string string representing JSON
    */
    public function toJson()
    {
        $json;
        
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
