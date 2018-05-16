<?php

namespace Instagram\API\Request;

use Instagram\API\Response\EditMediaResponse;
use Instagram\Instagram;

class EditMediaRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $mediaId string Id of Media to Edit
     * @param $caption string Caption
     */
    public function __construct($instagram, $mediaId, $caption = null){

        parent::__construct($instagram);

        $this->mediaId = $mediaId;
        $caption = $caption != null ? $caption : "";

        $this->setSignedBody(array(
            "caption_text" => $caption,
            "_csrftoken" => $instagram->getCSRFToken(),
            "usertags" => json_encode(array(
                "in" => array()
            )),
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID(),
            "location" => "{}"
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return sprintf("/v1/media/%s/edit_media/", $this->mediaId);
    }

    public function getResponseObject(){
        return new EditMediaResponse();
    }

    /**
     * @return EditMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}