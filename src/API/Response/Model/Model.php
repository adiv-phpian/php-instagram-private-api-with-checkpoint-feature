<?php

namespace Instagram\API\Response\Model;

use JsonSerializable;

class Model implements JsonSerializable {

    /**
     * Optional array of Properties can be passed in to initialize the Model
     * @param array $properties Properties
     */
    public function __construct($properties = array()){
        if($properties != null){
            foreach($properties as $key => $value){
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return array Non-Null Variables
     */
    function jsonSerialize(){
        return array_filter(get_object_vars($this), function($item) {
            return !is_null($item);
        });
    }

}