<?php

namespace Instagram\API\Request;

use Instagram\API\Response\RemoveProfilePictureAccountResponse;
use Instagram\Instagram;

class RemoveProfilePictureAccountRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     */
    public function __construct($instagram){

        parent::__construct($instagram);

        $this->setSignedBody(array(
            "_csrftoken" => $instagram->getCSRFToken(),
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID()
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/accounts/remove_profile_picture/";
    }

    public function getResponseObject(){
        return new RemoveProfilePictureAccountResponse();
    }

    /**
     * @return RemoveProfilePictureAccountResponse
     */
    public function execute(){
        return parent::execute();
    }

}