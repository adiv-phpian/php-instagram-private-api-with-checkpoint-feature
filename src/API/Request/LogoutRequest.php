<?php

namespace Instagram\API\Request;

use Instagram\API\Response\LogoutResponse;
use Instagram\Instagram;

class LogoutRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     */
    public function __construct($instagram){

        parent::__construct($instagram);

        $this->addParam("guid", $instagram->getGUID());
        $this->addParam("_uuid", $instagram->getUUID());
        $this->addParam("phone_id", $instagram->getPhoneId());
        $this->addParam("_csrftoken", $instagram->getCSRFToken());

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "/v1/accounts/logout/";
    }

    public function getResponseObject(){
        return new LogoutResponse();
    }

    /**
     * @return LogoutResponse
     */
    public function execute(){
        return parent::execute();
    }

}