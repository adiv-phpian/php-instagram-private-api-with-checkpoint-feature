<?php

namespace Instagram\API\Request;

use Instagram\API\Framework\RequestFile;
use Instagram\API\Response\PhotoUploadResponse;
use Instagram\Instagram;

class ChangeProfilePictureAccountRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $path string File Path of the Profile Picture to Upload
     */
    public function __construct($instagram, $path){

        parent::__construct($instagram);

        $this->setSignedBody(array(
            "_csrftoken", $instagram->getCSRFToken(),
            "_uid", $instagram->getLoggedInUser()->getPk(),
            "_uuid", $instagram->getUUID(),
        ));

        $this->addFile("profile_pic", new RequestFile($path, "application/octet-stream", "profile_pic"));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/accounts/change_profile_picture/";
    }

    public function getResponseObject(){
        return new PhotoUploadResponse();
    }

    /**
     * @return PhotoUploadResponse
     */
    public function execute(){
        return parent::execute();
    }

}