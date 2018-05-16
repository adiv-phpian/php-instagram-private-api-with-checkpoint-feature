<?php

namespace Instagram\API\Request;

use Instagram\API\Response\UnlikeMediaResponse;
use Instagram\Instagram;

class UnlikeMediaRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $mediaId string Media Id
     */
    public function __construct($instagram, $mediaId){

        parent::__construct($instagram);

        $this->mediaId = $mediaId;

        $this->setSignedBody(array(
            "module_name" => "feed_timeline",
            "media_id" => $mediaId,
            "_csrftoken" => $instagram->getCSRFToken(),
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID()
        ));

        //Tap Heart Icon = 0
        //Double tap Photo = 1
        $this->addParam("d", "0");

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return sprintf("/v1/media/%s/unlike/", $this->mediaId);
    }

    public function getResponseObject(){
        return new UnlikeMediaResponse();
    }

    /**
     * @return UnlikeMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}