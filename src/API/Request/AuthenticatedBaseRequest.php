<?php

namespace Instagram\API\Request;

use Instagram\Instagram;

abstract class AuthenticatedBaseRequest extends BaseRequest {

    /**
     * @param $instagram Instagram The Instagram instance to make the Request with.
     */
    public function __construct($instagram){

        parent::__construct($instagram);

        foreach($instagram->getCookies() as $key => $value){
            $this->addCookie($key, $value);
        }

    }

}