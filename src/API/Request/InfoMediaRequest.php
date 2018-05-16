<?php

namespace Instagram\API\Request;

use Instagram\API\Response\InfoMediaResponse;
use Instagram\Instagram;

class InfoMediaRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $mediaId string Media Id to load the Info of
     */
    public function __construct($instagram, $mediaId){

        parent::__construct($instagram);

        $this->mediaId = $mediaId;

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return sprintf("/v1/media/%s/info/", $this->mediaId);
    }

    public function getResponseObject(){
        return new InfoMediaResponse();
    }

    /**
     * @return InfoMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}