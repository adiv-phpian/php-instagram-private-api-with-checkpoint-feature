<?php

namespace Instagram\API\Request;

use Instagram\API\Response\UserTagsFeedResponse;
use Instagram\Instagram;

class UserTagsFeedRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $userId string User Id to load the Feed of
     * @param $maxId string The Maximum Id for fetching more Items in the Feed
     */
    public function __construct($instagram, $userId, $maxId = null){

        parent::__construct($instagram);

        $this->userId = $userId;

        if(!empty($maxId)) {
            $this->addParam("max_id", $maxId);
        }

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/usertags/%s/feed/", $this->userId);
    }

    public function getResponseObject(){
        return new UserTagsFeedResponse();
    }

    /**
     * @return UserTagsFeedResponse
     */
    public function execute(){
        return parent::execute();
    }

}