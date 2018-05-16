<?php

namespace Instagram\API\Request;

use Instagram\API\Response\SetPrivateAccountResponse;
use Instagram\Instagram;

class SetPrivateAccountRequest extends AuthenticatedBaseRequest {

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
        return "/v1/accounts/set_private/";
    }

    public function getResponseObject(){
        return new SetPrivateAccountResponse();
    }

    /**
     * @return SetPrivateAccountResponse
     */
    public function execute(){
        return parent::execute();
    }

}