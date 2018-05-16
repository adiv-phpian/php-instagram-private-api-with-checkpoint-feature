<?php

namespace Instagram\Util;

use JsonMapper;

class CustomJsonMapper extends JsonMapper {

    /**
     *
     * Allow null values for everything.
     *
     * @param string $type
     * @return bool
     */
    protected function isNullable($type){
        return true;
    }

}