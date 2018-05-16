<?php

namespace Instagram\API\Request;

use Instagram\API\Response\TagFeedResponse;
use Instagram\Instagram;

class TagFeedRequest extends AuthenticatedBaseRequest {

    protected $tag;

    /**
     * @param $instagram Instagram
     * @param $tag string Tag to load the Feed of
     * @param $maxId string The Maximum Id for fetching more Items in the Feed
     */
    public function __construct($instagram, $tag, $maxId = null){

        parent::__construct($instagram);

        $this->tag = $tag;

        $this->addParam("rank_token", $instagram->getRankToken());

        if(!empty($maxId)) {
            $this->addParam("max_id", $maxId);
        }

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/feed/tag/%s/", $this->tag);
    }

    public function getResponseObject(){
        return new TagFeedResponse();
    }

    /**
     * @return TagFeedResponse
     */
    public function execute(){
        return parent::execute();
    }

}