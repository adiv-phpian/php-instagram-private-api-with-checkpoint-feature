<?php

namespace Instagram\API\Request;

use Instagram\API\Response\FollowersFriendshipResponse;
use Instagram\Instagram;

class FollowersFriendshipRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $userId string User Id
     * @param $maxId string The Maximum Id for fetching more Followers
     */
    public function __construct($instagram, $userId, $maxId = null){

        parent::__construct($instagram);

        $this->userId = $userId;

        $this->addParam("module", "overview");
        $this->addParam("support_new_api", "true");
        $this->addParam("rank_token", $instagram->getRankToken());

        if($maxId != null){
            $this->addParam("max_id", $maxId);
        }

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/friendships/%s/followers/", $this->userId);
    }

    public function getResponseObject(){
        return new FollowersFriendshipResponse();
    }

    /**
     * @return FollowersFriendshipResponse
     */
    public function execute(){
        return parent::execute();
    }

}