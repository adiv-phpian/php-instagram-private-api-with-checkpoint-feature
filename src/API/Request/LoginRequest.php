<?php

namespace Instagram\API\Request;

use Instagram\API\Response\LoginResponse;
use Instagram\Instagram;

class LoginRequest extends BaseRequest {

    /**
     * @param $instagram Instagram
     * @param $username string Instagram Username
     * @param $password string Instagram Password
     */
    public function __construct($instagram, $username, $password){

        parent::__construct($instagram);

        $this->setSignedBody(array(
            "phone_id" => $instagram->getPhoneId(),
            "username" => $username,
            "guid" => $instagram->getGUID(),
            "device_id" => $instagram->getDeviceId(),
            "password" => $password,
            "login_attempt_count" => "0",
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/accounts/login/";
    }

    public function getResponseObject(){
        return new LoginResponse();
    }

    public function throwExceptionIfResponseNotOk(){
        return false;
    }

    /**
     * @return LoginResponse
     */
    public function execute(){
        return parent::execute();
    }

}