<?php

namespace Instagram\API\Request;

use Instagram\API\Constants;
use Instagram\API\Response\TimelineFeedResponse;
use Instagram\Instagram;

class TimelineFeedRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     * @param $maxId string The Maximum Id for fetching more Items in the Feed
     */
    public function __construct($instagram, $maxId = null){

        parent::__construct($instagram);

        $this->addParam("phone_id", $instagram->getPhoneId());
        $this->addParam("timezone_offset", Constants::TIMEZONE_OFFSET);
        $this->addHeader("X-Google-AD-ID", $instagram->getGoogleAdId());

        if(!empty($maxId)) {
            $this->addParam("max_id", $maxId);
        }

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "/v1/feed/timeline/";
    }

    public function getResponseObject(){
        return new TimelineFeedResponse();
    }

    /**
     * @return TimelineFeedResponse
     */
    public function execute(){
        return parent::execute();
    }

}