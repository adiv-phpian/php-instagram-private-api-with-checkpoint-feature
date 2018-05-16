<?php

namespace Instagram\API\Request;

use Instagram\API\Response\LikedFeedResponse;
use Instagram\Instagram;

class LikedFeedRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     * @param $maxId string The Maximum Id for fetching more Items in the Feed
     */
    public function __construct($instagram, $maxId = null){

        parent::__construct($instagram);

        if(!empty($maxId)) {
            $this->addParam("max_id", $maxId);
        }

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "/v1/feed/liked/";
    }

    public function getResponseObject(){
        return new LikedFeedResponse();
    }

    /**
     * @return LikedFeedResponse
     */
    public function execute(){
        return parent::execute();
    }

}