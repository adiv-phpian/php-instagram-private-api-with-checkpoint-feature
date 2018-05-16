<?php

namespace Instagram\API\Request;

use Instagram\API\Response\ShowFriendshipResponse;
use Instagram\Instagram;

class ShowFriendshipRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $userId string User Id
     */
    public function __construct($instagram, $userId){

        parent::__construct($instagram);

        $this->userId = $userId;

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/friendships/show/%s/", $this->userId);
    }

    public function getResponseObject(){
        return new ShowFriendshipResponse();
    }

    /**
     * @return ShowFriendshipResponse
     */
    public function execute(){
        return parent::execute();
    }

}