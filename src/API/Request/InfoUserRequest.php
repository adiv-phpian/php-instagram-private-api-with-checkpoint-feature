<?php

namespace Instagram\API\Request;

use Instagram\API\Response\InfoUserResponse;
use Instagram\Instagram;

class InfoUserRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $userId string User Id to load the Info of
     */
    public function __construct($instagram, $userId){

        parent::__construct($instagram);

        $this->userId = $userId;

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/users/%s/info/", $this->userId);
    }

    public function getResponseObject(){
        return new InfoUserResponse();
    }

    /**
     * @return InfoUserResponse
     */
    public function execute(){
        return parent::execute();
    }

}