<?php

namespace Instagram\API\Request;

use Instagram\API\Response\DeleteMediaResponse;
use Instagram\Instagram;

class DeleteMediaRequest extends AuthenticatedBaseRequest {

    const TYPE_PHOTO = "PHOTO";
    const TYPE_VIDEO = "VIDEO";

    protected $mediaId;
    protected $mediaType;

    /**
     * @param $instagram Instagram
     * @param $mediaId string Media Id
     * @param $mediaType string Media Type
     */
    public function __construct($instagram, $mediaId, $mediaType){

        parent::__construct($instagram);

        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;

        $this->setSignedBody(array(
            "media_id" => $mediaId,
            "_csrftoken" => $instagram->getCSRFToken(),
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID()
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return sprintf("/v1/media/%s/delete/?media_type=%s", $this->mediaId, $this->mediaType);
    }

    public function getResponseObject(){
        return new DeleteMediaResponse();
    }

    /**
     * @return DeleteMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}